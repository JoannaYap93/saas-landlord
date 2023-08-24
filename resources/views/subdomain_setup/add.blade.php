@extends('layouts.master')

@section('title') Add Tenant @endsection

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
            <h4 class="mb-0 font-size-18">Add Tenant</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Tenant</a>
                    </li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form id="save_subdomain" method="POST" action="">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tenant Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Tenant Name<span class="text-danger">*</span></label>
                                <input name="tenant_name" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Referral Code<span class="text-danger"></span></label>
                                <input name="referral_code" type="text" class="form-control" value="{{ $referralCode }}" {{ ($referralCode) ? 'readonly' : ''}}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Tenant Code<span class="text-danger">*</span> 
                                    <small id="passwordHelpInline" class="text-muted">
                                        {{ env('TENANT_URL') }}/<span class="dynamic_domain">TenantCode</span>
                                    </small>
                                </label>
                                <input name="tenant_code" type="text" class="form-control domain_name" value="" >
                            </div>
                            <div class="form-group">
                                <label for="user_email">Subscription Plan<span class="text-danger">*</span> 
                                </label>
                                <select class="select2 form-control subscription_plan" name="subscription_id">
                                    <option value="">Please select plan</option>
                                    @foreach ($subscription as $sub)
                                        <option value="{{ $sub->subscription_id }}">{{ $sub->subscription_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Company Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company_name">Company Name<span class="text-danger">*</span></label>
                                <input name="company_name" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="company_address">Company Address<span class="text-danger">*</span></label>
                                <input name="company_address" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="company_phone_no">Company Phone No<span class="text-danger">*</span></label>
                                <input name="company_phone_no" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company_email">Company Email<span class="text-danger">*</span></label>
                                <input name="company_email" type="email" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <label for="company_reg_no">Company Reg Number<span class="text-danger">*</span></label>
                                <input name="company_reg_no" type="text" class="form-control" value="" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tenant Admin User</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_address">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="" name="full_name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="text-danger">*</span></label>
        
                                <select class="select2 form-control" name="gender">
                                    <option value="">Please select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_address">Unique Code<span class="text-danger">*</span></label>
                                <input name="unique_code" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_address2">User Email<span class="text-danger">*</span></label>
                                <input name="user_email" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Nationality<span class="text-danger">*</span></label>
                                <input name="nationality" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_city">Password<span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control" value="">
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

        $('.domain_name').keyup(function(){
            $('.dynamic_domain').html($(this).val())
        });

        $("#save_subdomain").submit(function(e){
            e.preventDefault();
            Swal.showLoading()
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('subdomain_save') }}",
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
                                window.location.href = "{{ route('subdomain_listing') }}";
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