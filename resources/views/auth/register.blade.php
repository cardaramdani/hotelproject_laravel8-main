@extends('layouts.app')
@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"> <img class="img-fluid" src="assets/img/logo-ppm.png" alt="Logo">
                        PT. Putra Mahaka Pratama
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1 class="mb-3">Register</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" required autocomplete="new-password">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>

                            <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
