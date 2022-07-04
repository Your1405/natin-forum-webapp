<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PageController extends Controller
{
    function home(Request $request){
        if($request->isMethod('GET')){

            $userId = $request->session()->get('userId');
            $userLoggedIn = $request->session()->get('isLoggedIn', false);
            
//             SELECT post.postId, post.postTitel, post.postBeschrijving, postAuteur, user.username, post.postTijd, categorie.categorieBeschrijving 
// 	               FROM post
// 	                INNER JOIN user ON post.postAuteur = user.userId
// 	                INNER JOIN categorie ON categorie.categorieId = postCategorie
//                  WHERE post.postStatus <> 2

            if($userLoggedIn){
                return view('home', [
                    'userId'=>$userId,
                    'isLoggedIn'=>$userLoggedIn,
                    'posts'=>null
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

    function userProfile(Request $request){

        $userId = $request->session()->get('userId');

        $userInfo = DB::table('user_info')
        ->join('user', 'user_info.userId', '=', 'user.userId')
        ->join('user_type', 'user_info.userType', '=', 'user_type.userTypeId')
        ->join('geslacht', 'user_info.geslacht', '=', 'geslacht.geslachtId')
        ->select('user.username', 'user.email', 'user_info.geboorteDatum', 'geslacht.geslachtBeschrijving', 'user_type.userTypeDescription', 'user_info.userBio')
        ->where('user.userId', '=', $userId)
        ->get()->toArray();

        $userInfoArray = json_decode(json_encode($userInfo[0]), true);
        
        /*
            SELECT user.username, user.email, user_info.geboorteDatum, geslacht.geslachtBeschrijving, user_type.userTypeDescription, user_info.userBio 
            FROM user_info
                INNER JOIN user ON user.userId
                INNER JOIN user_type ON user_info.userType = user_type.userTypeId
                INNER JOIN geslacht ON user_info.geslacht = geslacht.geslachtId
            WHERE user.userId = 1
        */

        return view('user.profile', [
            'userid' => $userId,
            'userInfo' => $userInfoArray
        ]);
    }
}
