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


                <div class="moins-sign">-</div>
            </div>
        </div>
    </div>
</div>
</a>
<div class="allphoto">
<div class="photos">
@foreach ($album as $photo)
<img class="photo" src="{{$photo -> url}}">
@endforeach
</div>
</div>
@endsection
