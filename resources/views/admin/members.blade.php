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
@section('content')
	<meta name="_token" content="{!! csrf_token() !!}">
	<ol class="breadcrumb" style="margin-left: -50px">
	    <li><a href="#">Home</a></li>
	    <li><a href="#">Dashboard</a></li>
	    <li class="active">Members</li>
  </ol>

  <div class="row">
  	<div class="col-md-11">
  		<table class="table table-striped table-bordered" id="members">
  			<thead>
  				<tr>
  					
  					<th>Name</th>
  					<th>Email</th>
  					<th>Username</th>
  					<th>Status</th>
  					<th>Active</th>
  				</tr>
  			</thead>
  			<tbody>
				@foreach ($members as $member)
					<tr>
						<td>
							<a href="{{ Request::root()."/users/".$member->id }}" target="_blank">
								<img src="https://67.media.tumblr.com/938995724f6328457166edc9711ce766/tumblr_nmewe1DK3N1scpx21o1_500.png" alt="" class="img-circle avatar">
								{{$member->name}}								
							</a>

						</td>
						<td>{{$member->email}}</td>
						<td class="username">{{$member->username}}</td>
						@if ($member->active == 1)
							<td>Actived</td>
						@else
							<td>Pendding</td>
						@endif
						<td>
							@if ($member->active == 0)
								<button type="" class="btn btn-xs btn-primary active-user"><i class="fa fa-check"></i>Active</button>
							@endif
							<button type="" class="btn btn-xs btn-danger delete-user"><i class="fa fa-close"></i>Delete</button>
							<button type="" class="btn btn-xs btn-warning admin-user"><i class="fa fa-rocket"></i>Set admin</button>
						</td>
					</tr>
				@endforeach
  			</tbody>
  		</table>
  	</div>
  </div>

  <div class="modal fade" id="active-user">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Active User</h4>
  			</div>
  			<div class="modal-body">
  				<p> Do you want active for <span class="user-name"></span></p>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-primary btn-active"><i class="fa fa-check"></i>  Active</button>
   				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Active User --}}

  <div class="modal fade" id="delete-user">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Delete User</h4>
  			</div>
  			<div class="modal-body">
  				<p> Do you want delete <span class="user-name"></span></p>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-danger btn-delete"><i class="fa fa-check"></i>  Delete</button>
   				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Delete User --}}

  <div class="modal fade" id="admin-user">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"><i class="fa fa-question" aria-hidden="true"></i>    Set Admin</h4>
  			</div>
  			<div class="modal-body">
  				<p> Do you want set <span class="user-name"></span> for Admin </p>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-success btn-admin"><i class="fa fa-check"></i>  Ok</button>
  				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Close</button>
  				
  			</div>
  		</div>
  	</div>
  </div>
  {{-- Model Set Admin User --}}

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

		    $('#members').DataTable();
		    // Show model active user
		    $(".active-user").on("click",function(e){
		    	e.preventDefault();
		    	var tr = $(this).parents("tr");
		    	username = $(tr).children(".username").text();
		    	$(".user-name").text(username);
		    	$("#active-user").modal();
		    });

		    // Show modal delete user
		   	$(".delete-user").on("click",function(e){
		    	var tr = $(this).parents("tr");
		    	username = $(tr).children(".username").text();
		    	$(".user-name").text(username);		   		
		    	e.preventDefault();
		    	$("#delete-user").modal();
		    });

		   	// Show modal set admin
		   	$(".admin-user").on("click",function(e){
		    	var tr = $(this).parents("tr");
		    	username = $(tr).children(".username").text();
		    	$(".user-name").text(username);		   		
		    	e.preventDefault();
		    	$("#admin-user").modal();
		    });

		   	// Confirm active user
		   	$(".btn-active").on("click",function(){
		   		var modal = $(this).parents('.modal-content');
		   		
		   		var username = $(modal).find('.user-name').text();
		   		console.log(username);
		   	});
		   	// Delete user
		   	$(".btn-delete").on("click",function(){

		   		$.post('{{ route('delete-user') }}', {
		   			username: username
		   		}, function(data, textStatus, xhr) {
		   				
		   		});
		   	});
		   	// Active User
	    	$(".btn-active").on("click",function(){
	   			$.post('{{ route('active-user') }}', {
	   				username: username
	   			}, function(data, textStatus, xhr) {
	   					
	   			});
	   		});
	    	// Set Admin
	    	$(".btn-admin").on("click",function(){
	   			$.post('{{ route('admin-user') }}', {
	   				username: username
	   			}, function(data, textStatus, xhr) {
	   					
	   			});
	   		});		   				   	
		} );
	</script>
@stop