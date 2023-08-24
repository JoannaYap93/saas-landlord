@extends('layouts.master')

@section('title') Master Setting Listing @endsection

@section('css')
    <style>

    </style>
@endsection

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


    {{--  --}}

    {{--  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    @php
                                    $array = [];
                                    @endphp
                                    <th scope="col" style="width: 70px;">#</th>
                                    <th>Setting Name</th>
                                    <th>Setting Value</th>
                                    @if (auth()->user()->user_type_id == 1)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $no = $records->firstItem();
                                @endphp

                                @forelse ($records as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->setting_description }}</td>
                                        <td>
                                            @if ($row->setting_type == 'file')
                                                @if (@$row->hasMedia('setting'))
                                                    <img src="{{ $row->getFirstMediaUrl('setting') }}" alt="" srcset="" width="100">
                                                @endif
                                            @else
                                                {{ $row->setting_value }}
                                            @endif
                                        </td>
                                        @if (auth()->user()->user_type_id == 1)
                                            <td>
                                                @if ($row->is_editable == 1)
                                                    <a href="{{ route('setting_edit', $row->setting_id) }}" class="btn btn-outline-warning btn-sm mr-2">Edit</a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No record found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $records->links('pagination::bootstrap-4') !!}
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
