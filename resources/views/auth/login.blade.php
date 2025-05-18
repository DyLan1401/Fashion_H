@extends('layouts.navbar')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.authUser') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
             cla                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="container">
                                <div class="row">
                                <div class=" col border border-2 p-1 my-3 bg-danger" >
                                        <!--Login with gg-->
                                    <a class=" text-white text-decoration-none"" title="Login with Google" href="{{route('auth.redirection','google') }}" class=" text-center  ">Login with Google</a>
                                </div>
                                <div class=" col border border-2 p-1 my-3  bg-primary" >
                                        <!--Login with facebook-->
                                    <a class=" text-white text-decoration-none"" title="Login with Facebook" href="{{route('auth.redirection','facebook') }}" class=" text-center  ">Login with Facebook</a>
                                </div class='my-3'>
                                <button type="submit" class="btn btn-dark btn-block ">Sign in</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection