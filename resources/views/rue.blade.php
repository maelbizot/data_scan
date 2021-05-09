<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>liste des rues </title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div>
    <h1>liste des rues à {{$ville}}</h1>
       <ul class="row">
       @foreach($la_rue as $rue)
          <li class="col-sm-2">
            <a href="{{route ('dvf', [$rue->adresse_nom_voie, $ville]) }}">{{$rue->adresse_nom_voie}}</a>
          </li>
        @endforeach
        </ul>

</div>
    </body>
    
</html>
