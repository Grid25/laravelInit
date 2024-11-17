<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    // Método para almacenar una tarea
    public function store(Request $request){
        // Validación
        $request->validate(['title' => 'required|min:3']);
        
        // Crear la tarea
        $todo = new Tarea;
        $todo->title = $request->title;
        $todo->save();
        
        // Redirigir a la lista de tareas
        return redirect()->route('tareas')->with('success', 'Tarea creada correctamente');
    }

    // Método para mostrar todas las tareas
    public function index(Request $request){
        $todos = Tarea::all();  // Obtener todas las tareas
        return view('tareas.index', ['tareas' => $todos]);
    }

    public function destroy($id){
        $todo = Tarea::find($id);
        $todo->delete();
        return redirect()->route('tareas')->with('success', 'tarea deleted successfully');
    }

    public function show($id){
        $todo = Tarea::find($id);
        return view('tareas.show', ['tarea' => $todo]);
    }

    public function update(Request $request, $id){
        $todo = Tarea::find($id);
        // Validación
        $request->validate(['title' => 'required|min:3']);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('tareas')->with('success', 'tarea updated successfully');
    }
}
