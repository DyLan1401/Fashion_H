<?php

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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('product_name', 255);
                $table->string('product_description', 255);
                $table->float('price');
                $table->float('quantity');
                $table->string('color', 255);
                $table->string('size', 255);
                $table->unsignedBigInteger('type_id');
                $table->unsignedBigInteger('category_id');
                $table->string('product_image', 255);
                $table->timestamps();

                $table->foreign('type_id')->references('id')->on('product_types');
                $table->foreign('category_id')->references('id')->on('categories');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
