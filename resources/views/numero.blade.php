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
    <h1>liste des numéros dans {{$rue}}</h1>
       <ul class="row">
       @foreach($les_infos as $infos)
          <li class="col-sm-3">
            nom de rue : {{$infos->adresse_nom_voie}} <br>
            numéro : {{$infos->adresse_numero}} <br> 
            valeur foncière : {{$infos->valeur_fonciere}} <br>
            date de mutation : {{$infos->date_mutation}} <br>
            type de local : {{$infos->type_local}} <br>
            surface reelle bati : {{$infos->surface_reelle_bati}} <br>
            surface du terrain : {{$infos->surface_terrain}} <br>
          </li>
        @endforeach
        </ul>

</div>
    </body>
    
</html>

<style>
li{
  margin : 25px;
}
</style>
