@extends('layouts.dashboard')

@section('title', 'AlumnosEdit')

@section('content')

    <div class="col-lg-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h5 class="modal-title">Editar Alumno</h5>
                <a href="{{ route('alumnos.index') }}"
                    class="btn-light text-dark display-6 position-absolute top-0 end-0 mt-2 me-2"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
                <a href="" class="btn btn-light">
                    <i class="fas fa-heart"></i> <!-- Icono de corazón -->
                </a>
            </div>
            <div class="card-body px-0 m-4 pb-2">

                <form action="{{ route('alumnos.update', $alumno) }}" method="POST">

                    @csrf

                    @method('put')

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Nombre:</label>
                        <input type="text" class="form-control border px-2" id="nombre" name="nombre"
                            value="{{ $alumno->nombre }}" placeholder="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Apellido:</label>
                        <input type="text" class="form-control border px-2" id="apellido" name="apellido"
                            value="{{ $alumno->apellido }}" placeholder="Apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Edad:</label>
                        <input type="number" class="form-control border px-2" id="edad" name="edad"
                            value="{{ $alumno->edad }}" placeholder="Edad" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Fecha_nacimiento:</label>
                        <input type="date" class="form-control border px-2" id="fecha_nacimiento" name="fecha_nacimiento"
                            value="{{ $alumno->fecha_nacimiento->format('Y-m-d') }}" placeholder="Fecha_nacimiento"
                            required>

                    </div>

                    <div class="">
                        <a href="{{ route('alumnos.index') }}" class="btn btn-dark">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary" data-confirm-delete="true"
                            onclick="return confirmarGuardar()">Guardar</button>
                    </div>


                </form>
            </div>

        </div>
    </div>

    </div>

    <script>
        function confirmarGuardar() {
            return confirm('¿Estás seguro de actualizar cambios?');
        }
    </script>

@endsection
