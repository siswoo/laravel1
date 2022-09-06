<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_cuentas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->integer('id_paginas');
            $table->string('usuario');
            $table->string('password')->nullable();
            $table->string('correo')->nullable();
            $table->string('link')->nullable();
            $table->string('nickname_xlove')->nullable();
            $table->string('usuario_bonga')->nullable();
            $table->integer('estatus');
            $table->integer('id_users_responsable');
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
        Schema::dropIfExists('modelos_cuentas');
    }
};
