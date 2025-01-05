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
        $photos = DB::select("SELECT * FROM photos WHERE album_id=?", [$id]);
    
        return view('detail', [
            'photos' => $photos,  
            'albumId' => $id,     
        ]);
    }
    

public function ajouter($id)
    {
        $album = DB::table('albums')->find($id);
    
        if (!$album) {
            abort(404, "Album non trouvé.");
        }
    
        $tags = DB::table('tags')->get();
    
        return view('ajouter', [
            'albumId' => $id,
            'tags' => $tags,
            'album' => $album,
        ]);
    }
    
public function supprimerPhoto($id)
    {
        $photo = Photo::findOrFail($id);
    
        if ($photo->url && Storage::exists(str_replace('/storage', 'public', $photo->url))) {
            Storage::delete(str_replace('/storage', 'public', $photo->url));
        }
    
        $photo->delete();
    
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
    
        $photo = new Photo();
        $photo->titre = $request->input('titre');
        $photo->note = $request->input('note');
        $photo->album_id = $album->id;
        $photo->url = $request->input('url');
        $photo->save();
    
        if ($request->filled('tags')) {
            foreach ($request->input('tags') as $tagId) {
                DB::table('possede_tag')->insert([
                    'photo_id' => $photo->id,
                    'tag_id' => $tagId,
                ]);
            }
        }
    
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