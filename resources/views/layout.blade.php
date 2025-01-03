<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <script src="{{ asset('agrandir.js') }}" defer> </script>

</head>
<body>
    
<nav>
    <a href="/">Home Page</a>
    <a href="{{route("albums")}}">Albums</a>

</nav>

<main>
@yield('contenu')
</main>

</body>

</html>