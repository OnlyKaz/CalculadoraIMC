<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IMCRecord extends Model
{
    use HasFactory;

    protected $table = 'registros_imc'; // Especifica el nombre exacto de la tabla en la base de datos

    protected $fillable = [
        'nombre', 
        'edad', 
        'sexo', 
        'numero_identificacion', 
        'programa_academico', 
        'peso', 
        'altura', 
        'imc', 
        'fecha_examen'
    ];

    // Accesor para formatear la fecha del examen
    public function getFechaExamenFormattedAttribute()
    {
        return Carbon::parse($this->fecha_examen)->format('d/m/Y H:i:s'); //Fecha en formato 'd/m/Y H:i:s'
    }
}
