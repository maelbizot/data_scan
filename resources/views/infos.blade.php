<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>liste des départements</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div>
    <h1>liste des départements</h1>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">région</th>
      <th scope="col">numéro département</th>
      <th scope="col">nom département</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tout as $infos)
    <tr>
      <td><a href="/ ">{{ $infos->REG }}</a></td>
      <td>{{ $infos->CODDEP }}</td>
      <td><a href="{{route ('les_villes', $infos->DEP) }}">{{ $infos->DEP }}</a></td>
    </tr>

    @endforeach
  </tbody>
</table>

</div>
    </body>
    
</html>