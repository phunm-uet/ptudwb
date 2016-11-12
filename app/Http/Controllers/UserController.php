<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Document;
use App\User;
use Auth;
use Hash;
use DB;
use App\Collection;
class UserController extends Controller
{

    public function showprofile($id){
    	$documents = Document::where("user_id",$id)->paginate(10);
    	$user = User::find($id);
        $num_like = DB::table("likes")->where("user_id",$id)->count();
    	return view("frontend.profile")->withDocuments($documents)->withUser($user)->withLikes($num_like);
    }

    public function editProfile(){
    	return view("frontend.updateuser");
    }

    public function updateProfile(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);
        $avatar_old = Auth::user()->avatar;
        $name_old = Auth::user()->name;
        $password = Auth::user()->password;
        $name_new = $request->name;
        $password_old = $request->old_password;
        $pass_new = $request->new_password;
        
        if($request->avatar){

            $file = $request->avatar;
            $filename = Auth::user()->id.".jpg";
            $file->move(base_path().'/storage/avatar',$filename);
            $avatar_new = $filename;
            $user['avatar'] = $avatar_new;

        }

        if($name_new != $name_old){
            $user['name'] = $name_new;
        }

        if($pass_new != ""){
                if(Hash::check($password_old, $password) && pass_new != ""){
                    
                    $pass_new = bcrypt($pass_new);
                    $user['password'] = $pass_new;

                } else if(!Hash::check($password_old, $password)){
                    session()->flash("wrong_pass",1);
                    return redirect()->back();
                } else {
                    session()->flash("empty_pass",1);
                    return redirect()->back();       
                }            
        }

        $user->save();

         session()->flash("success",1);
         return redirect()->back();
        
    }
        
}
