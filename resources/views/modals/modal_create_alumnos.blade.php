<!-- Modal para el formulario de nueva aula -->
<div class="modal fade" id="crearAlumnosModal" tabindex="-1" aria-labelledby="crearAulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearAlumnosModalLabel">Agregar un nuevo cliente </h5>
                <button type="button" class="btn-close text-dark display-7" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('alumnos.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Nombre: </label>
                        <input type="text" class="form-control border px-2" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Apellido: </label>
                        <input type="text" class="form-control border px-2" id="apellido" name="apellido"
                            placeholder="Ingrese su apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Edad: </label>
                        <input type="number" class="form-control border px-2" id="edad" name="edad"
                            placeholder="Ingrese su edad" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">fecha_nacimiento: </label>
                        <input type="date" class="form-control border px-2" id="fecha_nacimiento"
                            name="fecha_nacimiento" placeholder="Ingrese su fecha de nacimiento" required>
                    </div>

                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
