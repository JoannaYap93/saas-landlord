@extends('layouts.master')

@section('title') Sales Person Listing @endsection

@section('content')
{{-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" /> --}}

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Sales Person Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Sales Person</a>
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
<div class="modal fade" id="edit-module" tabindex="-1" role="dialog" aria-labelledby="edit-module" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel"><span class="feature-title">Module Name</span><span class="small text-muted"> - Edit Feature</span></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<h5><div class="Additional-module">Feature Detail</div></h5>
			<div class="row subscription-feature">
				<div class="col-md-6">
					<div class="form-group">
						<label for="feature-section">Feature Section</label>
						<input type="text" class="form-control feature-section" name="" placeholder="" value="" disabled>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="feature-section">Additional Charge</label>
						<input type="text" class="form-control additional-charge" name="" placeholder="" value="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="charge-per-kg">
						<label class="form-check-label" for="charge-per-kg">
						  Add Value to Charge Per Kg
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="maximum-charge">
						<label class="form-check-label" for="maximum-charge">
						  Add Value to Maximum Charge Price Per Year
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="subscription-charge">
						<label class="form-check-label" for="subscription-charge">
						  Add Value to Subscription Price Per Monthly
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary additional-charge-save">Save</button>
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
						// search: search,
						// status: status,
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
	});
</script>
@endsection