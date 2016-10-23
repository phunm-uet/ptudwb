<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

	    protected $fillable = [
        'name', 'description'
    	];	


	public function user(){
		return $this->belongsTo('App\User');
	}


    public function likes(){
    	return $this->hasMany("App\Likes");
    }

    public function collection(){
    	return $this->belongsTo('App\Collection');
    }

    public function userName(){

    	return $this->user()->name;
    }
}
