@extends('layouts.master')

@section('title') Subdomain Listing @endsection

@section('content')
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Subdomain Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Subdomain</a>
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
						<form id="search_subdomain" method="POST" action="">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Search</label>
										<input type="text" class="form-control free_text" name="freetext" placeholder="Search for..." value="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Status</label>
										<select class="form-control select2-search-disable status_search">
											<option value selected>Select Status</option>
											<option value="active">Active</option>
											<option value="disable">Disable</option>
										</select>
										{{-- <input type="text" class="form-control free_text" name="freetext" placeholder="Search for..." value=""> --}}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary  waves-effect waves-light mb-2 mr-2" name="submit" value="search">
											<i class="fas fa-search mr-1"></i> Search
										</button>
										<button type="button" class="btn btn-danger reset-filter waves-effect waves-light mb-2 mr-2" name="submit" value="reset">
											<i class="fas fa-times mr-1"></i> Reset
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="table-responsive">
					<table class="subdomain-datatable table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>Feature Section</th>
								<th>Feature Module</th>
								<th>Additional Charge (RM)</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
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
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script>
	$(document).ready(function(e) {
		initializeDatatable();

		$("#search_subdomain").submit(function(e){
			e.preventDefault();
			let free_text = $('.free_text').val();
			let search_status = $('.status_search').val();
			$('.subdomain-datatable').DataTable().destroy();

			initializeDatatable(free_text, search_status);
		});

		$('.reset-filter').on('click', function () {
			$('.free_text').val('');
			$('.status_search').val('');
			$('.subdomain-datatable').DataTable().destroy();
			initializeDatatable();
		})

		function initializeDatatable (search = '', status = '') {
			var table = $('.subdomain-datatable').DataTable({
				processing: true,
				serverSide: true,
				searching: false,
				ajax: {
					type: 'POST',
					url: "{{ route('feature.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						search: search,
						status: status,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'feature_group', name: 'feature_group' },
					{ data: 'feature_title', name: 'feature_title' },
					{ data: 'feature_extra_charge', name: 'feature_extra_charge' },
					{ data: 'feature_status', name: 'feature_status', orderable: false },
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

		$('.subdomain-datatable').on('click', '.edit-status', function () {
			let alertTitle, alertText, alertBtnText, moduleTitle = '';
			moduleTitle = $(this).data('module-name');

			let feature_id = $(this).data('feature-id');
			let feature_status = $(this).data('feature-status');
			if ($(this).data('status') == 'disable') {
				alertTitle = 'Active Feature';
				alertText = `Are you sure u want to enable ${moduleTitle}?`;
				alertBtnText = 'Enable';
			} else {
				alertTitle = 'Disable Feature';
				alertText = `Are you sure u want to disable ${moduleTitle}?`;
				alertBtnText = 'Disable';
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
						url: "{{ route('feature.change-status') }}",
						data: {
							_token: "{{ csrf_token() }}",
							feature_id: feature_id,
							feature_status: feature_status
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
										let free_text = $('.free_text').val();
										let search_status = $('.status_search').val();
										$('.subdomain-datatable').DataTable().destroy();
										initializeDatatable(free_text, search_status);
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