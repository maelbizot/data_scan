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
    <h1>liste des numéro dans {{$roh}}</h1>
       <ul class="row">
       @foreach($les_infos as $infos)
          <li class="col-sm-4">
            nom de rue : {{$infos->adresse_nom_voie}}
            numéro : {{$infos->adresse_numero}}
            valeur foncière : {{$infos->valeur_fonciere}}
            date de mutation : {{$infos->date_mutation}}
            type de local : {{$infos->type_local}}
            surface reelle bati : {{$infos->surface_reelle_bati}}
            surface du terrain : {{$infos->surface_terrain}}
          </li>
        @endforeach
        </ul>

</div>
    </body>
    
</html>
