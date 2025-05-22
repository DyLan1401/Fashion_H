@extends('dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $post->tieu_de }}</h1>

@if ($post->anh_dai_dien)
    <img src="{{ $post->anh_dai_dien }}" alt="Ảnh đại diện" class="w-1/2 mb-4">
@endif

<p class="mb-2"><strong>Trạng thái:</strong> {{ $post->trang_thai }}</p>
<p class="mb-2"><strong>Tác giả:</strong> {{ $post->tacGia->name ?? 'Không rõ' }}</p>
<p class="mb-2"><strong>Ngày tạo:</strong> {{ $post->ngay_tao }}</p>

<div class="border-t mt-4 pt-4">
    {!! nl2br(e($post->noi_dung)) !!}
</div>

<a href="{{ route('posts.index') }}" class="mt-6 inline-block text-blue-500">← Quay lại danh sách</a>
@endsection
