<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index($ville){
        $les_dfv = DB::table('59')->select('adresse_nom_voie')->where('nom_commune', $ville)->distinct()->get();
        return $les_dfv;
    }
}
