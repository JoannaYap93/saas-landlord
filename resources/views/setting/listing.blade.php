@extends('layouts.master')

@section('title') Master Setting Listing @endsection

@section('content')

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">Master Setting Listing</h4>
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item">
						<a href="javascript: void(0);">Setting</a>
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
				<div class="table-responsive">
					<table class="table table-nowrap">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 70px;">#</th>
								<th>Setting Name</th>
								<th>Setting Value</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($records->isNotEmpty())
							<?php $i = 1; ?>
							@foreach($records as $row)
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $row->setting_description }}</td>
								<td>{{ $row->setting_value }}</td>
								<td>
									@if($row->is_editable == 1)
									<a href="{{ route('setting_edit',$row->setting_id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Setting"><i class="mdi mdi-pencil font-size-18"></i></a>
									@endif
								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
							@else
							<tr>
								<td>No record found.</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function(e) {
		$('.delete').on('click', function() {
			var id = $(this).attr('data-id');
			$(".modal-body #setting_tax_id").val(id);
		});
	});
</script>
@endsection