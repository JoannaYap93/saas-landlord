@extends('layouts.master-without-nav')

@section('title')
Login
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
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_email">Email</label>
                                        <input name="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror" @if(old('user_email')) value="{{ old('user_email') }}" @endif id="username" placeholder="Email" autocomplete="user_email" autofocus>
                                        @error('user_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" @if(old('password')) value="{{ old('password') }}" @endif placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember_me" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection