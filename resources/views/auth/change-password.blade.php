@extends('layouts.navbar')
@section('content')
<div class="container mt-4">
    <h2>Đổi mật khẩu</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('user.changePassword') }}">
        @csrf
        <div class="mb-3">
            <label>Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Mật khẩu mới</label>
            <input type="password" name="new_password" class="form-control" required>
            @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Xác nhận mật khẩu mới</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
</div>
@endsection