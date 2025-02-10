@extends('layouts.base')
@section('title')
    Gestion des Utilisateurs
@endsection
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y" style="padding-top:2em;padding-bottom:2em">
        <div class="row">
            <div class="col-sm-3"></div>
            @can('ajouter_utilisateur')
                <div class="row col-sm-3">
                    <a href="#" id="ajouter_utilisateur" type="button" class="btn btn-primary btnAdd" data-bs-toggle="modal"
                        data-bs-target="#edit_permission">
                        AJOUTER UN UTILISATEUR
                    </a>
                </div>
            @endcan
            <div class="col-sm-5"></div>
        </div>
        <br/>
        @can('lister_utilisateur')
            <div class="row">
                @include('layouts.flash')
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="table-responsive">
                            @include('layouts.flash')
                            <div class="card">
                                <nav aria-label="breadcrumb" class="card-header">
                                    <ol class="breadcrumb breadcrumb-style2 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">ACCUEIL</a>
                                        </li>
                                        <li class="breadcrumb-item active">LISTE DES UTILISATEURS</li>
                                    </ol>
                                </nav>
                                <div class="table-responsive text-nowrap">
                                    @if (isset($listUsers) && !empty($listUsers))
                                        <table id="liste_permission" class="table table-hover">
                                            <thead>
                                                <tr class="active">
                                                    <th>NOM & PRENOMS</th>
                                                    <th>EMAIL</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @php $i=1; @endphp
                                                @foreach ($listUsers as $user)
                                                    <tr class="table-default">
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @can("modifier_utilisateur")
                                                                <a class="btn btn-primary btn-sm modification-utilisateur" href="{{ route('modification.utilisateur', $user->id) }}" id="{{ $user->id }}">
                                                                    <i class="fa-solid fa-pencil fa-fw"></i>
                                                                </a>
                                                            @endcan
                                                            @can("supprimer_utilisateur")
                                                                <a class="btn btn-danger btn-sm suppression-utilisateur" href="#" id="{{ $user->id }}">
                                                                    <i class="fa-solid fa-trash fa-fw"></i>
                                                                </a>
                                                            @endcan
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>Aucune information sur le solde disponible.</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col text-end">
                                        <div class="demo-inline-spacing">
                                            <!-- Basic Pagination -->
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end">
                                                    {{ $listUsers->links('pagination::bootstrap-5') }}
                                                </ul>
                                            </nav>
                                            <!--/ Basic Pagination -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="row" id="traitement-utilisateur">

                        </div>

                    </div>
                </div>

            </div>
        @endcan
    </div>


@stop
@push('scripts')
    <script>
        $(document).ready(function() {
            //GESTION DES ERREURS

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
                            title: '{{ session('warning') }}',
                            timer: 10000
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
                            title: "{{ session('error') }}",
                            timer: 10000
                        })
                    @endif
                });

                $('.swalDefaultSuccess').ready(function() {
                    @if (session('info'))
                        Toast.fire({
                            icon: 'info',
                            title: "{{ session('info') }}",
                            timer: 10000
                        })
                    @endif
                });




            $(document).on('click', '.btnEdit', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                // var guard = $(this).data('guard');

                $('#idUtilisateur').val(id);
                $('#permission').val(name);
                $('#guard').val(guard);

                $('#edit_permission').modal('show');
            });



            $('.btnAdd').on('click', function() {
                $('#idUtilisateur').val('');
                $('#permission').val('');
                $('#titre_modal').html('Ajouter un Role');
            });

            $("#ajouter_utilisateur").on("click", function(){
                $("#traitement-utilisateur").load("{{ route('vue.creation.utilisateur')}}");
            });

            $(".modification-role").on("click", function(){
                let idUtilisateur = $(this).attr('id');
                let url = "{{route( 'modification.role',[':idUtilisateur'])}}";
                url = url.replace(':idUtilisateur', idUtilisateur);
                $("#traitement-utilisateur").load(url);
            });

            $(".suppression-utilisateur").on("click", function(){
                let idUtilisateur = $(this).attr('id');
                let url = "{{route( 'vue.suppression.utilisateur',[':idUtilisateur'])}}";
                url = url.replace(':idUtilisateur', idUtilisateur);
                $("#traitement-utilisateur").load(url);
            });


        });
    </script>
@endpush
