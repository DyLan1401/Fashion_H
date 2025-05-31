<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function index()
{
    $posts = Post::with('user')->get();//Post::with('user')->get() trả về một collection của các model Post, đảm bảo ngay_tao được chuyển đổi thành Carbon.

    return view('posts.index', compact('posts'));
}
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'tieu_de' => 'required|string|max:255',
        'noi_dung' => 'nullable|string',
        'anh_dai_dien' => 'nullable|image|max:2048',
        'trang_thai_bai_viet' => 'required|in:Đã duyệt,Chờ duyệt,Từ chối',
        'ma_tac_gia' => 'required|exists:users,id',
    ]);

    if ($request->hasFile('anh_dai_dien')) {
        $validated['anh_dai_dien'] = $request->file('anh_dai_dien')->store('images/posts', 'public');
    }

    // Không cần chèn created_at hoặc updated_at thủ công, để model tự quản lý ngay_tao
    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Tạo bài viết thành công!');
}

    public function show($id)
{
    $post = Post::with('user')->findOrFail($id);
    return view('posts.show', compact('post'));//Post::with('user')->get() trả về một collection của các model Post, đảm bảo ngay_tao được chuyển đổi thành Carbon.
}

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

   public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $validated = $request->validate([
        'tieu_de' => 'required|string|max:255',
        'noi_dung' => 'nullable|string',
        'anh_dai_dien' => 'nullable|image|max:2048',
        'trang_thai_bai_viet' => 'required|in:Đã duyệt,Chờ duyệt,Từ chối',
        'ma_tac_gia' => 'required|exists:users,id',
    ]);

    if ($request->hasFile('anh_dai_dien')) {
        if ($post->anh_dai_dien) {
            Storage::disk('public')->delete($post->anh_dai_dien);
        }
        $validated['anh_dai_dien'] = $request->file('anh_dai_dien')->store('images/posts', 'public');
    } else {
        $validated['anh_dai_dien'] = $post->anh_dai_dien;
    }

    $post->update($validated);

    return redirect()->route('posts.index')->with('success', 'Cập nhật bài viết thành công!');
}
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->anh_dai_dien) {
            Storage::disk('public')->delete($post->anh_dai_dien);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Xóa bài viết thành công!');
    }
}