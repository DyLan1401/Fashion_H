@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Quản lý người dùng</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-sm btn-info">Xem</a>
                                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Sửa</a>
                                    <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
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