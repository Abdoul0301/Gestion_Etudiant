
@extends('navbar')

@section('content')

    <div class="col-md-10 offset-1 mt-5">
        <div class="card">
            <div class="card-header">
                liste des Notes
            </div>
            <div class="card-body mt-2">
                <a class="btn btn-success float-end"  href="{{route('note.create')}}">Ajouter</a>


                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">etudiant</th>
                        <th scope="col">math</th>
                        <th scope="col">algo</th>
                        <th scope="col">droit</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pp as $p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td>{{$p->etudiant->prenom}} {{$p->etudiant->nom}}</td>
                            <td>{{$p->math}}</td>
                            <td>{{$p->algo}}</td>
                            <td>{{$p->droit}}</td>


                            <td>
                                <a class="btn btn-primary" href="{{route('note.edit',$p)}}" >modifier</a>
                            </td>

                            <td>
                                <form action="{{route('note.destroy',$p)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$pp->links()}}
            </div>
        </div>

    </div>


@endsection

