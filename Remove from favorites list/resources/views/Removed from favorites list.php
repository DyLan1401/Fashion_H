@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách đã xóa khỏi yêu thích</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('remove_favorites.create') }}" class="btn btn-success mb-3">Xóa khỏi yêu thích</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Ngày xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($removed as $item)
                <tr>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->removed_at ? \Carbon\Carbon::parse($item->removed_at)->format('d/m/Y H:i') : '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection