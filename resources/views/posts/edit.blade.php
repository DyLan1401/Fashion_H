@extends('dashboard')

@section('content')
    <h1>Chỉnh sửa bài viết</h1>

    @if (session('thong_bao'))
        <div class="alert alert-info">
            {{ session('thong_bao') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->ma_bai_viet) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề:</label>
            <input type="text" name="tieu_de" id="tieu_de" class="form-control" value="{{ $post->tieu_de }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="noi_dung" class="form-label">Nội dung:</label>
            <textarea name="noi_dung" id="noi_dung" class="form-control" rows="5">{{ $post->noi_dung }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="anh_dai_dien" class="form-label">Ảnh đại diện hiện tại:</label>
            @if($post->anh_dai_dien)
                <img src="{{ Storage::url($post->anh_dai_dien) }}" alt="Ảnh hiện tại" width="100" class="img-fluid mb-2">
            @else
                <span>Không có ảnh</span>
            @endif
            <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="trang_thai_bai_viet" class="form-label">Trạng thái:</label>
            <select name="trang_thai_bai_viet" id="trang_thai_bai_viet" class="form-control" required>
                <option value="Đã duyệt" {{ $post->trang_thai_bai_viet == 'Đã duyệt' ? 'selected' : '' }}>Đã duyệt</option>
                <option value="Chờ duyệt" {{ $post->trang_thai_bai_viet == 'Chờ duyệt' ? 'selected' : '' }}>Chờ duyệt</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="ma_tac_gia" class="form-label">Tác giả:</label>
            <select name="ma_tac_gia" id="ma_tac_gia" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $post->ma_tac_gia == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection