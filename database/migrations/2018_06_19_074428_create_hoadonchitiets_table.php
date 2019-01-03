<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonchitietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonchitiets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp');
            $table->integer('soluong');

            $table->integer('hoadon_id')->unsigned();
            $table->foreign('hoadon_id')->references('id')->on('hoadons')->onDelete('cascade');

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
        Schema::dropIfExists('hoadonchitiets');
    }
}
