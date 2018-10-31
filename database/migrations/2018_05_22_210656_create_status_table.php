<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('mastatus');
            $table->integer('mathanhvien')->unsigned();
            $table->foreign('mathanhvien')->references('mathanhvien')->on('thanhvien');
            $table->datetime('ngaygio');
            $table->text('noidung');
            $table->string('hinhanh')->nullable();
            $table->integer('soyeuthich')->default(0);
            $table->integer('sobinhluan')->default(0);
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
        Schema::dropIfExists('status');
    }
}
