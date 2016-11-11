@extends('layouts.app')
@section('title')
  {{$document->title}}
@stop
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/home.css') }}">
@stop
@section('content')
  <div class="container" style="background: #FFF">
      <ol class="breadcrumb" style="background: white">
        <li>
          <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li>
          <a href="{{ url('collection/'.$document->collection->id) }}">{{$document->collection->name}}</a>
        </li>
        <li class="active">{{$document->title}}</li>
      </ol>
      <div class="show col-xs-11">
          <h3>{{$document->title}}</h3>
          <div class="info" style="margin-bottom: 10px">
              Chia sẻ: <a href="{{ url('profile/'.$document->user->id) }}"> {{$document->user->name}}</a> | <i class="fa fa-calendar" aria-hidden="true"></i><span>  {{ $document->created_at->format('d-m-Y') }}</span>
              <br>
              Category :<a href="{{ url('collection/'.$document->collection->id) }}" title="{{$document->collection->name}}">{{$document->collection->name}}</a>
          </div>
        
        <iframe src="{{asset('storage/documents/'.$document->path)}}" width="100%" height="500px" style="margin-bottom: 10px"></iframe>
        {{-- End of iframe --}}

          <div class="row action">
          <div class="col-xs-10" >
            @if ( Auth::check())
              @if ($document->likedByMe())
                 <i class="fa fa-heart like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
              @else
                 <i class="fa fa-heart-o like"></i> <span class="num-like">{{ count($document->likes )}}</span> 
              @endif

              <a href="#comment" ><i class="fa fa-comments-o "></i>  {{{ count($document->comments)}}}</a>
                @if (Auth::user()->id == $document->user->id || Auth::user()->admin == 1)
                    <a href="" title="" class="edit"><i class="fa fa-edit"> </i> Edit</a>
                    <a href="" title="" class="delete"><i class="fa fa-close"></i> Delete</a>
                @endif
            @else
              {{count($document->likes)}} Lượt thích
              <i class="fa fa-comments-o "></i> {{{ count($document->comments)}}}
            @endif
          </div>
            <div class="col-xs-2">
               @if (Auth::check())
                  <button type="button" class="btn btn-success">Download</button>
               @endif
            </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <h3>Nội dung</h3>
            <p class="description">{{$document->description}}</p>            
          </div>

        </div>
        {{-- Action Like comment --}}

        <div class="showcomment">
          @if (count($document->comments) > 0)
            @foreach ($document->comments as $comment)
              <img src="{{asset('storage/avatar/'.$comment->user->avatar)}}" alt="error" class="avatar img-circle" style="width: 30px;height: 30px; margin-right: 5px;"><a href="{{ url('profile/'.$comment->user->id) }}">{{$comment->user->name}} </a><span class="comment-content">{{$comment->content}}</span>
              <br>
            @endforeach
          @endif
        </div>
        @if (Auth::check())
          <form action="" method="POST" role="form">
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <button type="button" class="btn btn-primary" id="btn-comment">Submit</button>
          </form>          
        @else
          <span>Vui lòng </span><a href="{{ url('login') }}">Đăng nhập</a> <span> hoặc </span> <a href="{{ url('register') }}" title="">Đăng ký</a>
        @endif
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
<meta name="_token" id="_token" content="{!! csrf_token() !!}" />
@section('script')
@if (Auth::check())
  <script type="text/javascript">
  $(document).ready(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('#_token').attr('content')
              }
          })
          

        $("#btn-comment").on("click",function(e){
            e.preventDefault();
            var doc_id = {!! Request::segment(2) !!};
            var avatar = "{{ Auth::user()->avatar }}";
            var name = "{{ Auth::user()->name }}";
            var id= "{{ Auth::user()->id }}";
            var content = $("#comment").val();
            var mess = "";
            if(content != "") {
              $.post('../comment', {
                content : content,
                doc_id : doc_id,
              }, function(data) {
                mess +=  '<img src="'+avatar+'" alt="error" class="avatar img-circle" style="width: 30px;height: 30px; margin-right: 5px;"><a href="'+'../profile/'+id+'">'+ name +'</a><span class="comment-content">'+ content +'</span></br>';
                $(".showcomment").append(mess);
                $("#comment").val("");
              });
            }

        })




      $(".delete").on("click",function(){

        $("#delete").modal();
        var doc_id =  {!! Request::segment(2) !!};
        $("#doc_id_del").val(doc_id);
        return false;
      });

      $(".like").on("click",function(e){
        // alert("a");
        $(this).toggleClass("fa-heart-o fa-heart");
        var numLikeEle = $(this).parents(".action").find(".num-like");
        var doc_id = $(this).parents(".card").find(".doc_id").text();
        $.post("{{ url('like') }}",{
          doc_id : {!! Request::segment(2) !!},
        },function(data){
          $(numLikeEle).text(data);
        }) 
        return false;
      })

      $(".edit").on("click",function(){
        $("#edit-document").modal();
        var doc_id =  {!! Request::segment(2) !!};
        var title = $(".active").text();
        var description = $(".description").text().trim();

        $("#input-title").val(title);
        $("#doc_id").val(doc_id);
        $("#description").val(description);
        return false;
      });


});
</script>
@else
  {{-- false expr --}}
@endif

@stop
@endsection
