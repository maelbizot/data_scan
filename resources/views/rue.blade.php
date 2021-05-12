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
    <button id="togg2">masquer les rues qui ne possèdent pas de DVF</button>
    <h1>liste des rues à {{$ville}}</h1>
    <h2>il y a {{$population}} habitans dans cette ville</h2>
       <ul class="row">
       @foreach($les_dvf as $rue)
          <li class="col-sm-2">
          {{$rue->adresse_nom_voie}}
            <a href="{{route ('dvf', [$rue->adresse_nom_voie, $ville]) }}">afficher les DVF de cette rue</a>
          </li>
        @endforeach
        @foreach($unique_rue as $le_reste)
          <li class="col-sm-2 mael">
          {{$le_reste->nom_voie}}
          </li>
        @endforeach
        </ul>

</div>
    </body>
    
</html>

<style>
li{
  margin : 10px;
}
</style>

<script>
togg1.addEventListener("click", () => {
  if(getElementByClassName('col-sm-2 mael').display != "none"){
    d1.style.display = "none";
  } else {
    d1.style.display = "block";
  }
})
</script>