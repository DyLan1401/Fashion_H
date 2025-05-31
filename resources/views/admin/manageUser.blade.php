@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách người dùng</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm người dùng
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form class="row mb-3" method="GET" action="">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc email" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody></tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                     <td>{{ $user->phone }}</td>
                      <td>{{ $user->address }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
</div>
@endsection 