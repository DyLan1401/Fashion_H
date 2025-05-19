@extends('layouts.navbar')
@section('content')
<div class="container mt-4">
    <h2>Thông tin cá nhân</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Tên:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
        <li class="list-group-item"><strong>Ngày tạo:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</li>
    </ul>
    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Đổi mật khẩu</button>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <!-- Modal đổi mật khẩu -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ route('user.changePassword') }}">
            @csrf
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection 