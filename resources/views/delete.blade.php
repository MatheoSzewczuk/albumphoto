@foreach ($album->photos as $photo)
    <div class="photo">
        <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->name }}">
        
        <!-- Formulaire de suppression -->
        <form action="{{ route('photos.destroy', ['albumId' => $album->id, 'photoId' => $photo->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">Supprimer</button>
        </form>
    </div>
@endforeach