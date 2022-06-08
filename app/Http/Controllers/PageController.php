<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    function home(Request $request){
        if($request->isMethod('GET')){

            $userId = $request->session()->get('userId');
            $userLoggedIn = $request->session()->get('isLoggedIn', false);
            
            if($userLoggedIn){
                return view('home', [
                    'userId'=>$userId,
                    'isLoggedIn'=>$userLoggedIn
                ]);
            } else {
                return redirect('/login');
            }
        }
    }

    function newUser(){
        return view('newuser');
    }
}
