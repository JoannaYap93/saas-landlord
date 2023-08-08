@extends('layouts.master')

@section('title') Tenant Listing @endsection

@section('content')
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Tenant Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Tenant</a>
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
					{{-- @can('user_manage') --}}
					<div class="col-sm-4">
						<div class="text-sm-right">
							<a href="{{ route('subdomain_add') }}">
								<button type="button" class="btn btn-success  waves-effect waves-light mb-2 mr-2">
									<i class="mdi mdi-plus mr-1"></i> Add Tenant
								</button>
							</a>
						</div>
					</div>
					{{-- @endcan --}}
				</div>
				<div class="table-responsive">
					<table class="subdomain-datatable table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>Tenant Name</th>
								<th>Tenant Code</th>
								<th>Subscription Plan</th>
								<th>Person Incharge</th>
								<th>First Payment</th>
								<th>Tenant Status</th>
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
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

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

		initializeDatatable();

		$("#search_subdomain").submit(function(e){
			e.preventDefault();
			let free_text = $('.free_text').val();
			$('.subdomain-datatable').DataTable().destroy();
			console.log(free_text);

			initializeDatatable(free_text);
		});

		$('.reset-filter').on('click', function () {
			$('.free_text').val('');
			$('.subdomain-datatable').DataTable().destroy();
			initializeDatatable();
		})

		function initializeDatatable (search = '') {
			console.log(search);
			var table = $('.subdomain-datatable').DataTable({
				processing: true,
				serverSide: true,
				paging: false,
				searching: false,
				ajax: {
					type: 'POST',
					url: "{{ route('subdomain.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						search: search
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
					{ data: 'tenant_name', name: 'tenant_name' },
					{ data: 'tenant_code', name: 'tenant_code' },
					{ data: 'subscription', name: 'subscription' },
					{ data: 'pic_user', name: 'pic_user' },
					{ data: 'subscription_first_time_status', name: 'subscription_first_time_status' },
					{ data: 'tenant_status', name: 'tenant_status' },
					{
						data: 'action', 
						name: 'action', 
						orderable: true, 
						searchable: true
					},
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