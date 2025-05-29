<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            [
                'order_date' => '2025-05-01',
                'status' => 'Đã giao',
                'total' => 1490000,
                'items' => ['Áo khoác mùa đông', 'Áo sơ mi trắng']
            ],
            [
                'order_date' => '2025-04-15',
                'status' => 'Đang giao',
                'total' => 890000,
                'items' => ['Giày thể thao']
            ],
            [
                'order_date' => '2025-04-10',
                'status' => 'Đã huỷ',
                'total' => 620000,
                'items' => ['Quần jean nam']
            ],
        ];

        foreach ($orders as $data) {
            $order = Order::create([
                'user_id' => 1, // giả sử user_id = 1
                'order_date' => $data['order_date'],
                'status' => $data['status'],
                'total' => $data['total'],
            ]);
            foreach ($data['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $item,
                ]);
            }
        }
    }
}