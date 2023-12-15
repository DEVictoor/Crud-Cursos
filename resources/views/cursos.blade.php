@extends('layouts.dashboard')

@section('title', 'Cursos')

@extends('modals.form_create_curso')

@section('content')
  <div class="d-flex gap-4 justify-content-between">
    <h3>Cursos</h3>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#CreateCurso">Crear curso &nbsp;<i
        class="fas fa-plus-circle"></i></button>

  </div>

  <table class="table my-4">
    <thead>
      <tr>
        <th class="text-center" scope="col">#</th>
        <th class="text-center" scope="col">Nombre</th>
        <th class="text-center" scope="col">Descripcion</th>
        <th class="text-center" scope="col">Alumnos</th>
        <th class="text-center" scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cursos as $curso)
        <tr>
          <th class="text-center" scope="row">{{ $loop->index + 1 }}</th>
          <td class="text-center col-md-4">{{ $curso->nombre }}</td>
          <td class="text-center col-md-4">{{ $curso->descripcion }}</td>
          <td class="text-center text-truncate">
            @if (count($curso->alumnos) > 0)
              <button class="btn btn-link" data-bs-toggle="collapse"
                data-bs-target="#productosCollapse{{ $loop->index }}">
                Ver más
              </button>
            @else
              No hay alumnos
            @endif
            <div class="collapse" id="productosCollapse{{ $loop->index }}">
              @if (count($curso->alumnos) > 0)
                <ul>
                  @foreach ($curso->alumnos as $alumno)
                    <li> {{ $alumno->nombre }}</li>
                  @endforeach
                </ul>
              @endif
            </div>

          </td>
          <td class="text-center">
            <div class="d-flex gap-2 justify-content-center">
              {{-- EDITAR --}}
              <div class="">
                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
              </div>

              <div class="">
                <a type="button" class="btn btn-danger ml-2" href="{{ route('cursos.destroy', $curso) }}"
                  data-confirm-delete="true">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var myModal = new bootstrap.Modal(document.getElementById('CreateCurso'));
      myModal.show();
    });
  </script>
@endsection
