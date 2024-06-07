
@extends('navbar')

@section('content')

    <div class="col-md-10 offset-1 mt-5">

        <a class="btn btn-success float-end"  href="{{route('etudiant.create')}}">Ajouter</a>
        <a class="btn btn-light float-end"  href="{{route('etudiantexcel')}}">Excel</a>

        <form action="{{route("search")}}" class="row g-3">
            <div class="col-auto">
                <label for="staticEmail2" class="visually-hidden float-end"></label>
                <input type="text" class="form-control" placeholder="recherche"  id="search" name="search">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-warning">search</button>
            </div>
        </form>

        <br>

        <form action="{{ route('import') }}"  class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <div class="col-auto">
                <button class="btn btn-success">Import excel</button>
            </div>
        </form>


        <br>



        <div class="card">
            <div class="card-header">
                liste des Etudiants
            </div>
            <div class="card-body mt-2">

                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Age</th>
                                <th scope="col">mail</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uu as $u)
                                <tr>
                                    <th scope="row">{{$u->id}}</th>
                                    <td>{{$u->nom}}</td>
                                    <td>{{$u->prenom}}</td>
                                    <td>{{$u->age}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->classe->libelle}}</td>



                                    <td>
                                        <a class="btn btn-primary" href="{{route('etudiant.edit',$u)}}" >Modifier</a>
                                    </td>

                                    <td>
                                        <form action="{{route('etudiant.destroy',$u)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>

                                    <td>
                                        <a class="btn btn-secondary" href="{{route('etudiant.show',$u)}}" >Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                         {{$uu->links()}}


            </div>
        </div>
    </div>




@endsection

