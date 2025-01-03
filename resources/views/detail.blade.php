@extends("layout")

@section("contenu")

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Rechercher par tag/utilisateur">
            </div>
            <a href="">
                <div class="add-photo">
                <p>Ajouter une photo</a></p>
                <div class="plus-sign">+</div>
                <a href="">
            </div>
                <div class="supp-photo">
                <p>Supprimer une photo</a></p>
                <div class="moins-sign">-</div>
            </div>
        </div>
    </div>
</a>
@foreach ($album as $photo)
<img src="{{$photo -> url}}">
@endforeach
@endsection
