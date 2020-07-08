@extends('layouts.login')
@section('content')
    <div id="app">
        <div class="login-box" style="margin:auto">
            <div class="login-logo">
                <a href="../../index2.html"><b>Eden</b>  new server</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">เข้าสู่ระบบ</p>

                    <form  action="{{Route('loginprocess')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="ีusername" type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="username"  autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="รหัสผ่าน" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                {{--            <div class="social-auth-links text-center mb-3">--}}
                {{--                <p>- OR -</p>--}}
                {{--                <a href="#" class="btn btn-block btn-primary">--}}
                {{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
                {{--                </a>--}}
                {{--                <a href="#" class="btn btn-block btn-danger">--}}
                {{--                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
                {{--                </a>--}}
                {{--            </div>--}}
                <!-- /.social-auth-links -->
                    {{--            @if (Route::has('password.request'))--}}
                    {{--                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                    {{--                    {{ __('Forgot Your Password?') }}--}}
                    {{--                </a>--}}
                    {{--            @endif--}}
                    <p class="mb-1">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        {{--                <a href="forgot-password.html">I forgot my password</a>--}}
                    </p>
                    {{--            <p class="mb-0">--}}
                    {{--                <a href="register.html" class="text-center">Register a new membership</a>--}}
                    {{--            </p>--}}
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </div>
@endsection
