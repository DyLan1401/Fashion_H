@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Chi tiết liên hệ</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $contact->id }}</li>
        <li class="list-group-item"><strong>Tên:</strong> {{ $contact->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $contact->email }}</li>
        <li class="list-group-item"><strong>Nội dung:</strong> {{ $contact->message }}</li>
        <li class="list-group-item"><strong>Ngày gửi:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</li>
    </ul>
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
</div>
@endsection 