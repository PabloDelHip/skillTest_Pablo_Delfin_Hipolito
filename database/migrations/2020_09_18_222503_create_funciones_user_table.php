<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones_user', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->unsigned();            
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('movieId')->unsigned();            
            $table->foreign('movieId')->references('id')->on('movie')->onDelete('cascade');
            $table->integer('seatId')->unsigned();            
            $table->foreign('seatId')->references('id')->on('seat')->onDelete('cascade');
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
        Schema::dropIfExists('funciones_user');
    }
}
