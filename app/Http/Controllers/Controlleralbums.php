<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;


class Controlleralbums extends Controller
{
    function index(){
        return view("index");
    }

    public function albums(){
            $albums = DB::select("SELECT * FROM albums");
            return view('albums', ['albums' =>$albums]);
    }

    
    public function detail($id)
    {
        // Récupérer les photos liées à l'album
        $photos = DB::select("SELECT * FROM photos WHERE album_id=?", [$id]);
    
        return view('detail', [
            'photos' => $photos,  // Transmettre les photos à la vue
            'albumId' => $id,     // Transmettre l'ID de l'album à la vue
        ]);
    }
    

    public function ajouter($id)
    {
        // Récupérer l'album correspondant
        $album = DB::table('albums')->find($id);
    
        // Vérifier si l'album existe
        if (!$album) {
            abort(404, "Album non trouvé.");
        }
    
        // Récupérer tous les tags disponibles
        $tags = DB::table('tags')->get();
    
        // Passer l'album et les tags à la vue
        return view('ajouter', [
            'albumId' => $id,
            'tags' => $tags,
            'album' => $album,
        ]);
    }
    
    public function supprimerPhoto($id)
    {
        // Récupérer la photo par son ID
        $photo = Photo::findOrFail($id);
    
        // Supprimer le fichier si la photo est stockée localement
        if ($photo->url && Storage::exists(str_replace('/storage', 'public', $photo->url))) {
            Storage::delete(str_replace('/storage', 'public', $photo->url));
        }
    
        // Supprimer la photo de la base de données
        $photo->delete();
    
        // Rediriger avec un message de succès
        return back()->with('success', 'Photo supprimée avec succès.');
    }
    
    public function storeOrUpload(Request $request, $albumId)
    {
        $album = DB::table('albums')->where('id', $albumId)->first();
    
        $request->validate([
            'titre' => 'required|string|max:255',
            'note' => 'nullable|integer|min:0|max:5',
            'url' => 'required|url',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
        ]);
    
        // Créer une nouvelle photo
        $photo = new Photo();
        $photo->titre = $request->input('titre');
        $photo->note = $request->input('note');
        $photo->album_id = $album->id;
        $photo->url = $request->input('url');
        $photo->save();
    
        // Si des tags sont sélectionnés, on les associe à la photo
        if ($request->filled('tags')) {
            foreach ($request->input('tags') as $tagId) {
                DB::table('possede_tag')->insert([
                    'photo_id' => $photo->id,
                    'tag_id' => $tagId,
                ]);
            }
        }
    
        // Si un nouveau tag est ajouté
        if ($request->filled('new_tag')) {
            $newTag = DB::table('tags')->insertGetId(['nom' => $request->input('new_tag')]);
            DB::table('possede_tag')->insert([
                'photo_id' => $photo->id,
                'tag_id' => $newTag,
            ]);
        }
    
        return redirect()->route('albums.photos', ['id' => $albumId]);
    }
    
}

?>