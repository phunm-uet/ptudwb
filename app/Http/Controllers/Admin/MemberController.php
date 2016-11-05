<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class MemberController extends Controller
{
    public function showMembers(){
    	$members = User::all();
    	return view("admin.members")->withMembers($members);
    }

	/**
	 * Function delele User
	 */
    public function delete(Request $request){
    	$username = $request->username;
    	$user = User::where("username",$username)->first();
    	$user->delete();
    }

    /**
     * Function Active for user
     */
    public function active(Request $request){
    	$username = $request->username;
    	$user = User::where("username",$username)->first();
    	$user->active = 1;
    	$user->save();
    }

    /**
     * Function set Admin for user
     */
    public function setAdmin(Request $request){
    	$username = $request->username;
    	$user = User::where("username",$username)->first();
    	$user->admin = 1;
    	$user->save();    	
    }

}
