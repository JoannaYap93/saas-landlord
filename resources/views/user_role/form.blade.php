@extends('layouts.master')

@section('title') {{ $title }} Admin Permission @endsection

@section('css') 
        <!-- DataTables -->        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

        <!-- Summernote css -->
        <link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{ $title }} Permission</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                    <li class="breadcrumb-item active">{{ $title }} Permission</li>
                </ol>
            </div>                   
        </div>
    </div>
</div>     
<!-- end page title -->
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
@enderror
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="outer-repeater"  method="POST" action="{{ $submit }}">
                    @csrf
                    <h4 class="card-title mb-4">User Profile</h4>
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="form-group row mb-4">
                                <label for="taskname" class="col-form-label col-lg-2">Role Name</label>
                                <div class="col-lg-4">
                                    <input name="name" class="form-control" type="text" value="{{ @$post->name }}" {{ (($post == NULL) ? '' : ((@$post->editable == 0) ? 'disabled': '')) }}>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Permissions</h4><hr>
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="form-group row mb-4">
                                <div class="col-md-12">
                                    <ul style="padding:0">
                                        <li class="custom-control custom-checkbox">
                                            <input type="checkbox" id="check_all" class="custom-control-input check" >
                                            <label class="custom-control-label" for="check_all" >Check All</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <ul>
                                    <?php $headerPermission = ''; ?>
                                    @foreach($permissions as $permission)
                                        @if ($headerPermission == '' || $headerPermission != $permission->group_name) 
                                        <li style='padding:10px 0px;list-style:none;'><b>{{ $permission->group_name }}</b></li>
                                        @endif
                                        <li class="custom-control custom-checkbox" style="list-style:none;display:inline-block;width:200px">
                                            <input class="custom-control-input check" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}" @if(@$role_permissions) {{ in_array($permission->name, $role_permissions) ? 'checked' : '' }} @elseif(@$post->permissions) {{ in_array($permission->name, $post->permissions) ? 'checked' : '' }} @endif>
                                            <label class="custom-control-label" for="{{ $permission->id }}" >{{ $permission->display_name }}</label>
                                        </li>
                                        <?php $headerPermission = $permission->group_name; ?>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="form-group row mb-4">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary">{{ $title }} Permission</button>
                        <a href="{{ route('user_role_listing') }}" class="btn btn-secondary" type="button">Cancel</a>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('script')
<script>
    $(document).ready(function(e) {
        $("#check_all").click(function () {
            $(".check:not(:disabled)").prop('checked', $(this).prop('checked'));
        });
    });
</script>
@endsection