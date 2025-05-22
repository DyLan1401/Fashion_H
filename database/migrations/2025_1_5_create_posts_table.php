<?php
// database/migrations/xxxx_xx_xx_create_posts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de', 225);
            $table->text('noi_dung');
            $table->string('anh_dai_dien', 225)->nullable();
            $table->enum('trang_thai', ['draft', 'published', 'archived'])->default('draft');
            $table->unsignedBigInteger('ma_tac_gia');
            $table->timestamp('ngay_tao')->useCurrent();
        
            $table->foreign('ma_tac_gia')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
