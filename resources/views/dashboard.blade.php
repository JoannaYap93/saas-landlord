@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Dashboard</h4>

            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Skote Dashboard</li>
                </ol>
            </div> -->

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <!-- <p>Skote Dashboard</p> -->
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="avatar-md profile-user-wid mb-4">
                        @if( Auth::user()->user_profile_photo )
                            <img src="{{url(Auth::user()->user_profile_photo)}}" alt="" class="img-thumbnail rounded-circle">
                        @else
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                        @endif
                        </div>
                    </div>

                    <div class="col-sm-9">
                       
                        <div class="pt-4">

                        <h5 class="font-size-15 text-truncate">{{{  ucfirst(Auth::user()->user_fullname)  }}}</h5>
                        <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
 
</div>

@endsection

@section('script')
<!-- plugin js -->
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
{{-- <script src="{{ URL::asset('assets/js/pages/apexcharts.init.js')}}"></script> --}}


@endsection
