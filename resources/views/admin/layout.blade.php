<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav class="indigo darken-4">
        <div class="nav-wrapper">
           <a href="#" class="brand-logo center">Gerenciador de hoteis</a>
           <ul id="nav-mobile" class="left">
            <li><a href="">Home</a></li>
            <li><a href="{{ route('admin.hoteis') }}">Hoteis</a></li>
            <li><a href="{{ route('admin.quartos') }}">Quartos</a></li>
            <li><a href="{{ route('admin.reservas') }}">Reservas</a></li>
           </ul>
        </div>
    </nav>

    @yield('content')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>