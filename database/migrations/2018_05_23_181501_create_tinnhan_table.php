<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinnhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinnhan', function (Blueprint $table) {
            $table->increments('matinnhan');
            $table->integer('mabanbe')->unsigned();
            $table->foreign('mabanbe')->references('mabanbe')->on('banbe');
            $table->integer('mathanhvien')->unsigned();
            $table->foreign('mathanhvien')->references('mathanhvien')->on('thanhvien');
            $table->text('noidung');
            $table->datetime('ngaygio');
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
        Schema::dropIfExists('tinnhan');
    }
}
