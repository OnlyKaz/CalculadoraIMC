<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImcRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('Registros_imc', function (Blueprint $table) { // Cambia el nombre aquí
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('numero_identificacion')->unique();
            $table->string('programa_academico');
            $table->float('peso');
            $table->float('altura');
            $table->float('imc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Registros_imc'); // Cambia el nombre aquí también
    }
}
