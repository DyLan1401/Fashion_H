<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('phan_tram_giam_gia', 10, 2)->notNullable();
            $table->enum('loai_giam_gia', ['percentage'])->default('percentage');
            $table->decimal('gia_tri_don_hang_toi_thieu', 10, 2)->nullable();
            $table->integer('so_lan_su_dung_toi_da')->nullable();
            $table->integer('so_lan_da_su_dung')->default(0);
            $table->dateTime('ngay_het_han_giam_gia')->notNullable();
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}