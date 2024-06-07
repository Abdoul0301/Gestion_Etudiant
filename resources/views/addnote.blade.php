@extends('navbar')

@section('content')

    <div class="col-md-8 offset-2 mt-5">
        <div class="card">
            <div class="card-header">
                {{$pp->exists ?"modifier":"ajouter"}} note
            </div>
            <div class="card-body">
                <form   action="{{route( $pp->exists ? 'note.update' : 'note.store',$pp) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method($pp->exists ?"put":"post")

                    <label for="">Etudiant</label>
                    <select class="form-control" id="etudiant_id @error("etudiant_id") is-invalid @enderror" name="etudiant_id" value="{{$pp->etudiant_id ? $pp->etudiant_id : old('etudiant_id')}}">
                        @error("etudiant_id")
                        <div class = "invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror


                        <option value="">selectionner un etudiant</option>
                        @foreach($uu as $u)
                            <option @selected($pp->etudiant_id == $u->id) value="{{$u->id}}">{{$u->prenom}} {{$u->nom}}</option>
                        @endforeach
                    </select>


                    <label for="">Math</label>
                    <input type="number"   class="form-control @error("math") is-invalid @enderror" id="math" name="math" value="{{$pp->math ? $pp->math : old('math')}}">
                    @error("math")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                    <label for="">Algo</label>
                    <input type="number"   class="form-control @error("algo") is-invalid @enderror" id="algo" name="algo" value="{{$pp->algo ? $pp->algo : old('algo')}}">
                    @error("algo")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror



                    <label for="">Droit</label>
                    <input type="number"   class="form-control @error("droit") is-invalid @enderror" id="droit" name="droit" value="{{$pp->droit ? $pp->droit : old('droit')}}">
                    @error("droit")
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror




                    <br>
                    <div class="modal-footer">
                        <a href="{{ route('note.index') }}" class="btn btn-secondary" >Fermer</a>
                        <button  type="submit" class="btn btn-primary"  >{{$pp->exists ?"modifier":"ajouter"}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div>

@endsection
