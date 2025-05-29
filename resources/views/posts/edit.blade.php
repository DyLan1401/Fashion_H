<h1>Sửa bài viết</h1>
<form method="POST" action="{{ route('posts.update', $post->ma_bai_viet) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Tiêu đề:</label>
        <input type="text" name="tieu_de" value="{{ $post->tieu_de }}" required>
    </div>
    <div>
        <label>Nội dung:</label>
        <textarea name="noi_dung" required>{{ $post->noi_dung }}</textarea>
    </div>
    <div style="margin-bottom: 15px;">
    <label for="anh_dai_dien" style="display: block;">Link ảnh đại diện:</label>
    <input type="text" id="anh_dai_dien" name="anh_dai_dien" value="{{ $post->anh_dai_dien ?? '' }}" class="form-control" style="width: 100%; padding: 5px;" placeholder="Nhập URL ảnh (ví dụ: https://example.com/image.jpg)">
</div>
    <div>
        <label>Trạng thái:</label>
        <select name="trang_thai_bai_viet" required>
            <option value="draft" {{ $post->trang_thai_bai_viet == 'draft' ? 'selected' : '' }}>Nháp</option>
            <option value="published" {{ $post->trang_thai_bai_viet == 'published' ? 'selected' : '' }}>Đã đăng</option>
            <option value="archived" {{ $post->trang_thai_bai_viet == 'archived' ? 'selected' : '' }}>Lưu trữ</option>
        </select>
    </div>
    <div>
        <label>Mã tác giả:</label>
        <input type="number" name="ma_tac_gia" value="{{ $post->ma_tac_gia }}" required>
    </div>
    <button type="submit">Cập nhật</button>
</form>