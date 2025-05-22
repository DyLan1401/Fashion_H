<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProfileUserSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy danh sách user có sẵn (ví dụ lấy 5 user đầu tiên)
        $users = DB::table('users')->take(5)->get();

        foreach ($users as $user) {
            DB::table('profile_users')->insert([
                'user_id' => $user->id,
                'bio' => 'Tôi là ' . $user->name,
                'avatar' => 'https://i.pravatar.cc/150?u=' . $user->id,
                'birthday' => Carbon::now()->subYears(rand(18, 30))->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
