@extends('layouts.master')

@section('title') Add User @endsection

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
            <h4 class="mb-0 font-size-18">Add User</h4>
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
        <form  id="user-form" method="POST" action="">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">User Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Email<span class="text-danger">*</span></label>
                                <input name="user_email" type="email" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_fullname">Full Name<span class="text-danger">*</span></label>
                                <input name="user_fullname" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_mobile">Mobile No<span class="text-danger">*</span></label>
                                <input name="user_mobile" type="number" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_nric">NRIC<span class="text-danger">*</span></label>
                                <input name="user_nric" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_nationality">Nationality<span class="text-danger">*</span></label>
                                <input name="user_nationality" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="text-danger">*</span></label>
                                <select class="form-control" name="user_gender">
                                    <option value="">Please select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_dob">Date of Birth<span class="text-danger">*</span></label>
                                <div class="input-group-append">
                                    <input name="user_dob" type="text" class="form-control" id="datepicker" placeholder="yyyy-mm-dd" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" value="">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group" id="user_role">
                                <label class="control-label">User Role</label>
                                <select class="form-control" name="user_role_id">
                                    <option value="">Please select role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
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
                                <input name="user_address" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_city">City</label>
                                <input name="user_city" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_state">State</label>
                                <input name="user_state" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_address2">Address 2</label>
                                <input name="user_address2" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_postcode">Postcode</label>
                                <input name="user_postcode" type="text" class="form-control" value="">
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
        // $('#user_type').on('change', function() {
        //     if (this.value == 1) {
        //         $("#user_role").show();
        //     } else {
        //         $("#user_role").hide();
        //     }
        // });

        $("#user-form").submit(function(e){
            e.preventDefault();
            Swal.showLoading()
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('user.store') }}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(data){  
                    if (data.status == 200) {
                        Swal.fire({
                            type: 'success',
                            title: 'Success!',
                            html: data.message,
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = "{{ route('user_listing') }}";
                            }
                        });
                        

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            html: data.message,
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
        });
    });
</script>
@endsection