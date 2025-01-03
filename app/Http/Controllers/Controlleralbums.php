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
    // public function supprimer($id){
    //         $album = DB::select("DELETE FROM photos WHERE photos_id=?", [$id]);
    //         return view('detail', ['album' =>$album]);
    // }

    
        // Méthode pour supprimer une photo d'un album
    public function destroy($albumId, $photoId)
    {
        // Trouver l'album par son ID
        $album = Album::findOrFail($albumId);

        // Trouver la photo à supprimer
        $photo = $album->photos()->findOrFail($photoId); // Si vous avez une relation avec photos()

        // Supprimer la photo
        $photo->delete();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('albums.show', ['id' => $albumId])
                         ->with('success', 'La photo a été supprimée avec succès.');
    }
}
?>