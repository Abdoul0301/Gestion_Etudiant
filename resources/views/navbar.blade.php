<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>sen School</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand" href="#">Sen School</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{route('etudiant.index')}}">Etudiant </a>
            <a class="nav-item nav-link active" href="{{route('classe.index')}}">Classe </a>
            <a class="nav-item nav-link active" href="{{route('note.index')}}">Note </a>
        </div>


        <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
                {{\Illuminate\Support\Facades\Auth::user()->name}}
                <form action="{{ route('logout') }}" method="post">
                    @method("delete")
                    @csrf
                    <button class="nav-item">Se deconnecter</button>

                </form>
            @endauth

            @guest
                <div class="nav-items">
                    <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                </div>

            @endguest

        </div>


    </div>
</nav>
@yield('content')
