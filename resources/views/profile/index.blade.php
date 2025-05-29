@extends('layouts.navbar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" 
                         alt="Profile Picture" 
                         class="rounded-circle mb-3"
                         style="width: 150px; height: 150px;">
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <p class="text-muted">
                        Đăng nhập bằng: 
                        <span class="badge bg-info">
                            {{ Auth::user()->auth_provider ? ucfirst(Auth::user()->auth_provider) : 'Email' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Thông tin cá nhân</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.updateProfile') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ Auth::user()->email }}"
                                   {{ Auth::user()->auth_provider ? 'readonly' : '' }}>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(!Auth::user()->auth_provider)
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" 
                                   class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" 
                                   name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                            <input type="password" 
                                   class="form-control @error('new_password') is-invalid @enderror" 
                                   id="new_password" 
                                   name="new_password">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" 
                                   class="form-control" 
                                   id="new_password_confirmation" 
                                   name="new_password_confirmation">
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 