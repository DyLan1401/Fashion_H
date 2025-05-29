@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard</h2>
        <div class="text-muted">Xin chào, {{ Auth::user()->name }}</div>
    </div>

    <!-- Thống kê tổng quan -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Tổng số người dùng</h5>
                    <h2 class="card-text">{{ \App\Models\User::count() }}</h2>
                    <p class="card-text"><small>Người dùng đã đăng ký</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Người dùng mới</h5>
                    <h2 class="card-text">{{ \App\Models\User::whereDate('created_at', today())->count() }}</h2>
                    <p class="card-text"><small>Hôm nay</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <h2 class="card-text">{{ \App\Models\User::where('role', 'admin')->count() }}</h2>
                    <p class="card-text"><small>Quản trị viên</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách người dùng mới nhất -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Người dùng mới nhất</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Ngày đăng ký</th>
                            <th>Vai trò</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 