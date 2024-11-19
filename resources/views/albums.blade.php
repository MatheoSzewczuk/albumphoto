@extends("layout")

@section("contenu")

<ul>
    @foreach($albums as $album)
        <li><a href="">{{$album->titre}}</li>
    @endforeach
</ul>

@endsection