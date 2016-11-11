<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Collection;
use App\Document;
/**
 * Manage Collection class
 */
class CollectionController extends Controller
{
    /**
     * Show  Document By Collection ID
     */
    public function showByID($id){
    	$collections = Collection::all();
    	if($collection = Collection::findOrFail($id)){
	    	$col_id = $collection->id;
	    	$documents = Document::where("collection_id",$col_id)->paginate(10);
	    	return view('home')->with(['documents' => $documents])->withCollections($collections)->withTitle($collection->name);    		
    	}
    	return redirect()->back();
    }

    /**
     * Delete Collection
     */
    public function delete(Request $request){
    	$id_collection = $request->id_collection;
    	$collection = Collection::findOrFail($id_collection);
    	$collection->delete();
        return redirect()->back();
    }

    public function addCollection(Request $request){
    	return Collection::create($request->all());
    }

    /**
     *  Edit Collection 
     */
    public function edit(Request $request){
        $id = $request->id_collection;

        $collection = Collection::find($id);
        $collection->name = $request->name;
        $collection->save();
        return redirect()->back();
    }

    public function create(Request $request){
 
        Collection::create($request->all());
        return redirect()->back();
    }
    /**
     * Show all collection
     */
    public function showCategory(){
    	$categorys = Collection::all();

    	return view("admin.categorys")->withCategorys($categorys);
    }

}

