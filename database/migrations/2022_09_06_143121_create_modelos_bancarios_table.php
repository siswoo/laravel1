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
        Schema::create('modelos_bancarios', function (Blueprint $table) {
            $table->id();
            $table->integer('id_modelos');
            $table->string('cpp');
            $table->string('documento_tipo');
            $table->string('documento_numero');
            $table->string('nombre');
            $table->string('tipo_cuenta');
            $table->string('numero_cuenta');
            $table->string('banco');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('modelos_bancarios');
    }
};
