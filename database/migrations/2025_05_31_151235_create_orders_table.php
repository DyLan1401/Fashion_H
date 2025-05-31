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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id', 36)->primary();
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity');
            $table->float('total_amount');
            $table->date('order_date');
            $table->enum('payment_method', ['cod', 'banking', 'momo'])->default('cod');
            $table->string('shipping_address', 255);
            $table->unsignedInteger('discount_id')->nullable();
            $table->string('email', 255);
            $table->string('customer_name', 255);
            $table->string('phone', 20);
            $table->string('note', 255)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
