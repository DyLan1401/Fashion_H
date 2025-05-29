<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->enum('type', ['order', 'service', 'other'])->default('order');
            $table->decimal('amount', 15, 2);
            $table->date('date');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revenues');
    }
};