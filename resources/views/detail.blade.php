@extends("layout")

@section("contenu")

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Rechercher par tag/utilisateur">
            </div>
            <div class="suppajt">
            <a href="{{ route('ajouter', ['id' => $albumId]) }}">
                <div class="add-photo">
                <p>Ajouter une photo</a></p>
                <div class="plus-sign">+</div>
            </div>

                <div class="supp-photo">
                @foreach($photos as $photo)
    <div class="photo">
        <h3>{{ $photo->titre }}</h3>
        <img src="{{ $photo->url }}" alt="{{ $photo->titre }}">

        <form action="{{ route('photos.supprimer', $photo->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">Supprimer</button>
        </form>
    </div>
@endforeach

                <div class="moins-sign">-</div>
            </div>
        </div>
    </div>
</div>
</a>
<div class="allphoto">
<div class="photos">
@foreach ($photos as $photo)
<!-- <h3>{{ $photo->titre }}</h3> -->
<img class="photo" src="{{$photo -> url}}">
@endforeach
</div>
</div>
@endsection
