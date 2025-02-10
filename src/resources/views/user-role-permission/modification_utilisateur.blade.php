@extends('layouts.base')
@section('title')
    Modification Utilisateur
@endsection

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y" style="padding-top:2em;padding-bottom:2em">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">PARAMETRE DE COMPTE /</span>
            <span class="text-muted fw-light">LISTE DES UTILISATEURS /</span>
            MISE A JOUR D'UN UTILISATEUR
        </h4>
        <form method="POST" action="{{ route('modifier.roles.permissions.utilisateur.ensemble') }}">
            @csrf
            <div class="row" style="padding-top:1em">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-user-plus fa-2x"></i>
                                    Mise à jour un utilisateur
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label>Nom & Prénoms</label>
                                            <input id="name" class="form-control" type="text" name="name"
                                                value="{{ $user->name }}" required autofocus autocomplete="name"
                                                placeholder="Enter le nom & prénoms" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <div class="input-group">
                                                <input id="email" class="form-control" type="email" name="email"
                                                    value="{{ $user->email }}" required autocomplete="username"
                                                    placeholder="Enter l'email" />
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a style="margin-right:20px" href="{{ route('liste.utilisateurs') }}" type="button"
                                    style="float: right;" class="btn btn-danger">
                                    Liste des Utilisateurs
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-key fa-2x"></i>
                                            Authentification
                                        </h3>
                                    </div>
                                    <form method="POST" action="{{ route('reinitialiser.motdepasse.utilisateur') }}">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <button type="submit" class="btn btn-link" id="resetPasswordBtn">
                                                        Réinitialiser le mot de passe
                                                    </button>
                                                    {{-- <a href="{{ route('reinitialiser.motdepasse.utilisateur') }}" class="btn btn-link" wire:click.prevent="confirmPwdReset">Réinitialiser le mot de passe</a> --}}
                                                    <span>(par défaut: "password")</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="card card-primary">

                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title flex-grow-1">
                                            <i class="fas fa-fingerprint fa-2x "></i>
                                            Rôles & Permissions
                                        </h3>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-check"></i>
                                            Appliquer les modifications
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-body">
                                            <div id="accordion">
                                                @foreach ($rolesAll as $role)
                                                    @php
                                                        $accordionId = 'accordion_' . $role->id;
                                                        $headingId = 'heading_' . $role->id;
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-md mb-4 mb-md-0">
                                                            <div class="accordion mt-3"
                                                                id="accordionExample_{{ $role->id }}"
                                                                style="margin-bottom: 10px">
                                                                <div class="card accordion-item">

                                                                    <div class="accordion-header mt-4 d-flex align-items-center justify-content-between"
                                                                        id="{{ $headingId }}">
                                                                        <h5 class="mb-0">
                                                                            <button type="button"
                                                                                class="accordion-button collapsed"
                                                                                data-bs-toggle="collapse"
                                                                                data-bs-target="#{{ $accordionId }}"
                                                                                aria-expanded="false"
                                                                                aria-controls="{{ $accordionId }}">
                                                                                {{ $role->name }}
                                                                            </button>
                                                                        </h5>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input custom-switch-roles"
                                                                                {{ $role->active ? 'checked' : 'unchecked' }}
                                                                                name="customSwitchRoles[{{ $role->id }}]"
                                                                                id="customSwitchRoles{{ $role->id }}">
                                                                            <label class="custom-control-label"
                                                                                for="customSwitchRoles{{ $role->id }}">{{ $role->active ? 'Activé' : 'Désactivé' }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div id="{{ $accordionId }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="{{ $headingId }}">
                                                                        <div class="accordion-body">
                                                                            <table
                                                                                class="table table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Permissions du Role</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($role->permissions as $permission)
                                                                                        <tr>
                                                                                            <td>{{ $permission->name }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                {{-- @json($rolePermissions["roles"]) --}}
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Permissions Spécifiques</th>
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
                </div>
            </div>
        </form>
    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function() {

            $('.custom-switch-roles').on('click', function() {
                var label = $(this).siblings('label'); // Sélectionne le label associé à ce switch
                if ($(this).is(':checked')) {
                    label.text('Activé');
                } else {
                    label.text('Désactivé');
                }
            });

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
                    @if (session('danger'))
                        Toast.fire({
                            icon: 'danger',
                            title: '{{ session('status') }}'
                        })
                    @endif
                });

                $('.swalDefaultSuccess').ready(function() {
                    @if (session('info'))
                        Toast.fire({
                            icon: 'info',
                            title: '{{ session('status') }}'
                        })
                    @endif
                });
            });

        });


        //GESTION DES MOT DE PASSE
        document.getElementById('resetPasswordBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du formulaire, si nécessaire

            // Afficher le toast de succès
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });

            Toast.fire({
                icon: 'success',
                title: 'Le mot de passe a été réinitialisé avec succès'
            });


            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('reinitialiser.motdepasse.utilisateur') }}";

            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "{{ csrf_token() }}";

            var userIdInput = document.createElement('input');
            userIdInput.type = 'hidden';
            userIdInput.name = 'id';
            userIdInput.value = "{{ $user->id }}"; // Assure-toi de passer l'ID utilisateur ici

            form.appendChild(csrfInput);
            form.appendChild(userIdInput);
            document.body.appendChild(form);

            // Soumettre le formulaire
            form.submit();

            // Rediriger après un délai pour que l'utilisateur voie le toast
            setTimeout(function() {
                window.location.href =
                "{{ route('liste.utilisateurs') }}"; // Redirige vers la liste des utilisateurs
            }, 60000); // Délai de 5 secondes (en ms) pour permettre à l'utilisateur de voir le toast
        });
    </script>
@endpush
