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

    public function storeOrUpload(Request $request, $albumId)
{
    $album = Album::findOrFail($albumId);

    $request->validate([
        'titre' => 'required|string|max:255',
        'note' => 'nullable|integer|min:0|max:5',
        'url' => 'required|url',
        'tags' => 'array|nullable',
        'tags.*' => 'exists:tags,id',
    ]);

    $photo = new Photo();
    $photo->titre = $request->input('titre');
    $photo->note = $request->input('note');
    $photo->album_id = $album->id;
    $photo->url = $request->input('url'); 
    $photo->save();

    if ($request->filled('tags')) {
        $photo->tags()->attach($request->input('tags'));
    }

    if ($request->filled('new_tag')) {
        $newTag = Tag::create(['nom' => $request->input('new_tag')]);
        $photo->tags()->attach($newTag->id);
    }

    return redirect()->route('albums.photos', ['id' => $albumId]);
}
}

?>