<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Automigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('auto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idmarca');
            $table->string('modelo');
            $table->string('placa');
            $table->string('color');
            $table->string('precio');
            $table->timestamps();
            $table->foreign('idmarca')->references('id')->on('marca');
           // $table->foreign('idequipo')->references('id')->on('equiposses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto');

    }
}
