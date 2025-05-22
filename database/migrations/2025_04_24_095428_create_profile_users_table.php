<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ trước khi thêm mới
        Discount::truncate();

        // Khởi tạo Faker
        $faker = Faker::create();

        // Số lượng bản ghi muốn tạo (có thể thay đổi)
        $numberOfDiscounts = 50;

        // Tạo danh sách discount_id từ 101 trở đi
        $discountIds = range(101, 100 + $numberOfDiscounts);

        // Tạo dữ liệu ngẫu nhiên
        foreach ($discountIds as $id) {
            Discount::create([
                'discount_id' => $id,
                'discount_percent' => $faker->randomFloat(2, 5, 50), // Giá trị ngẫu nhiên từ 5.00 đến 50.00
                'discount_type' => $faker->randomElement(['percentage', 'fixed']), // Chọn ngẫu nhiên loại
                'min_order_value' => $faker->optional()->randomFloat(2, 0, 500000), // Giá trị từ 0 đến 500000, có thể null
                'usage_limit' => $faker->optional()->numberBetween(10, 100), // Giới hạn từ 10 đến 100, có thể null
                'usage_count' => 0, // Mặc định 0
                'discount_expiry_date' => $faker->dateTimeBetween('-1 month', '+2 months'), // Ngày ngẫu nhiên trong 1 tháng qua hoặc 2 tháng tới
            ]);
        }
    }
}
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade')
                  ->unique();      // đảm bảo 1–1
            $table->string('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_users');
    }
};
