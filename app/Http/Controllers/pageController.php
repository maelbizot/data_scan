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
    
    public function les_villes($CODDEP)
    {
        $nom_du_departement = DB::table('departements')->select('DEP')->where('CODDEP', $CODDEP)->first();
        
        $data_ville = DB::table('communes')->select('PMUN')->where('CODDEP', $CODDEP)->sum('PMUN');
        //$data_ville = DB::table('full')->select('');
        $la_ville = DB::table('communes')->select('COM')->where('CODDEP', $CODDEP)->distinct()->get();
        return view('villes')->with('la_ville', $la_ville)->with('data_ville', $data_ville)->with('le_departement', $CODDEP)->with('nom_du_departement', $nom_du_departement);
        //
    }

    public function la_rue($ville)
    {
        $population = DB::table('communes')->select('PMUN')->where('COM', $ville)->get();
        //$la_rue = DB::table('adresse-france')->select('nom_voie')->where('nom_commune', $ville)->distinct()->get();
        //->with('la_rue', $la_rue)
        $les_dfv = DB::table('59')->select('adresse_nom_voie')->where('nom_commune', $ville)->distinct()->get();
        $adresse = DB::table('adresse_france')->select('nom_voie')->where('nom_commune', $ville)->distinct()->get();
        //$unique_rue = array_unique($la_rue);   ->with('unique_rue', $unique_rue);
        return view('rue')->with('ville', $ville)->with('population', $population)->with('les_dvf', $les_dfv)->with('adresse', $adresse);
    }

    public function dvf($rue, $ville)
    {
        print $ville;
        $les_infos = DB::table('59')->select('adresse_nom_voie', 'valeur_fonciere', 'adresse_numero', 'nature_mutation', 'date_mutation', 'type_local','nombre_pieces_principales', 'surface_reelle_bati', 'surface_terrain')->where('adresse_nom_voie', $rue)->where('nom_commune', $ville)->distinct()->get();
        return view('numero')->with('les_infos', $les_infos)->with('roh', $ville)->with('rue', $rue);
    }

}