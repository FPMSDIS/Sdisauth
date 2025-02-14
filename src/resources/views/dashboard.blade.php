@extends('layouts.base')

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-4 mb-4">
                <div class="card bg-secondary">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- assets/img/icons/unicons/paypal.png -->
                                <!-- <img style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff"
                                    src="{{asset('lock.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <!-- <i class="fa-solid fa-user rounded" style="font-size: 2em"></i> -->
                                <i style="margin:.75em" class="fa-solid fa-lock"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1"><a href="{{ route('liste.permissions') }}" style="color:#fff;font-weight:bold">NOMBRE DE PERMISSIONS</a>  </span>
                        <h3 class="card-title text-nowrap mb-2">
                            <a href="{{ route('liste.permissions') }}" style="color:#fff;font-weight:bold">{{ $nbreDePermissions }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- <img src="{{asset('user2.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <i style="margin:.75em" class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <span class="fw-semibold fw-semibold d-block mb-1"> <a href="{{ route('liste.roles') }}" style="color:#fff;font-weight:bold">NOMBRE DE ROLES</a>  </span>
                        <h3 class="card-title mb-2">
                            <a href="{{ route('liste.roles') }}" style="color:#fff;font-weight:bold">{{ $nbreDeRoles }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- <img src="{{asset('user.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <i style="margin:.75em" class="fa-solid fa-user text-align"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1"> <a href="{{ route('liste.utilisateurs') }}" style="color:#fff;font-weight:bold">NOMBRE D'UTLISATEURS </a> </span>
                        <h3 class="card-title text-nowrap mb-2">
                            <a href="{{ route('liste.utilisateurs') }}" style="color:#fff;font-weight:bold">{{ $nbreUtilisateur  }}</a>
                        </h3>
                    </div>
                </div>
            </div>

        </div>
        <!--  -->
        <div class="row">
            <div class="col-4 mb-4">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- <img style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff"
                                    src="{{asset('cart.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <i style="margin:.75em" class="fa-solid fa-message"></i>
                            </div>
                        </div>

                        <span class="fw-semibold d-block mb-1" style="color: rgba(0,0,255, .5)">SMS DISPONIBLES</span>
                        <h3 class="card-title text-nowrap mb-2">
                            <a href="#" style="color: #FFF; font-weight: bolder;">{{ number_format($smsDisponible, 0, ',', ' ') }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- assets/img/icons/unicons/cc-primary.png -->
                                <!-- <img  src="{{asset('credit-card.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <i style="margin:.75em" class="fa-solid fa-message"></i>
                            </div>
                        </div>
                        {{-- <span class="fw-semibold d-block mb-1"><a href="#">SMS UTILISES</a></span> --}}
                        <span class="fw-semibold d-block mb-1" style="color: rgba(0,0,255, .5)">SMS UTILISES</span>
                        <h3 class="card-title mb-2">
                            <a href="#" style="color: #FFF; font-weight: bolder;">{{ number_format($nombreSmsUtilise, 0, ',', ' ') }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div style="background-color:rgba(0,0,255, .5); border-radius:50px; color: #fff" class="avatar flex-shrink-0">
                                <!-- <img  src="{{asset('history.png') }}" alt="Credit Card"
                                    class="rounded"
                                /> -->
                                <i style="margin:.65em" class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1"> <a href="#">NOMBRE D'ACHATS</a></span>
                        <h3 class="card-title text-nowrap mb-2">
                            <a href="#" style="color: #FFF; font-weight: bolder;">{{ $nombreAchat }}</a>
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
