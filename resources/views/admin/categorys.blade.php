@extends('admin.layouts')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<style type="text/css" media="screen">
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
@section('content')
	
	<ol class="breadcrumb" style="margin-left: -50px">
	    <li><a href="#">Home</a></li>
	    <li><a href="#">Dashboard</a></li>
	    <li class="active">Categorys</li>
  </ol>

  <div class="row">

  	<div class="col-md-6 col-md-offset-2" style="margin-top: 30px">
  	<button type="button" class="btn btn-success" id="btn-add"><span class="glyphicon glyphicon-plus"></span>  Add Category</button>
  	<br><br>
  		<table class="table table-striped table-bordered" id="members">
  			<thead>
  				<tr>
  					
  					<th>Name Category</th>
  					<th>Active</th>
  				</tr>
  			</thead>
  			<tbody>
				@foreach ($categorys as $category)
					<tr>
						<td>
							<a href="{{ Request::root()."/users/".$category->id }}" target="_blank" class="category_name">
								{{$category->name}}								
							</a>

						</td>
						<td>
							<button type="" class="btn btn-xs btn-danger delete-category"><i class="fa fa-close"></i>Delete</button>
							<button type="" class="btn btn-xs btn-warning edit-category"><i class="fa fa-rocket"></i>Edit</button>
						</td>
					</tr>
				@endforeach
  			</tbody>
  		</table>
  	</div>
  </div>

  <div class="modal fade" id="delete-category">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Delete Category</h4>
  			</div>
  			<div class="modal-body">
  				<p> Do you want delete <span class="category-name"></span></p>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-danger btn-delete"><i class="fa fa-check"></i>  Delete</button>
   				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Delete Category --}}

  <div class="modal fade" id="edit-category">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Edit Category</h4>
  			</div>
  			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
	  				<div class="form-group">
	  					<input type="text" id="input-category" class="form-control" required="required">
	  				</div>
	  				
					<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span>  Save</button>						
					</div>			
				</div>
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Edit Category --}}

   <div class="modal fade" id="add-category">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Edit Category</h4>
  			</div>
  			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
	  				<div class="form-group">
	  					<input type="text" id="input-category" class="form-control" required="required">
	  				</div>
	  				
					<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span>Save</button>						
					</div>			
				</div>
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Add Category --}}

@stop

@section('script')
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

		    // Show modal delete user
		   	$(".delete-category").on("click",function(e){
		    	var tr = $(this).parents("tr");
		    	nameCategory = $(tr).find(".category_name").text();
		    	$(".category-name").text(nameCategory);		   		
		    	e.preventDefault();
		    	$("#delete-category").modal();
		    });

		   	// Show modal set admin
		   	$(".edit-category").on("click",function(e){
		    	var tr = $(this).parents("tr");
		    	nameCategory = $(tr).find(".category_name").text();
		    	nameCategory = nameCategory.trim();
		    	$("#input-category").val(nameCategory);		   		
		    	e.preventDefault();
		    	$("#edit-category").modal();
		    });

		   	$("#btn-add").on("click",function(e){
		    	$("#add-category").modal();
		    });		    

		} );
	</script>
@stop