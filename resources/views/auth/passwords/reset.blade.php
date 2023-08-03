@extends('layouts.master-without-nav')

@section('title')
Reset Password
@endsection

@section('body')

<body class="login" >
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
                            <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                
                                <div class="form-group">
                                    <label for="user_email">Email</label>
                                    <input name="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror" value="{{ $email ?? old('email') }}" id="username" placeholder="Email" autocomplete="user_email"  readonly>
                                    @error('user_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" autofocus >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input id="password-confirm"  type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" >
                                </div>
                                
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Reset Password</button>
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