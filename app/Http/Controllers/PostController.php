<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tacGia')->get(); // Lấy tất cả bài viết cùng thông tin tác giả
        return view('posts.index', compact('posts'));
    }
    // Hiển thị form tạo bài viết
   public function create()
{
    $tacGias = \App\Models\User::all(); // Lấy tất cả tác giả
    return view('posts.create', compact('tacGias'));
}
    // Lưu bài viết mới
   public function store(Request $request)
{
    $request->validate([
        'tieu_de' => 'required|string|max:225',
        'noi_dung' => 'required|string',
        'anh_dai_dien' => 'nullable|url|max:225', // Kiểm tra xem có phải URL hợp lệ không
        'trang_thai_bai_viet' => 'required|in:draft,published,archived',
        'ma_tac_gia' => 'required|exists:users,id',
    ]);

    Post::create([
        'tieu_de' => $request->tieu_de,
        'noi_dung' => $request->noi_dung,
        'anh_dai_dien' => $request->anh_dai_dien,
        'trang_thai_bai_viet' => $request->trang_thai_bai_viet,
        'ma_tac_gia' => $request->ma_tac_gia,
    ]);

    return redirect()->route('posts.index')->with('thong_bao', 'Tạo bài viết thành công!');
}

public function __construct()
{
    $this->middleware('auth');
}

  public function show($ma_bai_viet)
{
    $post = Post::with('tacGia')->findOrFail($ma_bai_viet);
    return view('posts.show', compact('post'));
}

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

   public function update(Request $request, $ma_bai_viet)
{
    $request->validate([
        'tieu_de' => 'required|string|max:225',
        'noi_dung' => 'required|string',
        'anh_dai_dien' => 'nullable|url|max:225',
        'trang_thai_bai_viet' => 'required|in:draft,published,archived',
        'ma_tac_gia' => 'required|exists:users,id',
    ]);

    $post = Post::findOrFail($ma_bai_viet);
    $post->update([
        'tieu_de' => $request->tieu_de,
        'noi_dung' => $request->noi_dung,
        'anh_dai_dien' => $request->anh_dai_dien,
        'trang_thai_bai_viet' => $request->trang_thai_bai_viet,
        'ma_tac_gia' => $request->ma_tac_gia,
    ]);

    return redirect()->route('posts.index')->with('thong_bao', 'Cập nhật bài viết thành công!');
}

    public function destroy($ma_bai_viet)
{
    $post = Post::findOrFail($ma_bai_viet);
    $post->delete();
    return redirect()->route('posts.index')->with('thong_bao', 'Xóa bài viết thành công!');
}

}