<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            $currentTime = Carbon::now()->toDateTimeString();

            DB::table('user')->insert([
                
            ]);

            return view('home')->with('username', $username)->with('password', $password); 
        } else if($request->isMethod('get')){
            return view('register');
        }
    }
}
