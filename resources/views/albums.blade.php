@extends("layout")

@section("contenu")

<section class="pageAlbums">
    <div class="search-bar">
        <input type="text" placeholder="Rechercher par tag/utilisateur">
    </div>
    <ul>
        @foreach($albums as $album)
            <li>
                <a href="">
                    <div class="album-card">
                        <span class="icon">
                
                        </span>
                        <span class="title">{{$album->titre}}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</section>

@endsection
