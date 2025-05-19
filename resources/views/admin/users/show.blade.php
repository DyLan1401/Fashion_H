@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Thông tin người dùng</h2>
    <ul>
        <li>ID: {{ $user->id }}</li>
        <li>Tên: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Role: {{ $user->role }}</li>
    </ul>
    <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection 