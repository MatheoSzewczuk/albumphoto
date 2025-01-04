@extends("layout")

@section("contenu")

<h3>Ajouter une photo</h3>
    <div>
        <form action="{{ route('photos.storeOrUpload', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>

            <label for="note">Note :</label>
            <input type="number" id="note" name="note" min="0" max="5">

            <p>Étiquettes existantes :
                @foreach($tags as $tag)
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        {{ $tag->nom }}
                    </label>
                @endforeach
            </p>

            <p>Créer une nouvelle étiquette :
                <input type="text" name="new_tag" placeholder="Nom de la nouvelle étiquette">
            </p>

            <p>Source de la photo :
                <label for="url">URL :</label>
                <input type="url" id="url" name="url">
            </p>
            <button type="submit">Ajouter</button>
        </form>
    </div>
    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    @endsection