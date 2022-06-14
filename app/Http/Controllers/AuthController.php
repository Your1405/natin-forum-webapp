<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    function login(Request $request){
        if($request->isMethod('post')){
            $username = $request->input('username');
            $password = $request->input('password');

            $userInfo = DB::table('user')->select('*')->where('username', '=', $username)->get()->toArray();
            if(sizeof($userInfo) > 0) {
                $userInfoArray = json_decode(json_encode($userInfo[0]), true);
                if(Hash::check($password, $userInfoArray['password'])){

                    $request->session()->put([
                        'userId'=>$userInfoArray['userId'], 
                        'isLoggedIn'=>true
                    ]);

                    return redirect('/home');
                } else {
                    return view('login', [
                        'registerError'=>null,
                        'loginError'=>'passwordIncorrect'
                    ]);
                }
            } else {
                return view('login', [
                    'registerError'=>null,
                    'loginError'=>'userDoesNotExist'
                ]);
            }
        } else if($request->isMethod('get')){
            if($request->session()->has('isLoggedIn')){
                return redirect('/home');
            } else {   
                return view('login', [
                    'registerError'=>null,
                    'loginError'=>null
                ]);
            }
        }
    } 

    function register(Request $request){
        if($request->isMethod('post')){
            $userInput = $request->all();
            
            $username = $userInput['username'];
            $email = $userInput['email'];
            $password = $userInput['password'];
            $repeatPassword = $userInput['repeat-password'];
            $currentTime = Carbon::now()->toDateTimeString();

            $existingUser = DB::table('user')->select(['userId','username', 'email'])
            ->where('username', '=', $username)
            ->orWhere('email', '=', $email)
            ->get()
            ->toArray();

            $existingUserArray = json_decode(json_encode($existingUser), true);
            if(sizeof($existingUserArray) != 0){
                return view('login', [
                    'registerError'=>'userAlreadyExists',
                    'loginError'=>null
                ]);
            } else {
                if($password != $repeatPassword){
                    return view('login', [
                        'loginError'=>null, 
                        'registerError'=>'nonMatchingPasswords'
                    ]);
                } else {
                    $encryptPassword = Hash::make($password);
                    DB::table('user')->insert([
                        'username'=>$username,
                        'email'=>$email,
                        'password'=>$encryptPassword,
                        'accountCreated'=>$currentTime,
                        'accountStatus'=>1
                    ]);
    
                    $userIdArray = DB::table('user')->select(['userId','username', 'email'])
                    ->where('username', '=', $username)
                    ->orWhere('email', '=', $email)
                    ->get()
                    ->toArray();

                    $userId = json_decode(json_encode($userIdArray[0]), true);

                    session([
                        'isLoggedIn'=>true,
                        'userId'=>$userId['userId']
                    ]);
    
                    return redirect('/user/new'); 
                }
            }
        } else if($request->isMethod('get')){
            return view('register', [
                'loginError'=>null, 
                'registerError'=>null
            ]);
        }
    }

    function logout(Request $request){
        Session::flush();
        return redirect('/login');
    }
}
