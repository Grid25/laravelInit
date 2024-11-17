@extends('app')

@section('content')
<div class="container w-25 border p-4">
    <div class="row mx-auto">
        
        <!-- Asegúrate de que el formulario tenga el método POST y la acción correcta -->
        <form method="POST" action="{{ route('tareas') }}">
            @csrf <!-- Protección CSRF -->

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="mb-3 col">
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Comprar la cena">
            </div>
            
            <!-- El botón de envío debe estar dentro del formulario -->
            <input type="submit" value="Crear tarea" class="btn btn-primary my-2" />
        </form>   
        <div >
            @foreach ($tareas as $tarea)
            
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tareas-edit', ['id' => $tarea->id]) }}">{{ $tarea->title }}</a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('tareas-destroy', ['id' => $tarea->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
</div>
@endsection
