<?php

use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web');
});

Route::get('/saludos', function () {
    return "hola estoy probando";
});

// Ruta POST para almacenar la tarea
Route::post('/tareas', [TareasController::class, 'store']);

// Ruta GET para mostrar las tareas
Route::get('/tareas', [TareasController::class, 'index'])->name('tareas');

// Rutas para eliminar y actualizar tareas
Route::delete('/tareas/{id}', [TareasController::class , 'destroy'])->name('tareas-destroy');

Route::get('/tareas/{id}', [TareasController::class , 'show'])->name('tareas-edit');

Route::patch('/tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');


// Categories
Route::resource('categorias', CategoriaController::class);