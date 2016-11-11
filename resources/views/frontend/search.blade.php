@extends('layouts.app')
@section('style')
  <link rel="stylesheet" href="{{ asset('public/css/sidebar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/home.css') }}">
@stop

@section('content')
	<div id="main">
		<div class="col-xs-12">
			<div class="col-xs-3">
				@include('includes.sidebar')
			</div>
			<div class="col-xs-7" style="background-color: #fff">
				@foreach ($documents as $document)
					<div class="item" style="padding: 20px;">
					<div class="row">
						<div class="col-xs-3">
							<img src="{{ asset($document->image) }}" alt="" style="width: 100%">
						</div>
						<div class="col-xs-9">
							<a href="{{ url('document/'.$document->id) }}" title="" target="_blank"><h3>{{ $document->title}}</h3></a>
							<hr>
							@if (strlen($document->description) < 300)
								<h5>{{ $document->description }}</h5>
							@else
								<h5>{{substr($document->description,0,300)}}...</h5>
							@endif
							
						</div>
					</div>
					
						
					</div>
					
				@endforeach
			</div>
		</div>
	</div>
@stop