<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCompatibilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compatibilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('receptor_id');
            $table->foreign('receptor_id')->references('id')->on('tipos_sanguineos');
            $table->unsignedInteger('doador_id');
            $table->foreign('doador_id')->references('id')->on('tipos_sanguineos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compatibilidades');
    }
}
