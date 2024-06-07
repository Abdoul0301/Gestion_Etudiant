
@extends('navbar')

@section('content')

    <div class="col-md-10 offset-1 mt-5">
        <div class="card">
            <div class="card-header">
                liste des Classes
            </div>
            <div class="card-body mt-2">
                <a class="btn btn-success float-end"  href="{{route('classe.create')}}">Ajouter</a>
                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cc as $c)
                        <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->libelle}}</td>

                            <td>
                                <a class="btn btn-primary" href="{{route('classe.edit',$c)}}" >modifier</a>
                            </td>
                            <td>
                                <form action="{{route('classe.destroy',$c)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$cc->links()}}
            </div>
        </div>

    </div>


@endsection

