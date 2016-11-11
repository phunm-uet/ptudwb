<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Collection;
use App\Document;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    /**
     * Show view Upload
     */
    public function getUpload(){
    	$collections = Collection::all();
    	return view('frontend.upload')->with('collections', $collections);
    }

    /**
     * Upload
     */
    public function postUpload(UploadRequest $request){
    	
    	$file = $request->book;
        if ($file != null) {
        	$time = Carbon::now()->timestamp;
            $filename = str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            if($extension == "pdf" || $extension == "jpg" ||  $extension == "png"){
                $fullName = $filename.".".$extension;
                $file_new = $file->move(base_path().'/storage/documents', $fullName);
                $realPath = $file_new->getrealPath()."[0]";
                $file_img = "storage/photos/".$time.".jpg";
                $test = exec("convert $realPath $file_img");                
            } else {
                $file_img = "default.jpg";
            }

            $data = $request->all();
            $document = new Document;
            $document->title = $data['title'];
            $document->description = $data['description'];
            $document->path = $fullName;
            $document->user_id = $data['user_id'];
            $document->image = $file_img;
            $document->collection_id = $data['collection_id'];
            $document->save();
            $doc_id = $document->id;
            return redirect("/document/$doc_id");

        }else {
            return 'file null';
        }
    }
}

