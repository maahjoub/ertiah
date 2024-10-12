@extends('layouts.gust')
@section('content')
<div class="main-wrapper account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form action="{{ route('login') }}" class="form-signin" method="post">
                    @csrf
                    <div class="account-logo">
                        <a href="index-2.html"><img src={{ asset("assets/img/logo-dark.png") }} alt=""></a>
                    </div>
                    <input type="hidden" name="type" value="web">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" autofocus="" class="form-control">
                        @error('email')<span class="text-danger p-3 bg-white">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')<span class="text-danger p-3 bg-white"> </span>@enderror
                    </div>
                    <div class="form-group text-right">
                        <a href="forgot-password.html">Forgot your password?</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">Login</button>
                    </div>
                    <div class="text-center register-link">
                        Don’t have an account? <a href="{{route('std.register')}}">Register Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src={{ asset("assets/js/jquery-3.2.1.min.js")}}></script>
<script src={{ asset("assets/js/popper.min.js")}}></script>
<script src={{ asset("assets/js/bootstrap.min.js")}}></script>
<script src={{ asset("assets/js/app.js")}}></script>

@endsection
