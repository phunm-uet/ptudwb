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

//---------------------------------- Admin-----------------------------

Route::group(['middleware' => 'admin','prefix'=>'admin'], function(){
	// Route About Categorys
	Route::get("categorys",['as' => 'categorys','uses' => "CollectionController@showCategory"]);
	Route::post('createcategorys', ['as' => 'create-categorys','uses' => "CollectionController@create"]);
	Route::post('editcategorys', ['as' => 'edit-categorys','uses' => "CollectionController@edit"]);
	Route::post('deletecategorys', ['as' => 'delete-categorys','uses' => "CollectionController@delete"]);

	// Route Members
	Route::group(['namespace' => "Admin"], function(){
		Route::get("/",["uses" => "DashboardController@index", "as" => "dashboard"]);
		Route::get("members",['as' => 'members','uses' => "MemberController@showMembers"]);
		Route::post("delete-user",['uses'=>"MemberController@delete",'as'=>"delete-user"]);
		Route::post("active-user",['uses'=>"MemberController@active",'as'=>"active-user"]);
		Route::post("admin-user",['uses'=>"MemberController@setAdmin",'as'=>"admin-user"]);
	});

	// Document

	Route::get('documents',['uses' => "DocumentController@show",'as' => "documents"]);

});



Route::group(['middleware' => "auth"],function(){
	Route::post("like",["uses" => "LikeController@like","middleware" => "auth"]);
	Route::post('updatedocument', 'DocumentController@updateDocument');
	Route::post('deletedocument', ['uses' => 'DocumentController@deleteDocument','as' => 'deletedocument']);
	Route::post('comment', 'CommentController@postCommentDocument');
	Route::post('updateprofile', 'UserController@updateProfile');
	Route::get('editprofile', 'UserController@editProfile');
	Route::get('upload', 'UploadController@getUpload');
	Route::post('upload', 'UploadController@postUpload');
});


Route::get('/','HomeController@index');

Route::auth();

Route::get('collection/{id}', 'CollectionController@showByID');
Route::get('document/{id?}', 'DocumentController@index');
Route::get("profile/{id}","UserController@showprofile");
Route::get('search', ["as" => "search","uses" => "DocumentController@search"]);



Route::get("/test","LikeController@getMax");