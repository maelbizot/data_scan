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
              nature de la mutation : {{$infos->nature_mutation}}
            </li>
          @endforeach
          </ul>
      </div>

      <form action="index.php" method="GET">
        <label for="cars">trier par ordre : </label>
        <select id="cars" name="carlist" form="carform">
          <option value="asc">croissant</option>
          <option value="desc">decroissant</option>
          <input type="submit" name="orderby"/>
        </select>
        
				<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>adresse_nom_voie</th>
                      <th>Description</th>
                      <th>Quantité</th>
                      <th>Catégorie</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      use Illuminate\Http\Request;
                      use Illuminate\Support\Facades\DB;

 
						if(isset($_GET['carlist']) && $_GET['carlist'] == "asc") 
						{
   							$orderby = 'ASC';
						}
						else 
						{
					   		$orderby = 'desc';
						}
                        $statement = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain')->where('adresse_nom_voie', $rue)->orderBy('valeur_fonciere', $orderby)->distinct()->get();
                        foreach ($statement as $item)
                        {
                            echo '<tr>';
                            echo '<td>'. '</td>';
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
</style>
