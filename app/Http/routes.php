<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');

Route::auth();

Route::get("/timeline",function(){
	return view("frontend.profile");
});

Route::get("/home2",function(){
	return view("home2");
});

Route::group(['namespace' => 'Admin','middleware' => 'admin'], function(){
	Route::get("/admin",function(){
		return view("admin.dashboard");
	});
	Route::get("admin/members",['as' => 'members','uses' => "MemberController@showMembers"]);
	Route::get("admin/categorys",['as' => 'categorys','uses' => "CategoryController@showCategory"]);
	Route::post("admin/delete-user",['uses'=>"MemberController@delete",'as'=>"delete-user"]);
	Route::post("admin/active-user",['uses'=>"MemberController@active",'as'=>"active-user"]);
	Route::post("admin/admin-user",['uses'=>"MemberController@setAdmin",'as'=>"admin-user"]);
});

Route::post("like",["uses" => "LikeController@like","middleware" => "auth"]);  