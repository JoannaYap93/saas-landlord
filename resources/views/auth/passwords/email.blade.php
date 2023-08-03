@extends('layouts.master-without-nav')

@section('title')
Reset pw
@endsection

@section('body')

<body class="login">
    @endsection

    @section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-md-8 col-lg-6 col-xl-5 ">
                    <img src="{{asset('')}}assets/images/main_logo.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        
                        <div class="card-body ">
                           
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input name="user_email" type="email" class="form-control @error('email') is-invalid @enderror @if(Session::has('success_msg')) is-valid @endif" @if(old('user_email')) value="{{ old('user_email') }}" @endif id="username" placeholder="Enter username" autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                         @if(Session::has('success_msg'))
                                            <span class="valid-feedback" role="alert">
                                                <strong>{{ Session::get('success_msg') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{url('login')}}" class="font-weight-medium text-primary"> Sign In here</a> </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection