@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Xác nhận xóa người dùng</h2>
    <div class="alert alert-danger">
        Bạn có chắc chắn muốn xóa người dùng <strong>{{ $user->name }}</strong> (ID: {{ $user->id }}) không?
    </div>
    <form action="{{ route('admin.users.delete', ['id' => $user->id]) }}" method="GET">
        <button type="submit" class="btn btn-danger">Xóa</button>
        <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection 