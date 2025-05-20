<?php

namespace Database\Factories;

use App\Models\Product_types;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = Product_types::with('category')->inRandomOrder()->first();
        return [
            'product_name' => $this->faker->word(), // Tạo tên sản phẩm ngẫu nhiên
            'product_description' => $this->faker->sentence(10), // Mô tả ngẫu nhiên
            'price' => $this->faker->randomFloat(2, 10, 1000), // Giá ngẫu nhiên từ 10 đến 1000
            'quantity' => $this->faker->numberBetween(1, 100), // Số lượng từ 1 đến 100
            'color' => $this->faker->safeColorName(), // Tên màu ngẫu nhiên
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']), // Kích thước ngẫu nhiên
            'type_id' => $type->id,
            'category_id' => $type->category->id, // Giá trị category_id ngẫu nhiên (giả sử có 5 danh mục)
            'product_image' => $this->faker->imageUrl(640, 480, 'products', true), // URL ảnh giả
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
