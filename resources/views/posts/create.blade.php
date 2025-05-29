@extends('dashboard')

@section('content')
    <h1>Tạo bài viết mới</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="tieu_de" style="display: block;">Tiêu đề:</label>
            <input type="text" id="tieu_de" name="tieu_de" required class="form-control" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="noi_dung" style="display: block;">Nội dung:</label>
            <textarea id="noi_dung" name="noi_dung" required class="form-control" style="width: 100%; padding: 5px; height: 150px;"></textarea>
        </div>

      <div style="margin-bottom: 15px;">
    <label for="anh_dai_dien" style="display: block;">Link ảnh đại diện:</label>
    <input type="text" id="anh_dai_dien" name="anh_dai_dien" class="form-control" style="width: 100%; padding: 5px;" placeholder="Nhập URL ảnh">
</div>

        <div style="margin-bottom: 15px;">
            <label for="trang_thai_bai_viet" style="display: block;">Trạng thái:</label>
            <select id="trang_thai_bai_viet" name="trang_thai_bai_viet" required class="form-control" style="width: 100%; padding: 5px;">
                <option value="draft">Nháp</option>
                <option value="published">Đã đăng</option>
                <option value="archived">Lưu trữ</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="ma_tac_gia" style="display: block;">Mã tác giả:</label>
            <select id="ma_tac_gia" name="ma_tac_gia" required class="form-control" style="width: 100%; padding: 5px;">
                @if(isset($tacGias))
                    @foreach($tacGias as $tacGia)
                        <option value="{{ $tacGia->id }}">{{ $tacGia->name }}</option>
                    @endforeach
                @else
                    <option value="" disabled>Không có tác giả</option>
                @endif
            </select>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Tạo bài viết</button>
    </form>
@endsection