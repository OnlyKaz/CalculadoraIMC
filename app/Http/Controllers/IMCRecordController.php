<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IMCRecord; // Importa el modelo
use Carbon\Carbon; // Importa Carbon para manipulación de fechas

class IMCRecordController extends Controller
{
    // Método para mostrar el listado de registros IMC
    public function index()
    {
        $imcRecords = IMCRecord::all()->map(function ($record) {
            // Formatea la fecha de examen en el formato deseado
            $record->fecha_examen = Carbon::parse($record->fecha_examen)->format('d/m/Y H:i:s'); //Fecha en formato 'd/m/Y H:i:s'
            return $record;
        });

        return view('Registros_imc.index', compact('imcRecords'));
    }

    // Método para mostrar el formulario de creación de un nuevo registro
    public function create()
    {
        return view('Registros_imc.create');
    }

    // Método para guardar un nuevo registro en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
            'numero_identificacion' => 'required|string|unique:registros_imc', // Nombre correcto de la tabla
            'programa_academico' => 'required|string|max:255',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
        ]);

        // Convertir la altura de cm a metros para el cálculo de IMC
        $alturaMetros = $validated['altura'] / 100;
        $imc = $validated['peso'] / ($alturaMetros ** 2);

        // Crear y guardar el nuevo registro
        $imcRecord = IMCRecord::create([
            'nombre' => $validated['nombre'],
            'edad' => $validated['edad'],
            'sexo' => $validated['sexo'],
            'numero_identificacion' => $validated['numero_identificacion'],
            'programa_academico' => $validated['programa_academico'],
            'peso' => $validated['peso'],
            'altura' => $validated['altura'],
            'imc' => $imc,
            'fecha_examen' => Carbon::now(), // Uso explícito de Carbon para claridad
        ]);

        return redirect()->route('Registros_imc.index')->with('success', "Registro guardado correctamente. Su IMC es: " . number_format($imc, 2));
    }

    // Método para mostrar el formulario de edición de un registro específico
    public function edit($id)
    {
        $record = IMCRecord::findOrFail($id);
        return view('Registros_imc.edit', compact('record'));
    }

    // Método para actualizar un registro en la base de datos
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
            'numero_identificacion' => 'required|string|unique:registros_imc,numero_identificacion,' . $id, // Nombre correcto de la tabla
            'programa_academico' => 'required|string|max:255',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
        ]);

        $record = IMCRecord::findOrFail($id);

        // Convertir la altura a metros y recalcular el IMC
        $alturaMetros = $validated['altura'] / 100;
        $imc = $validated['peso'] / ($alturaMetros ** 2);

        // Actualizar el registro
        $record->update([
            'nombre' => $validated['nombre'],
            'edad' => $validated['edad'],
            'sexo' => $validated['sexo'],
            'numero_identificacion' => $validated['numero_identificacion'],
            'programa_academico' => $validated['programa_academico'],
            'peso' => $validated['peso'],
            'altura' => $validated['altura'],
            'imc' => $imc,
            'fecha_examen' => Carbon::now(), // Uso explícito de Carbon para claridad
        ]);

        return redirect()->route('Registros_imc.index')->with('success', "Registro actualizado correctamente. Su IMC es: " . number_format($imc, 2));
    }

    // Método para eliminar un registro de la base de datos
    public function destroy($id)
    {
        $imcRecord = IMCRecord::findOrFail($id);
        $imcRecord->delete();

        return redirect()->route('Registros_imc.index')->with('success', 'Registro eliminado correctamente');
    }

    
}
