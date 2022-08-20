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
            $table->string('email')->unique();
            $table->integer('rol1');
            $table->integer('rol2')->nullable();
            $table->integer('rol3')->nullable();
            $table->integer('rol4')->nullable();
            $table->integer('rol5')->nullable();
            $table->integer('rol6')->nullable();
            $table->integer('rol7')->nullable();
            $table->integer('rol8')->nullable();
            $table->integer('rol9')->nullable();
            $table->integer('rol10')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('estatus')->default(1);
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
