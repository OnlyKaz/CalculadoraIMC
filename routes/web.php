<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IMCRecordController;

// Rutas CRUD para el controlador IMCRecordController
Route::resource('Registros_imc', IMCRecordController::class);

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
});
