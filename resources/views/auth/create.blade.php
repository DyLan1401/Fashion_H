@extends('layouts.navbar')

@section('content')
<main class="signup-form py-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Create</h3>
                    <div class="card-body">
                        <form action="{{ route('user.postUser') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Username **</label>
                                <input type="text" placeholder="Enter Username or Email address..." id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="email_address">Email Address **</label>
                                <input type="text" placeholder="Enter Username or Email address..." id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            {{-- Keeping Phone and Address fields as requested --}}
                            <div class="form-group mb-3">
                                <label for="phone">Phone **</label>
                                <input type="number" placeholder="Phone" id="phone" class="form-control"
                                    name="phone" required autofocus>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address **</label>
                                <input type="text" placeholder="Address" id="address" class="form-control"
                                    name="address" required autofocus>
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password **</label>
                                <input type="password" placeholder="Enter password..." id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block" style="background-color: #8BC34A; border-color: #8BC34A;">REGISTER NOW</button>
                            </div>
                            <div class="text-center my-3">or</div>
                            <div class="d-grid mx-auto">
                                <a href="{{ route('login') }}" class="btn btn-danger btn-block" style="background-color: #F44336; border-color: #F44336;">LOGIN NOW</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection