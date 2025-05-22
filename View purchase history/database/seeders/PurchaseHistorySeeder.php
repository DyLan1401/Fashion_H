<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseHistory;

class PurchaseHistorySeeder extends Seeder
{
    public function run()
    {
        PurchaseHistory::create([
            'user_name' => 'Nguyễn Văn A',
            'product_name' => 'Sản phẩm A',
            'quantity' => 2,
            'total_price' => 200000,
            'purchase_date' => now()->toDateString(),
        ]);
        PurchaseHistory::create([
            'user_name' => 'Trần Thị B',
            'product_name' => 'Sản phẩm B',
            'quantity' => 1,
            'total_price' => 150000,
            'purchase_date' => now()->subDay()->toDateString(),
        ]);
    }
}