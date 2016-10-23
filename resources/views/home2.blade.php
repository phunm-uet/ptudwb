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
    <div class="col-xs-9">
        <div class="col-xs-12">

          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="http://www.abebooks.com/images/books/harry-potter/deathly-hallows.jpg" alt="">
                <div class="overlay">
                   <h5>Title 1</h5>
                   <a class="info" href="#">See More</a>
                </div>
            </div>
              <p class="like-comment">
                  <a href="#" ><i class="fa fa-heart-o"> 69</i></a>
                  <a href="#" ><i class="fa fa-comments-o "> 96</i></a>
                  <a href="" title="" class="pull-right">Tác giả</a>
              </p>         
          </div>

          {{-- End of Document --}}
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="https://vcdn.tikicdn.com/cache/w232/media/catalog/product/t/i/tim-kiem-steve-jobs-tiep-theo_1.jpg" alt="">
                <div class="overlay">
                   <h5>Title 1</h5>
                   <a class="info" href="#">See More</a>
                </div>
            </div>
              <p class="like-comment">
                  <b>Steve Jobs</b>
              </p>  
              <p class="like-comment">
                  <a href="#" ><i class="fa fa-heart" style="color: red"> 69</i></a>
                  <a href="#" ><i class="fa fa-comments-o"> 96</i></a>
                  <a href="" title="" class="pull-right">Tác giả</a>
              </p>         
          </div>
          {{-- End of Document --}}

          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="https://img.buzzfeed.com/buzzfeed-static/static/2014-07/30/12/enhanced/webdr11/grid-cell-16797-1406738146-4.jpg" alt="">
                <div class="overlay">
                   <h5>Title 1</h5>
                   <a class="info" href="#">See More</a>
                </div>
            </div>
              <p class="like-comment">
                  <a href="#" ><i class="fa fa-heart-o"> 69</i></a>
                  <a href="#" ><i class="fa fa-comments-o "> 96</i></a>
                  <a href="" title="" class="pull-right">Tác giả</a>
              </p>         
          </div>
          {{-- End of Document --}}
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="https://images-na.ssl-images-amazon.com/images/I/5174GQsw2oL._SX329_BO1,204,203,200_.jpg" alt="">
                <div class="overlay">
                   <h5>Title 1</h5>
                   <a class="info" href="#">See More</a>
                </div>
            </div>
              <p class="like-comment">
                  <a href="#" ><i class="fa fa-heart-o"> 69</i></a>
                  <a href="#" ><i class="fa fa-comments-o "> 96</i></a>
                  <a href="" title="" class="pull-right">Tác giả</a>
              </p>         
          </div>
          {{-- End of Document --}}                                 
        </div>        
    </div>
</div>


</div>
@endsection
