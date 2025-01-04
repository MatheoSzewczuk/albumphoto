@extends("layout")

@section("contenu")

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Rechercher par tag/utilisateur">
            </div>
            <div class="suppajt">
            <a href="">
                <div class="add-photo">
                <p>Ajouter une photo</a></p>
                <div class="plus-sign">+</div>
            </div>
                <a href="">
                <div class="supp-photo">
                <p>Supprimer une photo</a></p>
                <div class="moins-sign">-</div>
            </div>
        </div>
    </div>
</div>
</a>
@foreach ($album as $photo)
<img class="photo" src="{{$photo -> url}}">
@endforeach

@endsection
