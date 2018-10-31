<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeuthichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeuthich', function (Blueprint $table) {
            $table->increments('mayeuthich');
            $table->integer('mastatus')->unsigned();
            $table->foreign('mastatus')->references('mastatus')->on('status');
            $table->integer('mathanhvien')->unsigned();
            $table->foreign('mathanhvien')->references('mathanhvien')->on('thanhvien');
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
        Schema::dropIfExists('yeuthich');
    }
}
