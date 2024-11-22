<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IMCRecord extends Model
{
    use HasFactory;

    protected $table = 'registros_imc';

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

    // Mutator para convertir la fecha al formato adecuado
    public function setFechaExamenAttribute($value)
    {
        // Verificar si la fecha es válida y no vacía
        if (!empty($value)) {
            try {
                // Intentar convertir la fecha con el formato adecuado
                $this->attributes['fecha_examen'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
            } catch (\Exception $e) {
                // Si la fecha no es válida, manejar el error (puedes loguearlo si es necesario)
                $this->attributes['fecha_examen'] = null; // O algún valor predeterminado si lo prefieres
            }
        } else {
            $this->attributes['fecha_examen'] = null; // Si la fecha está vacía, asignar nulo
        }
    }

    // Accesor para recomendaciones según el IMC
    public function getRecomendacionAttribute()
    {
        if ($this->imc < 18.5) {
            return "Su IMC es de " . number_format($this->imc, 2) . ". Está dentro del rango de peso insuficiente. Es recomendable aumentar la ingesta calórica y consultar a un especialista.";
        } elseif ($this->imc >= 18.5 && $this->imc < 24.9) {
            return "Su IMC es de " . number_format($this->imc, 2) . ". Está dentro del rango de peso normal o saludable. Mantenga una dieta balanceada y ejercicio regular.";
        } elseif ($this->imc >= 25 && $this->imc < 29.9) {
            return "Su IMC es de " . number_format($this->imc, 2) . ". Está dentro del rango de sobrepeso. Es recomendable cuidar la alimentación y aumentar la actividad física.";
        } else {
            return "Su IMC es de " . number_format($this->imc, 2) . ". Está dentro del rango de obesidad. Consulte a un especialista para un plan de alimentación y ejercicio personalizado.";
        }
    }

    // Accesor para calcular el IMC dinámicamente
    public function getImcAttribute()
    {
        $alturaMetros = $this->altura / 100;
        return $alturaMetros > 0 ? $this->peso / ($alturaMetros ** 2) : 0;
    }
}
