<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paciente');
            $table->string('hospital');
            $table->string('quarto');
            $table->string('endereco_hospital');
            $table->string('cidade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('estado_id')->default(23);
            $table->boolean('exclusivo');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unsignedInteger('tipo_sanguineo_id');
            $table->foreign('tipo_sanguineo_id')->references('id')->on('tipos_sanguineos');
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
        Schema::dropIfExists('doacoes');
    }
}
