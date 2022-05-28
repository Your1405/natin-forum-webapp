<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function home(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        return view('home')->with('username', $username)->with('password', $password);
    }
}
