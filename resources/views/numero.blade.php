<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prix de l'immorbilier à {{$rue}} </title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div>
      <h1>liste des numéros dans {{$rue}} à {{$roh}}</h1>
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
              nature de la mutation : {{$infos->nature_mutation}}
            </li>
          @endforeach
          </ul>
      </div>
      <div class="container">
        <h2>Prix moyen du m² à {{$rue}}</h2>
        <?php 
        $prix = 0;
        $surface = 0;
          $statement = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain', 'nom_commune')->where('adresse_nom_voie', $rue)->where('nom_commune', $roh)->orderBy('valeur_fonciere', 'desc')->distinct()->get();                        
          foreach ($statement as $item)
          {
            // echo intval("1")+ intval("1");
            // echo (int)$item->surface_reelle_bati. ' ';
            // echo intval($item->surface_reelle_bati).' ';
            //$surface += $item->surface_reelle_bati;
            if (intval($item->surface_reelle_bati) != 0){
              $prix += $item->valeur_fonciere;
              $surface += intval($item->surface_reelle_bati);
            }
            
          }
          $prix = $prix/$surface;
          $prix = number_format( $prix , 2, ',', ' ');
          echo $prix .'€';
        ?>
      </div>
      <div class="container">
        <h2>Prix moyen de vente à {{$rue}}</h2>
        <?php 
        $prix = 0;
        $incr = 0;
          $statement = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain', 'nom_commune')->where('adresse_nom_voie', $rue)->where('nom_commune', $roh)->orderBy('valeur_fonciere', 'desc')->distinct()->get();                        
          foreach ($statement as $item)
          {
              $prix += $item->valeur_fonciere;
              $incr += 1;
          }
          $prix = $prix/$incr;
          $prix = number_format( $prix , 3, ',', ' ');
          echo $prix .'€';
        ?>
      </div>
      <div class="container">
        <h2>Liste des rues à proximité de {{$rue}}</h2>
      </div>

        
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">numéro
          </th>
          <th class="th-sm">Ville
          </th>
          <th class="th-sm">Prix
          </th>

        </tr>
      </thead>
      <tbody>
                      <?php
                      use Illuminate\Http\Request;
                      use Illuminate\Support\Facades\DB;
                        $statement = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain', 'nom_commune')->where('adresse_nom_voie', $rue)->where('nom_commune', $roh)->orderBy('valeur_fonciere', 'desc')->distinct()->get();                        
                        foreach ($statement as $item)
                        {
                            echo '<td>'. $item->adresse_numero .'</td>' ;
                            echo '<td>'. $item->nom_commune .'</td>';
                            echo '<td>'.$item->valeur_fonciere . '</td>';
                            echo '</td>';
                            echo '</tr>';
                        }
                      ?>
                  </tbody>
                </table>
 
				</form>
    </body>
    
</html>

<style>
li{
  margin : 25px;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>

<script>
// Basic example
$(document).ready(function () {
$('#dtBasicExample').DataTable({
"ordering": false // false to disable sorting (or any other option)
});
$('.dataTables_length').addClass('bs-select');
});
</script>
