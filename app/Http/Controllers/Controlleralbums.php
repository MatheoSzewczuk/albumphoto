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

    public function ajouter($id)
    {
        $album = Album::findOrFail($id);

        // Afficher la vue avec l'album
        return view('ajouter', compact('album'));
    }

    // Enregistre la photo et les informations dans la base de données
    public function store(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validation pour les fichiers image
            'nom' => 'required|string|max:255',
            'etiquettes' => 'nullable|string',
        ]);

        // Récupérer l'album par son id
        $album = Album::findOrFail($id);

        // Télécharger la photo
        $photoPath = $request->file('photo')->store('photos', 'public');

        // Enregistrer la photo dans la base de données
        Photo::create([
            'album_id' => $album->id,
            'file_path' => $photoPath,
            'nom' => $request->input('nom'),
            'etiquettes' => $request->input('etiquettes'),
        ]);

        // Rediriger vers la page de l'album avec un message de succès
        return redirect()->route('album.show', ['id' => $album->id])->with('success', 'Photo ajoutée avec succès !');
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