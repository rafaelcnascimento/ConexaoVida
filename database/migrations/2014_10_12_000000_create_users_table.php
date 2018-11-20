<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_sanguineos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });

        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sigla',2);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->boolean('recebe_email')->default(1);
            $table->string('telefone');
            $table->string('cidade');
            $table->unsignedInteger('estado_id')->default(23);
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unsignedInteger('tipo_sanguineo_id');
            $table->foreign('tipo_sanguineo_id')->references('id')->on('tipos_sanguineos');
            $table->unsignedInteger('role_id')->default(2);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('password');
            $table->string('api_token', 60)->unique()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
