@extends('app')

@section('content')
<div class="container w-25 border p-4">
    <div class="row mx-auto">
        
        <!-- Asegúrate de que el formulario tenga el método PATCH y la acción correcta -->
        <form method="POST" action="{{ route('tareas-update', ['id' => $tarea->id]) }}">
            @csrf <!-- Protección CSRF -->
            @method('PATCH') <!-- Usamos el método PATCH para la actualización de la tarea -->

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <div class="mb-3 col">
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" class="form-control" name="title" value="{{ $tarea->title }}">
            </div>
            
            <input type="submit" value="Actualizar tarea" class="btn btn-primary my-2" />
        </form>   
    </div>
</div>
@endsection
