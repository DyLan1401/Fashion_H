<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('discount_id'); // ID sẽ được dùng làm mã giảm giá
            $table->string('loai_giam_gia'); // 'percentage' hoặc 'fixed'
            $table->decimal('phan_tram_giam_gia', 8, 2); // phần trăm hoặc số tiền giảm
            $table->decimal('gia_tri_don_hang_toi_thieu', 10, 2)->nullable(); // giá trị đơn hàng tối thiểu để áp dụng
            $table->integer('so_lan_su_dung_toi_da')->nullable(); // số lần sử dụng tối đa
            $table->integer('so_lan_da_su_dung')->default(0); // số lần đã sử dụng
            $table->dateTime('ngay_het_han_giam_gia'); // ngày hết hạn
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
