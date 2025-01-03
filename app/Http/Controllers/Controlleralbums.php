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

    

    public function detail($id){
            $album = DB::select("SELECT * FROM photos WHERE album_id=?", [$id]);
            return view('detail', ['album' =>$album]);
}
    public function supprimer($id){
            $album = DB::select("DELETE FROM photos WHERE photos_id=?", [$id]);
            return view('detail', ['album' =>$album]);
    }
}
?>