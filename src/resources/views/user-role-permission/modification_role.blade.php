@extends('layouts.base')
@section('title')
    Interface de modification de role
@endsection
@push('styles')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid flex-grow-1 container-p-y" style="padding-top:2em;padding-bottom:2em">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">PARAMETRE DE COMPTE /</span>
        <span class="text-muted fw-light">LISTE DES ROLES /</span>
        MISE A JOUR D'UN ROLE
    </h4>
    <div class="row" style="padding-top:1em">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.flash')
                <div class="row">
                    <form method="POST" action="{{ route('modifier.role.permission') }}">modification.role
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-user-plus fa-2x"></i>
                                            Mise à jour d'un role
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $role->id }}">
                                                <div class="form-group">
                                                    <label>Libelle</label>
                                                    <input id="name" class="form-control" type="text" name="name"
                                                        value="{{ $role->name }}" required autofocus autocomplete="name"
                                                        placeholder="Enter le nom du role" />
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card-footer">
                                                <a style="margin-right:20px" href="{{ route('liste.roles') }}" type="button" style="float:right" class="btn btn-danger">
                                                    Liste des roles
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <!-- <input type="hidden" name="id" id="id" value="{{ $role->id }}"> -->
                                            <div class="card-header d-flex align-items-center">
                                                <h3 class="card-title flex-grow-1">
                                                    <i class="fas fa-fingerprint fa-2x "></i>
                                                    Les permissions du role
                                                </h3>

                                                <div class="card-footer">
                                                    <!-- <button type="submit" class="btn btn-primary" style="float:right">Enregistrer les modifications</button> -->
                                                    <button type="submit" class="btn btn-primary" style="float:right">
                                                        <i class="fas fa-check"></i>
                                                        Appliquer les modifications
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div id="accordion">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Permissions </th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($permissionsAll as $permission)
                                                                <tr>
                                                                    <td>{{ $permission->name }}</td>
                                                                    <td>
                                                                        <div
                                                                            class="custom-control custom-switch  custom-switch-off-danger custom-switch-on-success">

                                                                            <input type="checkbox"
                                                                                class="custom-control-input custom-switch-permissions"
                                                                                {{ $permission->active ? 'checked' : 'unchecked' }}
                                                                                id="customSwitchPermissions{{ $permission->id }}"
                                                                                name="customSwitchPermissions[{{ $permission->id }}]">
                                                                            <label class="custom-control-label"
                                                                                for="customSwitchPermissions{{ $permission->id }}">{{ $permission->active ? 'Activé' : 'Désactivé' }}</label>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end">
                                                        <div class="demo-inline-spacing">
                                                            <!-- Basic Pagination -->
                                                            <nav aria-label="Page navigation">
                                                                <ul class="pagination justify-content-end">
                                                                    {{ $permissionsAll->links('pagination::bootstrap-5') }}
                                                                </ul>
                                                            </nav>
                                                            <!--/ Basic Pagination -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" style="float:right">
                                    <i class="fas fa-check"></i>
                                    Appliquer les modifications
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
@push('scripts')
    <script>
        $(document).ready(function() {

            $('.custom-switch-permissions').on('click', function() {

                var label = $(this).siblings('label'); // Sélectionne le label associé à ce switch

                if ($(this).is(':checked')) {
                    label.text('Activé');
                } else {
                    label.text('Désactivé');
                }
            });

            $(function() {
                $(".select2").select2();

                $(".select2bs4").select2({
                    theme: "bootstrap4",
                });

            });

            //GESTION DES ERREURS
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                });

                $('.swalDefaultWarning').ready(function() {
                    @if (session('warning'))
                        Toast.fire({
                            icon: 'warning',
                            title: '{{ session('warning') }}'
                        })
                    @endif
                });

                $('.swalDefaultSuccess').ready(function() {
                    @if (session('status'))
                        Toast.fire({
                            icon: 'success',
                            title: '{{ session('status') }}'
                        })
                    @endif
                });

                $('.swalDefaultSuccess').ready(function() {
                    @if (session('error'))
                        Toast.fire({
                            icon: 'error',
                            title: '{{ session('error') }}'
                        })
                    @endif
                });

                $('.swalDefaultSuccess').ready(function() {
                    @if (session('info'))
                        Toast.fire({
                            icon: 'info',
                            title: '{{ session('info') }}'
                        })
                    @endif
                });
            });

        });
    </script>
@endpush
