<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('remove_favorites_list', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('product_name');
            $table->timestamp('removed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('remove_favorites_list');
    }
};