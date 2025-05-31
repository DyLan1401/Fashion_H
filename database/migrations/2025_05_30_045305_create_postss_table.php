<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('ma_bai_viet');
            $table->string('tieu_de');
            $table->text('noi_dung')->nullable();
            $table->string('anh_dai_dien')->nullable();
            $table->enum('trang_thai_bai_viet', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('ma_tac_gia');
            $table->timestamp('ngay_tao')->useCurrent();

            // Khóa ngoại (nếu có bảng users hoặc tác giả)
            // $table->foreign('ma_tac_gia')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bai_viet');
    }
};
