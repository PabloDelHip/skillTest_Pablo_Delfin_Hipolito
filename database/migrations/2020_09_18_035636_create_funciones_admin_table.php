<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionesAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones_admin', function (Blueprint $table) {
            $table->id();
            $table->integer('movieId')->unsigned();            
            $table->foreign('movieId')->references('id')->on('movie')->onDelete('cascade');
            $table->dateTime('time', 0);
            $table->string('location');
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
        Schema::dropIfExists('funciones_admin');
    }
}
