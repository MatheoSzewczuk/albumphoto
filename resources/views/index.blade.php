@extends("layout")

@section("contenu")

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher par tag/utilisateur">
    </div>
    <a href="{{route("albums")}}">
    <div class="add-photo">
        <p>Voir albums</p>
    </div>
    <div class="arrow-down">
        <span>&#9660;</span>
    </div>
</div>
</a>
@endsection