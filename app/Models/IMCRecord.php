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
        'recomendacion', 
    ];

    public function setFechaExamenAttribute($value)
    {
        if (!empty($value)) {
            try {
                $this->attributes['fecha_examen'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
            } catch (\Exception $e) {
                $this->attributes['fecha_examen'] = null;
            }
        } else {
            $this->attributes['fecha_examen'] = null;
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
