<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function editUser(Request $request){
        $userId = $request->session()->get('userId');

        if($request->isMethod('POST')){
            $userInput = $request->all();

            DB::table('user')
            ->where('userId', '=', $userId)
            ->update([
                'username'=> $userInput['username'],
                'email'=> $userInput['email']
            ]);

            DB::table('user_info')
            ->where('userId', '=', $userId)
            ->update([
                'geboorteDatum'=> $userInput['geboorteDatum'],
                'geslacht' => $userInput['geslacht'],
                'userType' => $userInput['userType'],
                'userBio' => $userInput['userBio']
            ]);

            $userInfo = DB::table('user_info')
            ->join('user', 'user_info.userId', '=', 'user.userId')
            ->join('user_type', 'user_info.userType', '=', 'user_type.userTypeId')
            ->join('geslacht', 'user_info.geslacht', '=', 'geslacht.geslachtId')
            ->select('user.username', 'user.email', 'user.password', 'user_info.geboorteDatum', 'geslacht.geslachtBeschrijving', 'user_type.userTypeDescription', 'user_info.userBio')
            ->where('user.userId', '=', $userId)
            ->get()->toArray();

            $userInfoArray = json_decode(json_encode($userInfo[0]), true);

            return view('user.edit', [
                'userid' => $userId,
                'userInfo' => $userInfoArray,
                'editStatus' => 'success'
            ]);
        } else if($request->isMethod('GET')){
            

            $userInfo = DB::table('user_info')
            ->join('user', 'user_info.userId', '=', 'user.userId')
            ->join('user_type', 'user_info.userType', '=', 'user_type.userTypeId')
            ->join('geslacht', 'user_info.geslacht', '=', 'geslacht.geslachtId')
            ->select('user.username', 'user.email', 'user.password', 'user_info.geboorteDatum', 'geslacht.geslachtBeschrijving', 'user_type.userTypeDescription', 'user_info.userBio')
            ->where('user.userId', '=', $userId)
            ->get()->toArray();

            $userInfoArray = json_decode(json_encode($userInfo[0]), true);    

            return view('user.edit', [
                'userid' => $userId,
                'userInfo' => $userInfoArray,
                'editStatus'=>null
            ]);
        }
    }

    function deleteUser(Request $request) {

        if($request->isMethod('GET')){
            return view('user.delete', ['accountDeleted' => false]);
        } else if($request->isMethod('POST')){
            $choice = $request->all();

            $userId = $request->session()->get('userId');
            
            if($choice['btn'] == 'ja'){
                DB::table('user_info')->where('userId', '=', $userId)->delete();
                DB::table('user')->where('userId', '=', $userId)->delete();

                return view('user.delete', ['accountDeleted' => true]);
            } else if ($choice['btn'] == 'nee'){
                return redirect('/user/profile');
            }
        }
    }
}
