<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Document;
use App\User;
use App\Collection;
class HomeController extends Controller
{

    public function index()
    {
        $documents = new Document();
        $collections = Collection::all();
        $documents = $documents->paginate(10);
        return view('home')->with(['documents' => $documents])->withCollections($collections)->withTitle("Home");
    }
}
