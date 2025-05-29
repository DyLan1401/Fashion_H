<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('ma_bai_viet');
            $table->string('tieu_de', 225);
            $table->text('noi_dung');
            $table->string('anh_dai_dien', 225)->nullable();
            $table->enum('trang_thai_bai_viet', ['draft', 'published', 'archived'])->default('draft');
            $table->foreignId('ma_tac_gia')->constrained('users', 'id');
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};