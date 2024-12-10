@extends("layout")

@section("contenu")
<a href="{{route("albums")}}">
<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher par tag/utilisateur">
    </div>
    <div class="add-photo">
        <p>Dernier album</p>
    </div>
    <div class="arrow-down">
        <span>&#9660;</span>
    </div>
</div>
</a>
@endsection