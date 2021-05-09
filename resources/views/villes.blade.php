<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>liste des villes</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div>
    <h1>liste des villes</h1>
    


       <ul class="row">
       @foreach($la_ville as $ville)
          <li class="col-sm-2">
            <a href="{{route ('rues', $ville->nom_commune) }}">{{ $ville->nom_commune }}</a>
          </li>
        @endforeach
        </ul>

  </tbody>
</table>

</div>
    </body>
    
</html>
