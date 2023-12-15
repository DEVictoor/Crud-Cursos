<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>
    @yield('title')
  </title>

  <script src="{{ asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- datableStyle --}}

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" async>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-xrPex3Z6zll8mj8HZK4dn93He7yXMMyHcaXR29Mctvlr4ULif9t7pSw2tLycX+kDtQV6y6kJsLHII59yxfnUgA=="
    crossorigin="anonymous" />
  {{-- boostrap --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>

<body>
  @include('sweetalert::alert')
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Crud Cursos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          @if (Route::has('cursos.index'))
            <a class="nav-item nav-link {{ Route::is('cursos.index') ? 'active' : '' }} "
              href="{{ route('cursos.index') }}">Cursos</a>
          @endif
          @if (Route::has('alumnos.index'))
            <a class="nav-item nav-link {{ Route::is('alumnos.index') ? 'active' : '' }} "
              href="{{ route('alumnos.index') }}">Alumnos</a>
          @endif
        </div>
      </div>
    </nav>

    <div class="container-fluid py-4">
      @yield('content')
    </div>
  </div>

  {{-- MODALS --}}
  @extends('modals.modal_create_alumnos')
  @yield('modal_create_curso')
  {{-- FIN MODALS --}}


  {{-- datableScript --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

  <script src="https://kit.fontawesome.com/6c225b4578.js" crossorigin="anonymous"></script>

</body>

</html>
