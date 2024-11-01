<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaExamenToRegistrosImcTable extends Migration
{
    public function up()
    {
        Schema::table('Registros_imc', function (Blueprint $table) {
            $table->timestamp('fecha_examen')->nullable();
        });
    }

    public function down()
    {
        Schema::table('Registros_imc', function (Blueprint $table) {
            $table->dropColumn('fecha_examen');
        });
    }
}
