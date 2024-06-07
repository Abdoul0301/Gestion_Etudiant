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


<div class="col-md-10 offset-1 mt-5">
    <h1>Se Connecter</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('login') }}" method="post" class="vstack gap-3">

                @csrf


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ old('email')}}">
                    @error("email")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" >
                    @error("password")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary"> Se connecter</button>

            </form>

        </div>

    </div>

</div>







</body>
</html>
