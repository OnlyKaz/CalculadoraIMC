<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IMCRecord extends Model
{
    protected $table = 'registros_imc'; // Apunta a la tabla correcta

    protected $fillable = [
        'nombre',
        'edad',
        'sexo',
        'numero_identificacion',
        'programa_academico',
        'peso',
        'altura',
        'imc',
        'fecha_examen',
    ];
}
