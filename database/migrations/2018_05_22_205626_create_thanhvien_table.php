<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->increments('mathanhvien');
            $table->string('tenthanhvien');
            $table->string('matkhau');
            $table->string('email');
            $table->string('anhdaidien')->define('noavatar.png');
            $table->date('ngaysinh')->nullable();
            $table->string('diachi')->nullable();
            $table->integer('xu')->default(0);
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
        Schema::dropIfExists('thanhvien');
    }
}
