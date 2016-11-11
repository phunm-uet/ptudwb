@extends('admin.layouts')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<style type="text/css" media="screen">
		.avatar {
			width: 30px;
			height: 30px;
		}

		.modal {
			   position: absolute;
			   top: 50px;
			   bottom: 0;
			   left: 0;
			   z-index: 10040;
			   overflow: auto;
			   overflow-y: auto;
		}
	</style>
@stop

@section('title')
	Documents
@stop
@section('content')
	<meta name="_token" content="{!! csrf_token() !!}">
	<ol class="breadcrumb" style="margin-top: -20px">
	    <li><a href="#">Home</a></li>
	    <li><a href="#">Dashboard</a></li>
	    <li class="active">Documents</li>
  </ol>

  <div class="container">
  	<div class="col-md-11">
  		<table class="table table-striped table-bordered" id="members">
  			<thead>
  				<tr>
  					<th><input type="checkbox" name="" value=""></th>
  					<th>Title</th>
  					<th>Author</th>
  					<th>Likes</th>
  					<th>Comments</th>
  					<th>Active</th>
  				</tr>
  			</thead>
  			<tbody>
				@foreach ($documents as $document)
					<tr>
						<td><input type="checkbox" class="document_check" value="{{$document->id}}">
						<input type="hidden" class="doc_id" value="{{ $document->id }}">
						</td>
						<td>
							<a href="{{ Request::root()."/document/".$document->id }}" target="_blank">
							<img src="{{ asset($document->image) }}" style="width: 30px;height: 30px">
								{{$document->title}}								
							</a>

						</td>
						<td class="username">{{$document->user->name}}</td>
						<td>{{count($document->likes)}}</td>
						<td>{{count($document->comments)}}</td>
						<td>
							<button type="" class="btn btn-xs btn-danger delete-doc"><i class="fa fa-close"></i>Delete</button>
						</td>
					</tr>
				@endforeach
  			</tbody>
  		</table>
  	</div>
  </div>

  {{-- Model Delete Document --}}
  <div class="modal fade" id="delete-doc">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Delete Document</h4>
  			</div>
  			<div class="modal-body">
  				<p> Do you want delete</p>
  			</div>
  			<div class="modal-footer">
  				<form action="{{ route('deletedocument') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="doc_id" value="" id="doc_id">
					<button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-check"></i>  Delete</button>
   					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>

@stop

@section('script')
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }})

		    $('#members').DataTable({
   				'aoColumnDefs': [{
        			'bSortable': false,
        			'aTargets': [ "no-sort",-1] /* 1st one, start by the right */
    			}]
			}) ;

		    // Show modal delete document
		   	$(".delete-doc").on("click",function(e){
		    	var tr = $(this).parents("tr");
		    	doc_id = $(tr).find(".doc_id").val();
		    	$("#doc_id").val(doc_id);		   		
		    	e.preventDefault();
		    	$("#delete-doc").modal();
		    });	   				   	
		} );
	</script>
@stop