@extends('layouts.master')

@section('title') Role Listing @endsection

@section('content')

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Role Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Role</a>
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
					{{-- @can('user_role_manage') --}}
					<div class="col-sm-12">
						<div class="text-sm-right">
							<a href="{{ route('user_role_add') }}">
							<button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-2">
								<i class="mdi mdi-plus mr-1"></i> Add New Role
							</button>
							</a>
						</div>
					</div>
					{{-- @endcan			 --}}
				<div class="table-responsive">
					<table class="table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>Role Title</th>
								<th>Total User</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $num = 1; ?>
							@foreach($roles as $role)
							<tr>
								<td>{{ $num }}</td>
								<td>{{ $role->name }}</td>
								<td>{{ $user_role_count[$role->id] }}</td>								
								<td>
									{{-- @can('user_role_manage') --}}
									<a href="{{ route('user_role_edit',$role->id) }}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
										Edit & Assign Permission
									</a>		
									{{-- @endcan							 --}}
								</td>
							</tr>
							<?php $num++; ?>
							@endforeach
						</tbody>
					</table>
				</div>
				

			</div>
		</div>
	</div>
</div>									
<!-- End Page-content -->
@endsection