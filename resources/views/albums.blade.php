@extends("layout")

@section("contenu")

<ul>
    @foreach($albums as $album)
        <li><a href="{{route("albums", ['id' => $album->id])}}">{{$album->titre}}</li>
    @endforeach
</ul>

@endsection