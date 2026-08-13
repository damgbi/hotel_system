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

      <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content white'>
    @foreach ($hotelMenu as $hotelM)
        <li><a href="{{ route('admin.hotelDetails', $hotelM->id) }}" class="indigo-text text-darken-4">{{ $hotelM->name }}</a></li>
    @endforeach

  </ul>

    <nav class="indigo darken-4">
        <div class="nav-wrapper">
           <a href="#" class="brand-logo center">Gerenciador de hoteis</a>
           <ul id="nav-mobile" class="left">
            <li><a href="{{ route('admin.hoteis') }}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target="dropdown1">Hoteis<i class="material-icons right">expand_more</i></a></li>
            <li><a href="{{ route('admin.quartos') }}">Quartos</a></li>
            <li><a href="{{ route('admin.reservas') }}">Reservas</a></li>
           </ul>
           <ul id="nav-mobile" class="right">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                 @csrf
                    <button type="submit" class="btn-flat white-text waves-effect waves-light" style="background: none; border: none; padding: 0; cursor: pointer;">
                     Sair
                    </button>
                </form>
           </ul>    
        </div>
    </nav>

    @yield('content')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger:false,
          constrainWidth:false, 
          hover: true,
          hoverDelay: 50
        });
    </script>
    
</body>
</html>