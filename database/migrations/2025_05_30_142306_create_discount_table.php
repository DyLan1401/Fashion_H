<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('ma_giam_gia'); // primary key
            $table->decimal('phan_tram_giam_gia', 10, 2); // not null
            $table->enum('loai_giam_gia', ['percentage', 'fixed']); // not null
            $table->decimal('gia_tri_don_hang_toi_thieu', 10, 2)->nullable();
            $table->integer('so_lan_su_dung_toi_da')->nullable();
            $table->integer('so_lan_da_su_dung')->default(0);
            $table->dateTime('ngay_het_han_giam_gia'); // not null
            $table->timestamp('ngay_tao')->useCurrent(); // DEFAULT CURRENT_TIMESTAMP
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}