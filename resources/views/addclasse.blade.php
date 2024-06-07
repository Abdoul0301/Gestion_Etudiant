@extends('navbar')

@section('content')

    <div class="col-md-8 offset-2 mt-5">
        <div class="card">
            <div class="card-header">
                {{$cc->exists ?"modifier":"ajouter"}} classe
            </div>
            <div class="card-body">
                <form   action="{{route( $cc->exists ? 'classe.update' : 'classe.store',$cc) }}" method="post">
                    @csrf
                    @method($cc->exists ?"put":"post")


                    <label for="">Nom</label>
                    <input type="text" class="form-control @error("libelle") is-invalid @enderror" id="libelle" name="libelle" value="{{$cc->libelle ? $cc->libelle : old('libelle')}}">
                    @error("libelle")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror




                    <br>
                    <div class="modal-footer">
                        <a href="{{ route('classe.index') }}" class="btn btn-secondary" >Fermer</a>
                        <button  type="submit" class="btn btn-primary"  >{{$cc->exists ?"modifier":"ajouter"}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div>

@endsection
