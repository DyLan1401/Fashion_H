<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Bỏ khóa ngoại cũ
            $table->dropForeign(['type_id']);
            $table->dropForeign(['category_id']);

            // Thêm khóa ngoại mới với onDelete cascade
            $table->foreign('type_id')
                  ->references('id')
                  ->on('product_types')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Bỏ khóa ngoại có onDelete cascade
            $table->dropForeign(['type_id']);
            $table->dropForeign(['category_id']);

            // Thêm lại khóa ngoại không có onDelete cascade
            $table->foreign('type_id')
                  ->references('id')
                  ->on('product_types');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');
        });
    }
};
