<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Document;
use App\Collection;
use App\Comment;

class DashboardController extends Controller
{
    public function index(){
    	$num_user = User::all()->count();
    	$num_doc = Document::all()->count();
    	$num_category = Collection::all()->count();
    	$num_com = Comment::all()->count();
    	return view("admin.dashboard")->with(['num_user' => $num_user,'num_doc' => $num_doc,'num_category' => $num_category,'num_com' => $num_com]);
    }
}
