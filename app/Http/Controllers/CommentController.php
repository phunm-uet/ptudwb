<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Document;
use App\Comment;
use DB;
use Auth;

class CommentController extends Controller
{   
    /**
     * Show All Comment On Document ID
     */
    public function getDocumentID($id){
    	$documents = Document::find($id)->orderBy(DB::raw('RAND()'))->take(4)->get();;
    	$document = Document::findOrFail($id);
    	$comments = Comment::where('document_id','=',$id)->orderBy('created_at', 'desc')->get();
    	return view('frontend.getdocumentid')->with('document', $document)->with('comments', $comments)->with('documents', $documents);
    }

    /**
     * Comment on Document
     */
    public function postCommentDocument(Request $request){
    	$data = $request->all();
        // print_r($data);
        $comment = new Comment;
        $user_id = Auth::user()->id;
        $comment->user_id = $user_id;
        $comment->doc_id = $data['doc_id'];
        $comment->content = $data['content'];
        $comment->save();
    }
    /**
     * Delete Comment
     */
    public function deleteComment(Request $request){
        $id = $request->id;
        $comment = Comment::find($id);
        $comment->delete();
    }

    
}
