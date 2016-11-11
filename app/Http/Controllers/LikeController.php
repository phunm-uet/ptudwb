<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;
use App\Http\Requests;
use DB;
use App\Document;

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
        return Like::where("doc_id",$doc_id)->count();
    }

    public function getMax()
    {
        $likes = Like::groupBy('doc_id')->select('doc_id', DB::raw('count(*) as total'))->orderBy('total',"DESC")->take(3)->get();
        $i = 0;
        foreach ($likes as $like) {
            $document = Document::where("id",$like->doc_id)->first();
            $doc_trend[$i] = $document->title;
            $i++;
        }
    }
}
