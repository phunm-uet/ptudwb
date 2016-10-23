<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function document(){
    	return $this->belongsTo('App\Document');
    }

     public function user(){
    	return $this->belongsTo('App\User');
    }   
}
