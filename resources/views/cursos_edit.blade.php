@extends('layouts.dashboard')

{{-- @section('estilos_especificos') --}}

@section('title', 'Editar Curso')
@section('subtittle', 'Editar')


@section('content')
  <div class="container">

    <div class="col-lg-12 mb-md-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <h5 class="modal-title" id="crearCursoModalLabel">Editar Curso</h5>
          <a href="{{ route('cursos.index') }}"
            class="btn-close text-dark display-5 position-absolute top-0 end-0 mt-2 me-2" aria-label="Close">&times;</a>
        </div>
        <div class="card-body px-0 m-4 pb-2">

          <form action="{{ route('cursos.update', $curso) }}" method="post" id="formCurso">

            @csrf

            @method('put')

            <div class="mb-3">
              <label for="nombre">Nombre:</label>
              <input type="text" value="{{ old('nombre', $curso->nombre) }}"
                class="@error('nombre')
                is invalid
              @enderror" name="nombre">
              @error('nombre')
                <div class="invalid_feedback text-danger text-start">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="descripcion">Descripcion:</label>
              <textarea name="descripcion" id="descripcion" class="form-control border px-2" placeholder="Ingrese una descripcion"
                cols="30" rows="3">{{ $curso->descripcion }}</textarea>
            </div>

            <div class="mb-3">
              <label for="alumnos">Alumnos:</label>
              <div id="alumnos-container">
                @foreach ($curso->alumnos as $c_alumno)
                  <div class="alumno card mb-3 shadow-lg">
                    <div class="card-body">
                      <div class="mb-2">
                        <label for="alumnos">Alumno: {{ $loop->index + 1 }}</label>
                        <select name="alumnos[]" class="form-control border px-2" required>
                          @foreach ($alumnos as $alumno)
                            <option value="{{ $alumno->id }}" {{ $alumno->id == $c_alumno->id ? 'selected' : '' }}>
                              {{ $alumno->nombre }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <button type="button" class="btn btn-danger mt-2" onclick="eliminarAlumno(this)">Eliminar
                        Alumno</button>
                    </div>
                  </div>
                @endforeach
              </div>
              <button type="button" class="btn btn-primary mt-2" onclick="agregarAlumno()">Agregar
                Alumno</button>
            </div>

            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="resetForm()">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>

          </form>
        </div>

      </div>
    </div>

    <div id="alumno-plantilla" class="alumno card mb-3 shadow-lg" style="display: none;">
      <!-- Contenido de un alumno -->

      <div class="card-body">
        <div class="mb-2">
          <label for="alumnos">Alumno:</label>
          <select name="alumnos[]" class="form-control border px-2" required>
            @foreach ($alumnos as $alumno)
              <option value="{{ $alumno->id }}">
                {{ $alumno->nombre }}
              </option>
            @endforeach
          </select>
        </div>
        <button type="button" class="btn btn-danger mt-2" onclick="eliminarAlumno(this)">Eliminar
          Alumno</button>

      </div>


    </div>

    <script>
      function confirmarGuardar() {
        return confirm('¿Estás seguro de actualizar cambios?');
      }
    </script>

    <script>
      function eliminarAlumno(btn) {
        // Elimina el contenedor del producto al que pertenece el botón
        var productoContainer = btn.closest('.alumno');
        productoContainer.parentNode.removeChild(productoContainer);
      }
    </script>
    <script>
      function agregarAlumno() {
        // Clona el primer elemento del contenedor productos y lo agrega al contenedor

        var alumno = document.querySelector('#alumnos-container .alumno');

        if (alumno) {
          var nuevoAlumno = document.querySelector('#alumnos-container .alumno').cloneNode(true);
          document.getElementById('alumnos-container').appendChild(nuevoAlumno);
        } else {

          var plantillaAlumno = document.getElementById('alumno-plantilla');
          var nuevoAlumno = plantillaAlumno.cloneNode(true);
          nuevoAlumno.style.display = 'block'; // Mostrar el elemento clonado
          document.getElementById('alumnos-container').appendChild(nuevoAlumno);
        }

      }

      function resetForm() {
        // Limpia el formulario y los productos agregados dinámicamente
        document.getElementById('formAlumno').reset();
        document.getElementById('alumnos-container').innerHTML = '';
      }
    </script>


  @endsection
