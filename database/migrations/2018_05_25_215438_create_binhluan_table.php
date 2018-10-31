<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('mabinhluan');
            $table->dateTime('ngaygio');
            $table->text('noidung');
            $table->integer('mathanhvien')->unsigned();
            $table->foreign('mathanhvien')->references('mathanhvien')->on('thanhvien');
            $table->integer('mastatus')->unsigned();
            $table->foreign('mastatus')->references('mastatus')->on('status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
