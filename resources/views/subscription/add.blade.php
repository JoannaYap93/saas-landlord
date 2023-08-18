@extends('layouts.master')

@section('title') New Subscription Plan @endsection

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
            <h4 class="mb-0 font-size-18">New Subscription Plan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Subscription Plan</a>
                    </li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form id="save_subscription" method="POST" action="">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Subscription Plan</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Subscription Name<span class="text-danger">*</span></label>
                                <input name="subscription_name" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Charge Per Kg<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="text" class="form-control" name="subscription_charge_per_kg">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email">Maximum Charge Per Year<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="text" class="form-control" name="subscription_maximum_charge_per_year">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Subscription Price<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="text" class="form-control" name="subscription_price">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">Subscription Detail<span class="text-danger">*</span></label>
                                <textarea name="subscription_description" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enable Feature</h4>

                    <div class="row">
                        @foreach ($feature as $feature )
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox m-1">
                                    <input class="custom-control-input check" type="checkbox" name="feature[]" value="{{ $feature->feature_id }}" id="{{ $feature->feature_id }}">
                                    <label class="custom-control-label" for="{{ $feature->feature_id }}" >{{ $feature->feature_title }}</label>
                                </div>
                            </div>
                            {{-- <div class="card col-sm-4 col-md-3 text-center" style="box-shadow: unset !important">
                                <div class="card-body">
                                    <i class="{{ $feature->feature_icon }} mb-4" style="font-size:50px"></i>
                                    <h5 class="card-title">{{ $feature->feature_title }}</h5>
                                    <p class="card-text">{{ $feature->feature_group }}</p>
                                    <a href="#" class="btn btn-outline-secondary rounded-pill ">Inactive</a>
                                </div>
                            </div> --}}
                        @endforeach
                        <div class="col-sm-12 mt-3">
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

        $("#save_subscription").submit(function(e){
            e.preventDefault();
            Swal.showLoading()
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('subscription.save') }}",
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
                                window.location.href = "{{ route('subscription.index') }}";
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