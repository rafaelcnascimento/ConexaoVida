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
            $table->boolean('exclusivo')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('regiao_id')->default(23);
            $table->foreign('regiao_id')->references('id')->on('regioes');
            $table->unsignedInteger('tipo_sanguineo_id');
            $table->foreign('tipo_sanguineo_id')->references('id')->on('tipos_sanguineos');
            $table->softDeletes();
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
