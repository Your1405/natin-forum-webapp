<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    function newUser(Request $request){
        $userId = Session::get('userId');
        if($request->session()->has('userId')){
            if($request->isMethod('GET')){

                $userName = DB::table('user')->select('username')->where('userId', '=', $userId)->get()->first();

                return view('user.new', ['username' => $userName]);
            } else if ($request->isMethod('POST')){
                $userInput = $request->all();
    
                $userBday = $userInput['geboorteDatum'];
                $userGeslacht = $userInput['geslacht'];
                $userType = $userInput['userType'];
                $userBio = $userInput['userBio'];
    
                DB::table('user_info')->insert([
                    'userId' => $userId,
                    'geboorteDatum' => $userBday,
                    'geslacht' => $userGeslacht,
                    'userType' => $userType,
                    'userBio' => $userBio
                ]);
    
                return redirect('/home');
            }
        } else {
            return redirect('/login');
        }
    }

    
}
