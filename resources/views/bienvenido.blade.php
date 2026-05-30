<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bienvenido</title>
</head>
<body>
    <div>
        @auth
    <h2>Bienvenido, {{ auth()->user()->name }}!</h2>

    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" alt="Avatar" width="100">
    @endif

    <p>{{ Auth::user()->email }}</p>

    <p>
        ID usuario: {{ Auth::user()->id }}
    </p>

    <br>

@endauth
    </div>
</body>
</html>

