<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" type="text/css" href="{{env("APP_URL")}}/css/app.css">

</head>
<body>
    
<nav>
    <a href="/">Home Page</a>
    <a href="{{route("Album")}}">Albums</a>
    <a href="{{route("mesAlbums")}}">Mes Albums</a>

</nav>

<main>
@yield('contenu')
</main>

</body>

</html>