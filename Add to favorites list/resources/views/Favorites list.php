@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách yêu thích</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('favorites.create') }}" class="btn btn-success mb-3">Thêm vào yêu thích</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Ngày thêm</th>
            </tr>
        </thead>
        <tbody>
            @foreach($favorites as $favorite)
                <tr>
                    <td>{{ $favorite->user_name }}</td>
                    <td>{{ $favorite->product_name }}</td>
                    <td>{{ $favorite->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection