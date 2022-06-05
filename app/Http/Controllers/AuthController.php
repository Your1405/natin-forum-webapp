<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request){
        if($request->isMethod('post')){
            $username = $request->input('username');
            $password = $request->input('password');

            if($username == 'your1405'){
                if($password == 'password'){
                    return redirect('home');
                } else {
                    return view('login', ['loginError'=>'password']);
                }
            } else {
                return view('login', ['loginError'=>'username']);
            }
        } else if($request->isMethod('get')){
            return view('login', ['loginError'=>null]);
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

            if($password != $repeatPassword){
                return view('login', ['register-error'=>'nonMatchingPasswords']);
            } else {
                $encryptPassword = Hash::make($password);
                DB::table('user')->insert([
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>$encryptPassword,
                    'accountCreated'=>$currentTime,
                    'accountStatus'=>1
                ]);

                $userIdCollection = DB::table('user')->select('userId')->where('username', '=', $username)->get();
                $userId = json_decode(json_encode($userIdCollection->toArray()[0]), true);
                var_dump($userId);
                session([
                    'isLoggedIn'=>true,
                    'userId'=>$userId['userId']
                ]);

                return redirect('/home'); 
            }
        } else if($request->isMethod('get')){
            return view('register', ['registerError'=>null]);
        }
    }

    function logout(Request $request){
        Session::flush();
        return redirect('/login');
    }
}
