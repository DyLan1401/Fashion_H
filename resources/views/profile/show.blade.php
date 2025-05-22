@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thông tin cá nhân</h2>
    <div class="card mt-3">
        <div class="card-body">
            <img src="{{ $profile->avatar ?? 'https://via.placeholder.com/150' }}" alt="Avatar" class="img-thumbnail mb-3" width="150">
            <p><strong>Bio:</strong> {{ $profile->bio }}</p>
            <p><strong>Ngày sinh:</strong> {{ \Carbon\Carbon::parse($profile->birthday)->format('d/m/Y') }}</p>
        </div>
    </div>
</div>
@endsection
