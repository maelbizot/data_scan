<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class pageController extends Controller
{

    public function liste()
    {
        $tout = DB::table('departements')->select('REG','CODDEP','DEP')->get();
        return view('infos')->with('tout', $tout);
    }

    public function afficher($nom_departement)
    {
        $les_villes = DB::table('departements')->select('REG','CODDEP','DEP')->where('DEP', $nom_departement)->get();
        echo($les_villes);
        return view('infos')->with('les_villes', $les_villes);
    }
    public function les_villes($nom_departement)
    {
        $la_ville = DB::table('59')->select('nom_commune')->distinct()->get();
        return view('villes')->with('la_ville', $la_ville);
    }

    public function la_rue($ville)
    {
        
        $la_rue = DB::table('59')->select('adresse_nom_voie')->where('nom_commune', $ville)->distinct()->get();
        return view('rue')->with('la_rue', $la_rue)->with('ville', $ville);
    }

    public function dvf($rue, $ville)
    {
        print $ville;
        $les_infos = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain')->where('adresse_nom_voie', $rue)->where('nom_commune', $ville)->get();
        return view('numero')->with('les_infos', $les_infos)->with('roh', $ville);
    }
}
