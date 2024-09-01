<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel DataTable')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">
<!-- Header -->
<header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center w-100">
    <h1 class="h4 mb-0">U-Virtual</h1>
    <div class="d-flex align-items-center">
        <span>{{ session('data_sesion')['nombres'] }} {{ session('data_sesion')['apellidos'] }}</span>
        <div class="ms-3">
            <img src="{{ session('data_sesion')['fotografia'] }}"
                 alt="Foto de {{ session('data_sesion')['nombres'] }}"
                 class="rounded-circle"
                 style="width: 40px; height: 40px; object-fit: cover;">
        </div>
    </div>
</header>

<div class="d-flex flex-grow-1" style="margin: 0; padding: 0;">
    <!-- Sidebar -->
    <aside class="bg-primary text-white d-flex flex-column p-4">
        <ul class="nav flex-column flex-grow-1">
            <div class="mb-4">
                <strong>Rol: </strong>{{ session('data_sesion')['nombre_rol'] }}
            </div>

            {!! session('data_sesion')['menu'] !!}
        </ul>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </aside>

    <main class="bg-light p-4 d-flex flex-column flex-grow-1">
        @yield('content')
    </main>
</div>
</body>
</html>
