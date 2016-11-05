<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Document;
use App\User;
use App\Collection;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application index.
     * Show all Document on database
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $documents = new Document();
        $collections = Collection::all();
        $documents = $documents->paginate(10);
        return view('home')->with(['documents' => $documents])->withCollections($collections);
    }
}
