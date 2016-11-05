<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;
use App\Http\Requests;


class LikeController extends Controller
{
    public function like(Request $request){
    	$user_id = Auth::id();
    	$doc_id = $request->doc_id;
    	$like = Like::where("user_id",$user_id)->where("doc_id",$doc_id)->first();
    	if($like != null) {
    		$like->delete();
    	} else {
    		$like = new Like();
    		$like->user_id = $user_id;
    		$like->doc_id = $doc_id;
    		$like->save();
    	}
    }
}
