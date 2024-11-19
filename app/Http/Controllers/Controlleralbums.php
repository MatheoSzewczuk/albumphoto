<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controlleralbums extends Controller
{
    function index(){
        return view("index");
    }

        public function albums(){
                $albums = DB::select("SELECT * FROM albums");
                return view('albums', ['albums' =>$albums]);
            }

}

?>