@extends('layouts.master')

@section('title') {{ $title }} User @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{ $title }} User</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">User</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
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
    <div class="col-12">
        <form method="POST" action="{{ $submit }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">User Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Email<span class="text-danger">*</span></label>
                                <input name="user_email" type="email" class="form-control" value="{{ @$post->user_email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control" value="{{ @$post->password }}">
                            </div>
                            <div class="form-group">
                                <label for="user_fullname">Full Name<span class="text-danger">*</span></label>
                                <input name="user_fullname" type="text" class="form-control" value="{{ @$post->user_fullname }}">
                            </div>
                            <div class="form-group">
                                <label for="user_mobile">Mobile No<span class="text-danger">*</span></label>
                                <input name="user_mobile" type="number" class="form-control" value="{{ @$post->user_mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="user_nric">NRIC<span class="text-danger">*</span></label>
                                <input name="user_nric" type="text" class="form-control" value="{{ @$post->user_nric }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_nationality">Nationality<span class="text-danger">*</span></label>
                                <input name="user_nationality" type="text" class="form-control" value="{{ @$post->user_nationality }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="text-danger">*</span></label>
                                {!! Form::select('user_gender', $user_gender_sel, @$post->user_gender, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="user_dob">Date of Birth<span class="text-danger">*</span></label>
                                <div class="input-group-append">
                                    <input name="user_dob" type="text" class="form-control" id="datepicker" placeholder="yyyy-mm-dd" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" value="{{ @$post->user_dob }}">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Type<span class="text-danger">*</span></label>
                                {!! Form::select('user_type_id', $user_type_sel, @$post->user_type_id , ['class' => 'form-control','id' => 'user_type']) !!}
                            </div>
                            <div class="form-group" id="user_role" @if(@$post->user_type_id != 1) style="display:none" @endif>
                                <label class="control-label">User Role</label>
                                {!! Form::select('user_role_id', $user_role_sel, (@$post->user_role_id?$post->user_role_id:@$user_role->id), ['class' => 'form-control', 'id' => 'user_role']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Address Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_address">Address 1</label>
                                <input name="user_address" type="text" class="form-control" value="{{ @$post->user_address }}">
                            </div>
                            <div class="form-group">
                                <label for="user_city">City</label>
                                <input name="user_city" type="text" class="form-control" value="{{ @$post->user_city }}">
                            </div>
                            <div class="form-group">
                                <label for="user_state">State</label>
                                <input name="user_state" type="text" class="form-control" value="{{ @$post->user_state }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_address2">Address 2</label>
                                <input name="user_address2" type="text" class="form-control" value="{{ @$post->user_address2 }}">
                            </div>
                            <div class="form-group">
                                <label for="user_postcode">Postcode</label>
                                <input name="user_postcode" type="text" class="form-control" value="{{ @$post->user_postcode }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                            <a href="{{ route('user_listing') }}" class="btn btn-secondary" type="button">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script>
    $(document).ready(function(e) {
        //$("#user_role").hide();
        $('#user_type').on('change', function() {
            if (this.value == 1) {
                $("#user_role").show();
            } else {
                $("#user_role").hide();
            }
        });
    });
</script>
@endsection