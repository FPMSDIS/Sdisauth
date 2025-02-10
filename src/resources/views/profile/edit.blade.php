@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil /</span> Information du Profil</h4>
            <div class="row" style="background-color: white">
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                        @include('layouts.flash')
                        <div class="card">
                            <nav aria-label="breadcrumb" class="card-header">
                                <ol class="breadcrumb breadcrumb-style2 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">MODIFICATION DES INFORMATIONS DU PROFIL</a>
                                    </li>
                                    <li class="breadcrumb-item active">PROFIL</li>
                                </ol>
                            </nav>
                            <div class="card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil / </span> Mise à jour du mot de passe</h4>
            <div class="row" style="background-color: white">
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                        @include('layouts.flash')
                        <div class="card">
                            <nav aria-label="breadcrumb" class="card-header">
                                <ol class="breadcrumb breadcrumb-style2 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">MISE A JOUR DU MOT DE PASSE</a>
                                    </li>
                                    <li class="breadcrumb-item active">PROFIL</li>
                                </ol>
                            </nav>
                            <div class="card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-sm-4">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil / </span> Supprimer votre compte</h4>
            <div class="row" style="background-color: white">
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                        @include('layouts.flash')
                        <div class="card">
                            <nav aria-label="breadcrumb" class="card-header">
                                <ol class="breadcrumb breadcrumb-style2 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">MSUPPRESSION DU COMPTE</a>
                                    </li>
                                    <li class="breadcrumb-item active">PROFIL</li>
                                </ol>
                            </nav>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


</div>
@stop
