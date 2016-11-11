<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UploadRequest;
use App\Collection;
use App\Document;
use Auth;
use DB;

class DocumentController extends Controller
{
    // Show Docuent by ID
    public function index($id){
        $document = Document::find($id);

        if(count(Document::all()) > 4){
            $documents = Document::all()->random(4);    
        } else {
            $documents = Document::all()->random(count(Document::all()));
        }

        return view("frontend.viewdocument")->withDocument($document)->withDocuments($documents);

    }

    /**
     * Delete Document
     */
    public function deleteDocument(Request $request){
        $doc_id = $request->doc_id;
        if(Auth::user()->admin == 1){
            $document = Document::find($doc_id);
        } else {
            $user_id = Auth::user()->id;
            $doc_id = $request->doc_id;
            $document = Document::where("id",$doc_id)->where("user_id",$user_id);            
        }

        if($document){
            $document->delete();
            session()->flash('delete_success', "1");
            return redirect()->to("/");
        } else {
            return false;
        }
    }
    /**
     * Edit or Update Document
     */
    public function updateDocument(Request $request){
        $doc_id = $request->doc_id;
        $title = $request->title;
        $description = $request->description;
        if(Auth::user()->admin == 1){
            $document = Document::find($doc_id);
        } else {
            $user_id = Auth::user()->id;
            $document = Document::where("id",$doc_id)->where("user_id",$user_id);
        }
        if($document){
            $document = $document->first();
            $document->title = $title;
            $document->description = $description;
            $document->save();
            session()->flash('update_success', "1");
            return redirect()->back();
        } else {
            return false;
        }       
    }

    /**
     * Show all Document 
     */
    public function show(){
        $documents = Document::all();
        return view("admin.documents")->withDocuments($documents);
    }


    public function search (Request $request){
        $collections = Collection::all();
        $keyword = $request->q;
        $documents = DB::table("documents")->where("title",'LIKE',"%$keyword%")->orWhere("description","LIKE","%$keyword%")->get();
        return view("frontend.search")->withDocuments($documents)->withCollections($collections);
    }
}
