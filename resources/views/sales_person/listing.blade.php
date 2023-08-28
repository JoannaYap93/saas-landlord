@extends('layouts.master')

@section('title') Salesperson Listing @endsection

@section('content')
{{-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" /> --}}

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Salesperson Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Salesperson</a>
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
											<option value="disable">Suspend</option>
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
					<div class="col-sm-4">
						<div class="text-sm-right">
							<a href="{{ route('sales-person.add.view') }}">
								<button type="button" class="btn btn-success  waves-effect waves-light mb-2 mr-2">
									<i class="mdi mdi-plus mr-1"></i> Add Salesperson
								</button>
							</a>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="subdomain-datatable table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>Name</th>
								<th>Referral Code</th>
								<th>Tenant</th>
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
<div class="modal fade" id="tenant-detail" tabindex="-1" role="dialog" aria-labelledby="tenant-detail" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel"><span class="feature-title">Module Name</span><span class="small text-muted"> - Tenant Detail</span></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="row subscription-feature">
				<div class="col-md-12">
					<ul class="nav nav-tabs card-header-tabs" id="tenant-tab-list" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active" href="#user" role="tab" aria-controls="user" aria-selected="true">User</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link"  href="#company" role="tab" aria-controls="company" aria-selected="false">Company</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="#land" role="tab" aria-controls="land" aria-selected="false">Lands</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false">Invoice</a>
						</li>
					</ul>

					<div class="tab-content mt-5">
						{{-- Data table for user --}}
						<div class="tab-pane active" id="user" role="tabpanel">
							<div class="table-responsive">
								<table class="user-datatable table table-nowrap w-100">
									<thead class="thead-light">
										<tr>
											<th scope="col" style="width: 70px;">#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						 
						{{-- Data table for company --}}
						<div class="tab-pane" id="company" role="tabpanel" aria-labelledby="company-tab">  
							<div class="table-responsive">
								<table class="company-datatable table table-nowrap w-100">
									<thead class="thead-light">
										<tr>
											<th scope="col" style="width: 70px;">#</th>
											<th>Company Name</th>
											<th>Company Code</th>
											<th>Company Email</th>
											<th>Company Reg No</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						 
						{{-- Data table for land --}}
						<div class="tab-pane" id="land" role="tabpanel" aria-labelledby="land-tab">
							<div class="table-responsive">
								<table class="land-datatable table table-nowrap w-100">
									<thead class="thead-light">
										<tr>
											<th scope="col" style="width: 70px;">#</th>
											<th>Land Name</th>
											<th>Land Category</th>
											<th>Land Code</th>
											<th>Land Detail</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>

						{{-- Data table for invoice --}}
						<div class="tab-pane" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
							<div class="table-responsive">
								<table class="invoice-datatable table table-nowrap w-100">
									<thead class="thead-light">
										<tr>
											<th scope="col" style="width: 70px;">#</th>
											<th>Transaction Number</th>
											<th>Subscription Plan</th>
											<th>Grand Total Price</th>
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
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
</div>
<!-- End Modal -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script>
	$(document).ready(function(e) {
		initializeDatatable();
		// $('.user-datatable').DataTable();
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
					url: "{{ route('sales-person.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						search: search,
						status: status,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'user_fullname', name: 'user_fullname' },
					{ data: 'referral_code', name: 'referral_code' },
					{ data: 'tenant', name: 'tenant' },
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

		$('.subdomain-datatable').on('click', '.tenant-detail', function () {
			var tenantCode = $(this).data('tenant_code');
			initializeUserDatatable(tenantCode);
			initializeCompanyDatatable(tenantCode);
			initializeLandDatatable(tenantCode);
			initializeInvoiceDatatable(tenantCode);
			$('#tenant-detail').modal('toggle');

		})

		$('#tenant-tab-list a').on('click', function (e) {
			e.preventDefault()
			var targetTableId = $(e.target).attr('href');
			// console.log(targetTableId);
			// if (targetTableId == '#company') {
			// 	if (!$('.company-datatable').hasClass('dataTable')) {
			// 		$('.company-datatable').DataTable({
			// 			responsive: true,
			// 			// Other DataTables options...
			// 		});
			// 	} else {
			// 		console.log('dwa')
			// 		// Recalculate columns width
			// 		$('.company-datatable').DataTable().columns.adjust();
			// 	}
			// } else if (targetTableId == '#user') {
			// 	if (!$('.user-datatable').hasClass('dataTable')) {
			// 		$('.user-datatable').DataTable({
			// 			responsive: true,
			// 			// Other DataTables options...
			// 		});
			// 	} else {
			// 		// Recalculate columns width
			// 		console.log('dwa2')

			// 		$('.user-datatable').DataTable().columns.adjust();
			// 	}

			// } else if (targetTableId == '#land') {
			// 	if (!$('.land-datatable').hasClass('dataTable')) {
			// 		$('.land-datatable').DataTable({
			// 			responsive: true,
			// 			// Other DataTables options...
			// 		});
			// 	} else {
			// 		// Recalculate columns width
			// 		$('.land-datatable').DataTable().columns.adjust().draw;
			// 	}

			// } else if (targetTableId == '#invoice') {
			// 	if (!$('.invoice-datatable').hasClass('dataTable')) {
			// 		$('.invoice-datatable').DataTable({
			// 			responsive: true,
			// 			// Other DataTables options...
			// 		});
			// 	} else {
			// 		// Recalculate columns width
			// 		$('.invoice-datatable').DataTable().columns.adjust();
			// 	}

			// }

			$(this).tab('show')
		})

		function initializeUserDatatable (tenant_code) {
			$('.user-datatable').DataTable().destroy();

			var table = $('.user-datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					type: 'POST',
					url: "{{ route('tenant.user.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						tenant: tenant_code,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'user_fullname', name: 'user_fullname' },
					{ data: 'user_email', name: 'user_email' },
					{ data: 'status', name: 'status' },
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
		
		function initializeCompanyDatatable (tenant_code) {
			$('.company-datatable').DataTable().destroy();

			var table = $('.company-datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					type: 'POST',
					url: "{{ route('tenant.company.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						tenant: tenant_code,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'company_name', name: 'company_name' },
					{ data: 'company_code', name: 'company_code' },
					{ data: 'company_email', name: 'company_email' },
					{ data: 'company_reg_no', name: 'company_reg_no' },
					{ data: 'status', name: 'status' },
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

		function initializeLandDatatable (tenant_code) {
			$('.land-datatable').DataTable().destroy();

			var table = $('.land-datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					type: 'POST',
					url: "{{ route('tenant.land.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						tenant: tenant_code,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'company_land_name', name: 'company_land_name' },
					{ data: 'category', name: 'category' },
					{ data: 'company_land_code', name: 'company_land_code' },
					{ data: 'land_detail', name: 'land_detail' },
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
		
		function initializeInvoiceDatatable (tenant_code) {
			$('.invoice-datatable').DataTable().destroy();

			var table = $('.invoice-datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					type: 'POST',
					url: "{{ route('tenant.invoice.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						tenant: tenant_code,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
					{ data: 'transaction_number', name: 'transaction_number' },
					{ data: 'subscription', name: 'subscription' },
					{ data: 'grand_total', name: 'grand_total' },
					{ data: 'action', name: 'action' },
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

		$('.subdomain-datatable').on('click', '.change-status-user', function () {
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
						url: "{{ route('sales-person.change-status') }}",
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