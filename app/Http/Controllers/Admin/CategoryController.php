<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Collection;
class CategoryController extends Controller
{
    public function showCategory(){
    	$category = Collection::all();

    	return view("admin.categorys")->withCategorys($category);
    }
}
