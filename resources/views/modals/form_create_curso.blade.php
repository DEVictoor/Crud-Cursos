@section('modal_create_curso')
  <!-- Modal para el formulario de nuevo pedido -->
  <div class="modal fade" id="CreateCurso" role="dialog" tabindex="-1" aria-labelledby="CrearPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CrearPedidoLabel">Agregar nuevo curso</h5>
          <button type="button" class="btn-close text-dark display-7" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>

        <div class="modal-body">

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('cursos.store') }}" method="post" id="formPedido">

            @csrf

            <div class="mb-3">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control border px-2" id="nombre" name="nombre"
                placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
              <label for="descripcion">Descripcion:</label>
              <textarea name="descripcion" id="descripcion" class="form-control border px-2" placeholder="Ingrese una descripcion"
                cols="30" rows="3"></textarea>
              {{-- <textarea type="text" class="form-control border px-2" id="descripcion" name="descripcion"
              placeholder="Ingrese una descripcion" /> --}}
            </div>

            <div class="mb-3">
              <label for="productos">Alumnos:</label>
              <div id="alumnos-container">
                <!-- Contenedor dinámico para alumnos -->
                <div class="alumno card mb-3 shadow-lg">
                  <div class="card-body">
                    <div class="mb-2">
                      <label for="alumno">Alumno:</label>
                      <select name="alumnos[]" class="form-control border px-2" required>
                        @foreach ($alumnos as $key => $alumno)
                          <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-primary mt-2" onclick="agreagarAlumno()">Agregar
                Alumno</button>
            </div>

            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="resetForm()">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script>
    function agreagarAlumno() {
      // Clona el primer elemento del contenedor productos y lo agrega al contenedor
      var nuevoProducto = document.querySelector('#alumnos-container .alumno').cloneNode(true);
      document.getElementById('alumnos-container').appendChild(nuevoProducto);
    }

    function resetForm() {
      // Limpia el formulario y los productos agregados dinámicamente
      document.getElementById('formPedido').reset();
      document.getElementById('productos-container').innerHTML = '';
    }
  </script>
@endsection
