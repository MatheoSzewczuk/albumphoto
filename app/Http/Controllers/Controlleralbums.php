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
public function SupprimerPhoto($id)
    {
        $photo = Photo::findOrFail($id);

        // Supprimer le fichier si la photo est stockée localement
        if ($photo->url && Storage::exists(str_replace('/storage', 'public', $photo->url))) {
            Storage::delete(str_replace('/storage', 'public', $photo->url));
        }

        $photo->delete();
        return back()->with('success', 'Photo supprimée avec succès.');
    }
}
?>