@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Quản lý doanh thu</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('revenues.create') }}" class="btn btn-success mb-3">Thêm doanh thu</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Số tiền</th>
                <th>Ngày</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenues as $revenue)
                <tr>
                    <td>{{ $revenue->title }}</td>
                    <td>{{ number_format($revenue->amount, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $revenue->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection