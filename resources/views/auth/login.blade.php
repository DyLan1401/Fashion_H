@extends('layouts.navbar')

@section('content')
    <main class="login-form py-5"></main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.authUser') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email_address">Email Address <span class="text-danger">**</span></label>
                                    <input type="text" placeholder="Enter Username or Email address..." id="email_address" class="form-control" name="email"
                                        required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password <span class="text-danger">**</span></label>
                                    <input type="password" placeholder="Enter password..." id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 d-flex justify-content-between align-items-center">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember me!
                                        </label>
                                    </div>
                                    <a href="{{ route('user.forgotPasswordForm') }}" class="text-danger">Lost your password?</a>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-success btn-block">LOGIN NOW</button>
                                </div>
                                <div class="text-center my-3">
                                    or
                                </div>
                                <div class="d-grid mx-auto">
                                    <a href="{{ route('user.createUser') }}" class="btn btn-danger btn-block">REGISTER NOW</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection