<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create(['title' => 'Bài viết 1', 'content' => 'Nội dung bài viết 1']);
        Post::create(['title' => 'Bài viết 2', 'content' => 'Nội dung bài viết 2']);
    }
}