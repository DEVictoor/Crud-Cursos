@extends('layouts.dashboard')

@section('title', 'Alumnos')

@section('content')
    <div class="container">
        <div class="col-lg-12 mb-md-3 mb-4">
            <div class="card">
                <div class="header-card ms-3 me-3 mt-3">
                    <div class="d-flex gap-4 justify-content-between">
                        <h3 class="card-title">Alumno</h3>
                        <button type="" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#crearAlumnosModal">Crear
                            Alumno</button>


                    </div>



                </div>
                <div class="body-card ms-3 mt-3 me-3">
                    <table id="myTable" class="table my-4 display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">fecha Nacimiento</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $alumno->nombre }}</td>
                                    <td>{{ $alumno->apellido }}</td>
                                    <td>{{ $alumno->edad }}</td>
                                    <td>{{ $alumno->fecha_nacimiento->format('Y-m-d') }}</td>
                                    <td class="align-middle text-sm text-center">
                                        <div class="d-flex justify-content-center">
                                            {{-- EDITAR --}}
                                            <div class="col-xs-6 col-md-auto">
                                                <a href="{{ route('alumnos.edit', $alumno) }}"
                                                    class="btn btn-warning text-xxs">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </div>

                                            <div class="col-xs-6 col-md-auto ms-2">
                                                {{-- DELETE --}}
                                                {{-- <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger ml-2"
                                                        data-confirm-delete="true" onclick="return confirmarEliminar()"
                                                        aria-label="Close">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </form> --}}

                                                <form id="form-delete-{{ $alumno->id }}"
                                                    action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger ml-2 btn-confirm-delete"
                                                        data-alumno-id="{{ $alumno->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-confirm-delete').forEach(function(button) {
                button.addEventListener('click', function() {
                    const alumnoId = this.getAttribute('data-alumno-id');

                    // Utilizar SweetAlert para confirmar la eliminación
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción no se puede deshacer.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminarlo'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Enviar el formulario de eliminación
                            document.getElementById('form-delete-' + alumnoId).submit();
                        }
                    });
                });
            });
        });
    </script>

@endsection
