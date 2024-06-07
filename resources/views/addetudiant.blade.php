@extends('navbar')

@section('content')

    <div class="col-md-8 offset-2 mt-5">
        <div class="card">
            <div class="card-header">
                {{$uu->exists ?"modifier":"ajouter"}} etudiant
            </div>
            <div class="card-body">
                <form   action="{{route( $uu->exists ? 'etudiant.update' : 'etudiant.store',$uu) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method($uu->exists ?"put":"post")


                    <label for="">Photo</label>
                    <input type="file"   class="form-control @error("image") is-invalid @enderror" id="image" name="image" value="{{$uu->image}}">
                    @error("image")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <img src="{{ $uu->image ? asset('storage/images/'.$uu->image) : asset('storage/images/photo.jpg') }}" class="img-fluid img-thumbnail" width="100"> <br>



                    <label for="">Nom</label>
                    <input type="text" class="form-control @error("nom") is-invalid @enderror" id="nom" name="nom" value="{{$uu->nom ? $uu->nom : old('nom')}}">
                    @error("nom")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                    <label for="">Prenom</label>
                    <input type="text" class="form-control @error("prenom") is-invalid @enderror" id="prenom" name="prenom" value="{{$uu->prenom ? $uu->prenom : old('prenom')}}">
                    @error("prenom")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror




                    <label for="">Age</label>
                    <input type="number"   class="form-control @error("age") is-invalid @enderror" id="age" name="age" value="{{$uu->age ? $uu->age : old('age')}}">
                    @error("age")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                    <label for="">email</label>
                    <input type="email"   class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{$uu->email ? $uu->email : old('email')}}">
                    @error("email")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                    <label for="">classe</label>
                    <select class="form-control" id="classe_id @error("classe_id") is-invalid @enderror" name="classe_id" value="{{$uu->classe_id ? $uu->classe_id : old('classe_id')}}">
                        @error("classe_id")
                        <div class = "invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror


                        <option value="">selectionner une classe</option>
                        @foreach($cc as $c)
                            <option @selected($uu->classe_id == $c->id) value="{{$c->id}}">{{$c->libelle}}</option>
                        @endforeach
                    </select>





                    <br>
                    <div class="modal-footer">
                        <a href="{{ route('etudiant.index') }}" class="btn btn-secondary" >Fermer</a>
                        <button  type="submit" class="btn btn-primary"  >{{$uu->exists ?"modifier":"ajouter"}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div>

@endsection
