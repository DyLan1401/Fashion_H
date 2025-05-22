<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Revenue;

class RevenueSeeder extends Seeder
{
    public function run()
    {
        Revenue::create([
            'title' => 'Doanh thu bán hàng',
            'amount' => 10000000,
            'date' => now()->toDateString(),
        ]);
        Revenue::create([
            'title' => 'Doanh thu dịch vụ',
            'amount' => 5000000,
            'date' => now()->subDay()->toDateString(),
        ]);
    }
}