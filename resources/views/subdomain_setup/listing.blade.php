@extends('layouts.master')

@section('title') Tenant Listing @endsection

@section('content')
<style>
.feature-check label {
  padding: 10px 20px 10px 40px;
  border: 1px solid grey;
  border-radius: 23px;
  display: inline-block;
  transition: all 0.3s ease;
  cursor: pointer;
  color: grey;
  position: relative;
  font-size: 14px;
  line-height: 1;
}
.feature-check label:before {
  content: "\f00c";
  font-family: "Font Awesome 5 Free";
  font-size: 10px;
  color: #fff;
  position: absolute;
  top: 9px;
  left: 10px;
  line-height: 14px;
  padding: 0 2px;
  border: 1px solid grey;
  border-radius: 50%;
  box-sizing: border-box;
}

.feature-check input[type="checkbox"] {
  display: none;
}

.feature-check input[type="checkbox"]:checked + label {
  background: green;
  color: #FFF;
  border-color: green;
}

.feature-check input[type="checkbox"]:checked + label:before {
  border-color: #fff;
}
</style>
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

<div class="modal fade" id="overwrite-module" tabindex="-1" role="dialog" aria-labelledby="overwrite-module" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel"><span class="tenant-name">Tenant Name</span><span class="small text-muted"> - Feature List</span></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<h5><div class="subscription-plan">Subscription Plan</div></h5>
			<div class="row subscription-feature">

			</div>
			<h5><div class="Additional-module">Additional Feature</div></h5>
			<div class="row feature-listing">
				
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary additional-feature">Overwrite Feature</button>
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
		//$("#user_role").hide();
		$('.suspend').on('click', function() {
			var id = $(this).attr('data-id');
			$(".modal-body #user_id").val(id);
		});
		$('.activate').on('click', function() {
			var id = $(this).attr('data-id');
			$(".modal-body #user_id").val(id);
		});

		initializeDatatable();

		$("#search_subdomain").submit(function(e){
			e.preventDefault();
			let free_text = $('.free_text').val();
			$('.subdomain-datatable').DataTable().destroy();

			initializeDatatable(free_text);
		});

		$('.reset-filter').on('click', function () {
			$('.free_text').val('');
			$('.subdomain-datatable').DataTable().destroy();
			initializeDatatable();
		})

		function initializeDatatable (search = '') {
			var table = $('.subdomain-datatable').DataTable({
				processing: true,
				serverSide: true,
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

		$('.subdomain-datatable').on('click', '.overwrite-feature', function () {
			// Swal.showLoading();
			var tenant_id = $(this).data('tenant_id');
			$.ajax({
				type: "GET",
				url: "{{ route('overwrite.data') }}",
				data: {
					tenant_id: tenant_id 
				},
				dataType: "json",
				encode: true,
				success: function(data){  
					// Swal.hideLoading();
					
					if (data.status = 200) {
						$('#overwrite-module').modal('toggle');
						$('.tenant-name').html(data.tenant.tenant_name)
						$('.subscription-plan').html(data.subscription.subscription_name)
						$('.feature-listing').html(data.feature_listing)
						$('.subscription-feature').html(data.subscription_feature)
						$('.additional-feature').data('tenant_id', tenant_id)
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
			// $('#overwrite-module').modal('toggle');
		});

		$('.additional-feature').on('click', function () {
			var tenant_id = $(this).data('tenant_id');
			var additionalFeature = [];
			$('input[name="additional_feature[]"]').each(function(index, value) {
				if ($(this).is(":checked") ){
					additionalFeature.push($(this).val())
				}
			});
			$.ajax({
				type: "POST",
				url: "{{ route('additional.feature') }}",
				data: {
					_token: "{{ csrf_token() }}",
					tenant_id: tenant_id,
					additional_feature: additionalFeature
				},
				dataType: "json",
				encode: true,
				success: function(data){  
					// Swal.hideLoading();
					$('#overwrite-module').modal('toggle');
					if (data.status = 200) {
						Swal.fire({
							type: 'success',
							title: 'Success!',
							text: data.message,
						})
					} else {
						Swal.fire({
							type: 'error',
							title: 'Something went wrong!',
							text: 'Please try again later!',
						})
					}
				},
				error: function(error) { 

					$('#overwrite-module').modal('toggle');
					Swal.fire({
						type: 'error',
						title: 'Something went wrong!',
						text: 'Please try again later!',
					})
				}
			})
		});
	});
</script>
@endsection