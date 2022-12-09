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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('raza',array('gatx','perrx'));
            $table->integer('edad')->nullable();
            $table->enum('sexo',array('macho','hembra'));
            $table->enum('tamaño',array('pequeño','mediano','grande'));
            $table->integer('peso')->nullable();
            $table->enum('pelaje',array('corto','largo'));
            $table->enum('energía',array('tranquilx','activx','energéticx'));
            $table->integer('dueñx');
            $table->enum('estado',array('disponible','en trámite','adoptado'));
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
        Schema::dropIfExists('mascotas');
    }
};
