@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset('public/css/sidebar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/home.css') }}">
@stop
@section('content')
<div class="main">
<div class="col-xs-12">
    <div class="col-xs-3">
        @include('includes.sidebar')
    </div>
    <div class="col-xs-8">
          @if (count($documents))
          @foreach ($documents as $document)
                <div class="col-xs-12 card">
                    <div class="card-content">
                      <div class="info row">
                          <div class="col-xs-1">
                              <img src="https://67.media.tumblr.com/938995724f6328457166edc9711ce766/tumblr_nmewe1DK3N1scpx21o1_500.png" alt="baymax" class="img img-circle img-author">
                          </div>
                          <div class="col-xs-9">
                            <div class="author">
                                <a href="#" title="">{{ $document->user->name }}</a>
                                <span>  in </span>
                                <a href="#" title="">{{ $document->collection->name }}</a>
                            </div>
                            <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true"></i><span>  {{ $document->created_at->format('d-m-Y') }}</span>
                            </div>
                          </div>
                      </div>
                      {{-- End of info --}}

                      <div class="row">
                          <div class="col-xs-9 content-article">
                           <a href="#" title="" class="link-title"><h3>{{ $document->title }}</h3></a>
                           <div class="article-content">
                            @if (strlen($document->description) < 350)
                               {{ $document->description }}<a href="#" title="">Chi tiết</a>
                            @else
                                {{ substr($document->description,0,350) }}.....<a href="#" title="">Chi tiết</a>
                            @endif
                             
                           </div>
                          </div>
                          <div class="col-xs-3">
                              <img src="{{ $document->path }}" alt="" class="article-thumbnail">
                          </div>
                      </div>

                      {{--  End of article conyent  --}}
                      <div class="row action">
                        <div class="like col-xs-12">
                          <a href="#" ><i class="fa fa-heart"></i></a>  69
                          <a href="#" ><i class="fa fa-comments-o "></i>  96</a>
                        </div>
                      </div>

                      {{-- End of action --}}
                    </div>
                    {{--  End of card content --}}
                </div>
                {{-- End of div card --}} 
                  @endforeach
              {!! $documents->render() !!}
          @endif      
    </div>
</div>


</div>
@endsection
