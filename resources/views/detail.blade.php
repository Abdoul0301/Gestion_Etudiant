@extends('navbar')

@section('content')

<div class="col-md-10 offset-1 mt-5">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    @if($uu->image)
                        <img src="{{ asset('storage/images/'.$uu->image) }}" style="height: 200px;width:175px;">
                    @else
                        <img src="{{ asset('storage/images/photo.jpg') }}" style="height: 200px;width:175px;">
                    @endif

                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">


                            <h4 class="card-title">Profile Details</h4>

                            <div class="row">
                                <h5 class="col-lg-3 col-md-4 label ">Prénom</h5>
                                <div class="col-lg-9 col-md-8">{{$uu->prenom}}</div>
                            </div>

                            <div class="row">
                                <h5 class="col-lg-3 col-md-4 label">Nom</h5>
                                <div class="col-lg-9 col-md-8">{{$uu->nom}}</div>
                            </div>

                            <div class="row">
                                <h5 class="col-lg-3 col-md-4 label">Age</h5>
                                <div class="col-lg-9 col-md-8">{{$uu->age}}</div>
                            </div>

                            <div class="row">
                                <h5 class="col-lg-3 col-md-4 label">mail</h5>
                                <div class="col-lg-9 col-md-8">{{$uu->email}}</div>
                            </div>

                            <div class="row">
                                <h5 class="col-lg-3 col-md-4 label">classe</h5>
                                <div class="col-lg-9 col-md-8">{{$uu->classe->libelle}}</div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
