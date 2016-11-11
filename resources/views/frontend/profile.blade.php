@extends('layouts.app')
@section('title')
  {{ $user->name }}
@stop
@section('style')
  <link rel="stylesheet" href="{{ asset('public/css/sidebar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/home.css') }}">
@stop
@section('content')
<div class="main">
<div class="col-xs-12">
    <div class="col-xs-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="{{ asset('storage/avatar/'.$user->avatar ) }}" class="img-circle" style="width: 100%;height: auto; margin: auto">
                <hr>
                 <i class="fa fa-user"></i>  <a href="{{ url('profile/'.$user->id) }}">{{$user->name}}</a>
                <hr>
                  <i class="fa fa-envelope-square" aria-hidden="true"></i>  {{$user->email}}
                <hr>
                  <i class="fa fa-heart" aria-hidden="true"></i>  {{$likes}}                  
            </div>
        </div>
    </div>
    <div class="col-xs-7">
    @if(Session::has("update_success"))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Update Thành công!</strong><br>
      </div>
    @endif

    @if(Session::has("delete_success"))
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Xóa Thành công!</strong><br>
      </div>
    @endif
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
                                <a href="{{ url('profile/'.$document->user->id) }}" title="">{{ $document->user->name }}</a>
                                <span>  in </span>
                                <a href="{{ url('collection/'.$document->collection->id) }}" title="">{{ $document->collection->name }}</a>
                            </div>
                            <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true"></i><span>  {{ $document->created_at->format('d-m-Y') }}</span>
                            </div>
                          </div>
                      </div>
                      {{-- End of info --}}

                      <div class="row">
                          <div class="col-xs-9 content-article">
                           <a href="{{ url('document/'.$document->id) }}"><h3  class="doc-title">{{ $document->title }}</h3></a>
                           <div class="article-content">
                            @if (strlen($document->description) < 350)
                               {{ $document->description }}
                            @else
                                {{ substr($document->description,0,350) }}.....<a href="{{ url('document/'.$document->id) }}" title="">Chi tiết</a>
                            @endif
                             
                           </div>
                          </div>
                          <div class="col-xs-3">
                              <img src="{{ asset($document->image) }}" alt="" class="article-thumbnail" style="width: 100%;height: 150px">
                          </div>
                      </div>

                      {{--  End of article conyent  --}}
                      <div class="row action">
                        <div class="col-xs-10">
                          @if (Auth::check())
                            @if ($document->likedByMe())
                               <i class="fa fa-heart like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
                            @else
                               <i class="fa fa-heart-o like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
                            @endif
                            <a href="{{ url('document/'.$document->id."#comment") }}" ><i class="fa fa-comments-o "></i>  {{{ count($document->comments)}}}</a>
                            @if (Auth::user()->id == $document->user->id || Auth::user()->admin == 1)
                                <a href="" title="" class="edit"><i class="fa fa-edit"> </i> Edit</a>
                                <a href="" title="" class="delete"><i class="fa fa-close"></i> Delete</a>
                            @endif
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
              {!! $documents-> links() !!}
          @endif      
    </div>
</div>


</div>

  <div class="modal fade" id="delete">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Delete Document</h4>
        </div>
        <div class="modal-body">
          <p> Do you want delete <span class="document-name"></span></p>
        </div>
        <div class="modal-footer">
          <form action="{{ url('deletedocument') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="doc_id" id="doc_id_del" value="">
             <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-check"></i>  Delete</button>
             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
          </form>
         
          
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="edit-document">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Edit Document</h4>
        </div>
        <div class="modal-body">
        <div class="row">
          <div class="col-xs-8 col-xs-offset-2">
          <form action="{{ url('updatedocument') }}" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <input type="text" name="doc_id" id="doc_id" value="" hidden="true">
                <div class="form-group">
                <label>Title</label>
                  <input type="text" id="input-title" name="title" class="form-control" required="required">
                </div>
                <div class="form-group">
                <label>Description</label>
                  <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>            
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok" ></span>  Save</button> 
          </form>
          
          </div>      
        </div>
        </div>
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
        var numLikeEle = $(this).parents(".action").find(".num-like");
        var doc_id = $(this).parents(".card").find(".doc_id").text();
        $.post("{{ url('like') }}",{
          doc_id : doc_id,
        },function(data){
          $(numLikeEle).text(data);
        }) 
        return false;
      })

      $(".delete").on("click",function(){

        $("#delete").modal();
        var doc_id = $(this).parents(".card").find(".doc_id").text();
        $("#doc_id_del").val(doc_id);
        return false;
      });

      $(".edit").on("click",function(){
        $("#edit-document").modal();
        var doc_id = $(this).parents(".card").find(".doc_id").text();
        var title = $(this).parents(".card").find(".doc-title").text();
        var description = $(this).parents(".card").find(".article-content").text().trim();

        $("#input-title").val(title);
        $("#doc_id").val(doc_id);
        $("#description").val(description);
        return false;
      });

    });
  </script>
@stop