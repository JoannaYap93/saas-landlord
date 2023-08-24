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
						<form method="POST" action="" id="search_user">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Search</label>
										<input type="text" class="form-control search-text" name="freetext" placeholder="Search for...">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">User Status</label>
										{!! Form::select('user_status', $user_status_sel, '', ['class' => 'form-control user-status']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">User Role</label>
										{!! Form::select('user_role_id', $user_role_sel, '', ['class' => 'form-control user-role', 'id' => 'user_role_id']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Gender</label>
										{!! Form::select('user_gender', $user_gender_sel, '', ['class' => 'form-control user-gender', 'id' => 'user_gender']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary  waves-effect waves-light mb-2 mr-2" name="submit" value="search">
											<i class="fas fa-search mr-1"></i> Search
										</button>
										<button type="button" class="btn btn-danger  waves-effect waves-light mb-2 mr-2 reset-filter" name="submit" value="reset">
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
					<table class="table table-nowrap user-datatable">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>User Profile</th>
								<th>User Detail</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Page-content -->
<!-- Modal -->
<!-- End Modal -->
@endsection

@section('script')
<script>
	$(document).ready(function(e) {
		initializeDatatable();

		function initializeDatatable (search = '', status = '', role = '', gender = '') {
			var table = $('.user-datatable').DataTable({
				processing: true,
				serverSide: true,
				searching: false,
				ajax: {
					type: 'POST',
					url: "{{ route('user.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						search: search,
						status: status,
						role: role,
						gender: gender
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'user_fullname', name: 'user_fullname' },
					{ data: 'user_detail', name: 'referral_code' },
					{ data: 'status', name: 'status', orderable: false },
					{ data: 'action', name: 'action', orderable: false },
				],
				language: {
					'processing': '<i class="fa fa-spinner fa-spin fa-5x fa-fw"></i><span class="sr-only">Loading...</span> ',
					'paginate': {
						'previous': '<i class="mdi mdi-chevron-left"></i>',
						'next': '<i class="mdi mdi-chevron-right"></i>'
					}
				},
				drawCallback: function() {
					$('.pagination').addClass('pagination-rounded justify-content-end mb-2');
				}
			});
		}

		$("#search_user").submit(function(e){
			e.preventDefault();
			let search_text = $('.search-text').val();
			let user_status = $('.user-status').val();
			let user_role = $('.user-role').val();
			let user_gender = $('.user-gender').val();
			$('.user-datatable').DataTable().destroy();
			initializeDatatable(search_text, user_status, user_role, user_gender);
		});

		$('.reset-filter').on('click', function () {
			$('.search-text').val('');
			$('.user-status').val('');
			$('.user-role').val('');
			$('.user-gender').val('');
			$('.user-datatable').DataTable().destroy();
			initializeDatatable();
		})

		$('.user-datatable').on('click', '.change-status-user', function () {
			let alertTitle, alertText, alertBtnText, salesPerson = '';
			salesPerson = $(this).data('user-name');

			let user_id = $(this).data('id');
			let user_status = $(this).data('status');
			if (user_status == 'suspend') {
				alertTitle = 'Suspend User';
				alertText = `Are you sure u want to suspend ${salesPerson}?`;
				alertBtnText = 'Suspend';
			} else {
				alertTitle = 'Active User';
				alertText = `Are you sure u want to active ${salesPerson}?`;
				alertBtnText = 'Active';
			}

			Swal.fire({
				title: alertTitle,
				text: alertText,
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#228B22',
				cancelButtonColor: '#d33',
				confirmButtonText: alertBtnText
			}).then(function (results) {

				if (results.value) {
					$.ajax({
						type: "POST",
						url: "{{ route('user.change-status') }}",
						data: {
							_token: "{{ csrf_token() }}",
							user_id: user_id,
							user_status: user_status
						},
						dataType: "json",
						encode: true,
						success: function(data){  
							if (data.status == 200) {
								Swal.fire({
									type: 'success',
									title: 'Success!',
									text: data.message,
								}).then((result) => {
									if (result.value) {
										$('.search-text').val('');
										$('.user-status').val('');
										$('.user-role').val('');
										$('.user-gender').val('');
										$('.user-datatable').DataTable().destroy();
										initializeDatatable();
									}
								});
							} else {
								Swal.fire({
									type: 'error',
									title: 'Something went wrong!',
									text: 'Please try again later!',
								})
							}
						},
						error: function(error) { 
							Swal.fire({
								type: 'error',
								title: 'Something went wrong!',
								text: 'Please try again later!',
							})
						}
					})
				}
			});
		});
	});
</script>
@endsection