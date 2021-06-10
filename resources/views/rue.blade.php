<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>prix de l'immobilier à {{$ville}}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!--  -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
       
    </head>
    <body>
    <div id="app">
    <h1>consultez le prix de l'immobilier à {{$ville}}</h1>
    <h2>il y a {{$population[0]->PMUN}} habitans dans cette ville</h2>
    <div id="mapid"></div>
    <search-component home-route="{{ route ('rues', [$CODDEP ,$ville]) }}"></search-component>
       <!-- <ul class="row">
       @foreach($les_dvf as $rue)
          <li class="col-sm-2">
          {{$rue->adresse_nom_voie}}
            <a href="{{route ('dvf', [$CODDEP ,$ville,  $rue->adresse_nom_voie ]) }}">afficher les DVF de cette rue</a>
          </li>
        @endforeach
      </ul> -->
      <button id="togg2">masquer les rues qui ne possèdent pas de DVF</button>
      <ul id="mael">
        @foreach($adresse as $le_reste)
          <li >
          {{$le_reste->nom_voie}}
          </li>          
        @endforeach
      </ul>

      <h2>Prix détaillé de l'immobilier à {{$ville}}</h2>

      <h2>Informations complémentaire sur {{$ville}}</h2>
      
      <h2>liste des commerces à {{$ville}}</h2>

</div>

    </body>
    
</html>

<style>
li{
  margin : 10px;
}
.mael{
  display : none;
}

#mapid { height: 400px;}

</style>

  <!-- Make sure you put this AFTER Leaflet's CSS -->

  <script>
  
  var ville = "{{$ville}}";

   async function addMarkerFromAdr(adr){
        // return await fetch("https://nominatim.openstreetmap.org/search?q=%22+this.addr+%22&format=json"
        return await fetch('https://photon.komoot.io/api/?q=%27'+adr)
        .then(r =>{
             //on doit le transformer en Json
              return r.json() // on est obligé de parser pour que javascript puisse l'interpreter aussi en json
        })
        .then(results =>{

                let latitude= results['features'][0]['geometry']['coordinates'][1]
                let longitude= results['features'][0]['geometry']['coordinates'][0]
              
               return {array :[latitude,longitude]};



        })
        .catch(error =>{ // suivant le statut de la requête il distingue tout seul si c'est une err
            console.log(error);
        });

    }
  
  var array=[]
  rep=addMarkerFromAdr(ville)
  rep.then(function(res){

    var mymap = L.map('mapid').setView([res.array[0],res.array[1] ], 13);
    L.marker([res.array[0],res.array[1] ]).addTo(mymap);
  //var  accessToken = 'pk.eyJ1IjoibWFlc3Ryb20iLCJhIjoiY2twbnV6dHA0NGk4cTMxbnhuZWo1ZG40cSJ9.s1WGnpSmL85W_N5PhAO5Vw'
  var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
  L.tileLayer(osmUrl, {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
   // id: 'mapbox/streets-v11',
   // tileSize: 512,
    //zoomOffset: -1,
   
  }).addTo(mymap);

  });
 
  

</script>