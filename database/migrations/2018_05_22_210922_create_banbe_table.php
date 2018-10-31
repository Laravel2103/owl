<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanbeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banbe', function (Blueprint $table) {
            $table->increments('mabanbe');
            $table->integer('mathanhvien1')->unsigned();
            $table->foreign('mathanhvien1')->references('mathanhvien')->on('thanhvien');
            $table->integer('mathanhvien2')->unsigned();
            $table->foreign('mathanhvien2')->references('mathanhvien')->on('thanhvien');
            $table->boolean('ketnoi');
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
        Schema::dropIfExists('banbe');
    }
}
