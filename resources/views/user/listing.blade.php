@extends('layouts.master')

@section('title') User Listing @endsection

@section('content')

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">User Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">User</a>
					</li>
					<li class="breadcrumb-item active">Listing</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-sm-8">
						<form method="POST" action="{{ route('user_listing') }}">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Freetext</label>
										<input type="text" class="form-control" name="freetext" placeholder="Search for..." value="{{ @$search['freetext'] }}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">User Status</label>
										{!! Form::select('user_status', $user_status_sel, @$search['user_status'], ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">User Type</label>
										{!! Form::select('user_type_id', $user_type_sel, @$search['user_type_id'], ['class' => 'form-control', 'id' => 'user_type']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">User Role</label>
										{!! Form::select('user_role_id', $user_role_sel, @$search['user_role_id'], ['class' => 'form-control', 'id' => 'user_role_id']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Gender</label>
										{!! Form::select('user_gender', $user_gender_sel, @$search['user_gender'], ['class' => 'form-control', 'id' => 'user_gender']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary  waves-effect waves-light mb-2 mr-2" name="submit" value="search">
											<i class="fas fa-search mr-1"></i> Search
										</button>
										<button type="submit" class="btn btn-danger  waves-effect waves-light mb-2 mr-2" name="submit" value="reset">
											<i class="fas fa-times mr-1"></i> Reset
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					{{-- @can('user_manage') --}}
					<div class="col-sm-4">
						<div class="text-sm-right">
							<a href="{{ route('user_add') }}">
								<button type="button" class="btn btn-success  waves-effect waves-light mb-2 mr-2">
									<i class="mdi mdi-plus mr-1"></i> Add New User
								</button>
							</a>
						</div>
					</div>
					{{-- @endcan --}}
				</div>
				<div class="table-responsive">
					<table class="table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;"></th>
								<th>User Profile</th>
								<th>User Detail</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<?php
							$status = '';
							$assign_permission = '';
							$action = '';
							switch ($user->user_status) {
								case 'active':
									$status = "<span class='badge badge-primary font-size-11'>{$user->user_status}</span>";
									if ($user->user_type_id == 1) {
										$assign_permission = "<a href='" . route('assign_permission', $user->user_id) . "' class='btn btn-sm btn-outline-primary waves-effect waves-light'>Assign Permission</a>";
									}
									$action = "<a href='" . route('user_edit', $user->user_id) . "' class='btn btn-sm btn-outline-primary waves-effect waves-light'>Edit</a>
											{$assign_permission}
											<span data-toggle='modal' data-target='#suspend' data-id='$user->user_id' class='suspend'><a href='javascript:void(0);' class='btn btn-sm btn-outline-danger waves-effect waves-light'>Suspend</a></span>";
									break;
								case 'suspend':
									$status = "<span class='badge badge-danger'>{$user->user_status}</span>";
									$action = "<span data-toggle='modal' data-target='#activate' data-id='$user->user_id' class='activate'><a href='javascript:void(0);' class='btn btn-sm btn-outline-success waves-effect waves-light'>Activate</a></span>";
									break;
								case 'pending':
									$status = "<span class='badge badge-warning'>{$user->user_status}</span>";
									break;
							}

							?>
							<tr>
								<td>
									<div class="avatar-xs">
										@if($user->user_profile_photo)
										<img src="{{ url($user->user_profile_photo) }}" class="rounded-circle avatar-xs" />
										@else
										<img class="rounded-circle avatar-xs" src="assets/images/users/avatar-3.jpg" alt="">
										@endif
									</div>
								</td>
								<td>
									<b>{{ $user->user_fullname }}</b><br />{{ $user->user_email}}<br />{{ $user->user_mobile }}
								</td>
								<td>
									{{-- <b>{{ $user->user_type->user_type_name }}</b> <br /> {{ $user->user_role_name }} --}}
								</td>
								<td>
									{!! $status !!}
								</td>
								<td>
									{!! $action !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<ul class="pagination pagination-rounded justify-content-end mb-2">
					<li class="page-item">
						<a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
							<i class="mdi mdi-chevron-left"></i>
						</a>
					</li>
					@for ($i = 1; $i <= $users->lastPage(); $i++)
						<li class="page-item @if($users->currentPage() == $i) active  @endif">
							<a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
						</li>
						@endfor
						<li class="page-item">
							<a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
								<i class="mdi mdi-chevron-right"></i>
							</a>
						</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Page-content -->
<!-- Modal -->
<div class="modal fade" id="suspend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" action="{{ route('user_status') }}">
				@csrf
				<!-- <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Suspend User Record</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> -->
				<div class="modal-body">
					<h4>Suspend this user ?</h4>
					<input type="hidden" , name="user_id" id="user_id">
					<input type="hidden" , name="action" value="suspend">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Suspend</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" action="{{ route('user_status') }}">
				@csrf
				<div class="modal-body">
					<h4>Activate this user ?</h4>
					<input type="hidden" , name="user_id" id="user_id">
					<input type="hidden" , name="action" value="active">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Activate</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
@endsection

@section('script')
<script>
	$(document).ready(function(e) {
		//$("#user_role").hide();
		$('.suspend').on('click', function() {
			var id = $(this).attr('data-id');
			console.log(id);
			$(".modal-body #user_id").val(id);
		});
		$('.activate').on('click', function() {
			var id = $(this).attr('data-id');
			console.log(id);
			$(".modal-body #user_id").val(id);
		});

		// $('#user_type').on('change', function() {
		//     if(this.value == 1){
		// 		alert(this.value);
		//         $("#user_role").show();
		//     } else {
		//         $("#user_role").hide();
		//     }
		// });
	});
</script>
@endsection