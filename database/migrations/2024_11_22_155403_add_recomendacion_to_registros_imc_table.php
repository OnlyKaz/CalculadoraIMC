<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecomendacionToRegistrosImcTable extends Migration
{
    public function up()
    {
        Schema::table('registros_imc', function (Blueprint $table) {
            $table->text('recomendacion')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('registros_imc', function (Blueprint $table) {
            $table->dropColumn('recomendacion');
        });
    }
}
