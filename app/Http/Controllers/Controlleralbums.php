<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlleralbum extends Controller
{
    function index(){
        return view("index");
    }

        public function allAlbums(){
                $albums = DB::select("SELECT * FROM albums");
                return view('albums', ['albums' =>$albums]);
            }

}

?>