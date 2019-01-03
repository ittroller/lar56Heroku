<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp');
            $table->string('alias');
            $table->integer('soluong');
            $table->float('gia');//double
            $table->float('giamgia')->default(0);
            $table->tinyInteger('moihaycu')->default(0);
            $table->string('anh');
            $table->string('mota');
            $table->integer('loaisp_id')->unsigned();
            $table->foreign('loaisp_id')->references('id')->on('loaisanphams')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('sanphams');
    }
}
