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
    <div class="col-xs-7">
    <meta name="_token" content="{!! csrf_token() !!}">
          @if (count($documents))
          @foreach ($documents as $document)
                <div class="col-xs-12 card">
                    <div class="card-content">
                      <div class="info row">
                          <span class="doc_id" hidden="true">{{$document->id}}</span>
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
                        <div class="col-xs-12">
                          @if (Auth::check())
                            @if ($document->likedByMe())
                               <i class="fa fa-heart like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
                            @else
                               <i class="fa fa-heart-o like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
                            @endif
                            <a href="#" ><i class="fa fa-comments-o "></i>  {{{ count($document->comments)}}}</a>
                          @else
                            {{count($document->likes)}} Lượt thích
                            <i class="fa fa-comments-o "></i> {{{ count($document->comments)}}}
                          @endif
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

      $(".like").on("click",function(e){
        // alert("a");
        $(this).toggleClass("fa-heart-o fa-heart");
        if($(this).hasClass("fa-heart")){
          var numLikeEle = $(this).parents(".action").find(".num-like");
          var numLike = $(numLikeEle).text();
          numLike = parseInt(numLike) + 1;
          $(numLikeEle).text(numLike);
        } else{
          var numLikeEle = $(this).parents(".action").find(".num-like");
          var numLike = $(numLikeEle).text();
          numLike = parseInt(numLike) - 1;
          $(numLikeEle).text(numLike);
        }
        var doc_id = $(this).parents(".card").find(".doc_id").text();
        $.post("like",{
          doc_id : doc_id,
        },function(data){

        }) 
        return false;

      })

    });
  </script>
@stop