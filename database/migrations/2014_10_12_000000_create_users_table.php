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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento_tipo');
            $table->string('documento_numero');
            $table->string('usuario');
            $table->string('password');
            $table->string('codigo_telefono');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('estatus')->default(1);
            $table->text('Token')->nullable();
            $table->string('genero')->nullable();
            $table->string('barrio')->nullable();
            $table->string('enterado')->nullable();
            $table->integer('primer_login')->default(1);
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
};
