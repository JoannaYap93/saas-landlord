@extends('layouts.master')

@section('title') Subdomain Listing @endsection

@section('content')
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Subscription Log Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Subscription Log</a>
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
						<form id="search_log" method="POST" action="">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="validationCustom03">Search</label>
                                        <select class="form-control select2 search_subscription">
                                            <option value selected>Select Subscription</option>
                                            @foreach ($subscription as $sub)
											    <option value="{{ Arr::get($sub, 'subscription_id') }}">{{ Arr::get($sub, 'subscription_name') }}</option>
                                            @endforeach
										</select>
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
					<table class="subscription-datatable table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>User</th>
								<th>Action</th>
								<th>Subscription</th>
								<th>Subscription Data</th>
								<th>Feature Enable</th>
								<th>Logging Date</th>
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

<script>
	$(document).ready(function(e) {
		initializeDatatable();

		$("#search_log").submit(function(e){
			e.preventDefault();
			let search_subs = $('.search_subscription').val();
			$('.subscription-datatable').DataTable().destroy();
			initializeDatatable(search_subs);
		});

		$('.reset-filter').on('click', function () {
			$('.search_subscription').val('');
			$('.subscription-datatable').DataTable().destroy();
			initializeDatatable();
		})

		function initializeDatatable (search_subs = '') {
			var table = $('.subscription-datatable').DataTable({
				processing: true,
				serverSide: true,
				searching: false,
				ajax: {
					type: 'POST',
					url: "{{ route('subscription.log.datatable') }}",
					data: {
						_token: "{{ csrf_token() }}",
						subscription_id: search_subs,
					}
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
					{ data: 'user', name: 'user' },
					{ data: 'action', name: 'action' },
					{ data: 'subscription', name: 'subscription' },
					{ data: 'data', name: 'data' },
					{ data: 'feature', name: 'feature' },
					{ data: 'logging_date', name: 'logging_date' },
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