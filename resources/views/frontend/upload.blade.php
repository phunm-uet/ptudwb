@extends('layouts.app')

@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/home.css') }}">
@stop
@section('content')
<div class="main">
<div class="col-xs-12">
  <div class="col-xs-6 col-xs-offset-3">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title text-center">Upload Document</h3>
    </div>
    <div class="panel-body">
        <div class="formupload">
          <form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required="required"><br>
            <label for="">Discription:</label>
            <textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
            {{-- <textarea name="description" id="description" cols="40" rows="3"></textarea> --}}
            <div class="clearnfix"></div><br>
            <label for="">Chon file:</label>
            <input type="file" name="book" accept="application/pdf,application/vnd.ms-excel"/>
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <br><div class="clearnfix"></div>
            <label for="">Chon loai tai lieu:</label>
            <select name="collection_id" id="collection_id" class="form-control" required="required">
              @foreach($collections as $collection)
                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
              @endforeach
            </select>
            {{-- <input type="submit"> --}}
            <div class="clearnfix"></div><br>
            <button type="submit" class="btn btn-primary">Create Document</button>
          </form>
        </div> 
    </div>
  </div>
</div>
</div>
{{-- <link rel="stylesheet" href="{{ asset('public/css/updatedocument.css') }}"> --}}
@endsection
