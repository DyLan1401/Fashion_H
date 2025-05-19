@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Thêm doanh thu</h1>
    <form action="{{ route('revenues.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Số tiền</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection