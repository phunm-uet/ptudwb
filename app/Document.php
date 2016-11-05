<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use Auth;
class Document extends Model
{

	    protected $fillable = [
        'name', 'description'
    	];	


	public function user(){
		return $this->belongsTo('App\User');
	}


    public function likes(){
    	return $this->hasMany("App\Like","doc_id");
    }

    public function collection(){
    	return $this->belongsTo('App\Collection');
    }

    public function comments(){
        return $this->hasMany("App\Comment","doc_id");
    }
    public function userName(){

    	return $this->user()->name;
    }

    public function likedByMe(){
       $id = Auth::id();
       $doc_id = $this->id;
       $like = Like::where("doc_id",$doc_id)->where("user_id",$id)->first();
       if($like != null) return true;
       return false;
    }

}
