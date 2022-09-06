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
        Schema::create('modelos_corporales', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->string('altura');
            $table->string('peso');
            $table->string('pene')->nullable();
            $table->string('sosten')->nullable();
            $table->string('busto')->nullable();
            $table->string('cintura')->nullable();
            $table->string('caderas')->nullable();
            $table->string('tipo_cuerpo');
            $table->string('vello');
            $table->string('color_cabello');
            $table->string('color_ojos');
            $table->string('tattoo');
            $table->string('piercing');
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
        Schema::dropIfExists('modelos_corporales');
    }
};
