<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header bg-danger d-flex align-items-center">
            <h3 class="card-title flex-grow-1" style="color:#fff; font-weight: bold">SUPPRESSION DE ROLE</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('supprimer.role', $role->id) }}">
                <p><h3>Voulez-vous vraiment supprimer la permission <b>{{ $role->name }} ?</b></h3></p>
                @csrf
                <input type="hidden" id="idRole" name="idRole" value="{{ $role->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input id="role" name="name" type="text" class="form-control" placeholder="Permission" value="{{ $role->name }}" readonly>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <a href="{{ route('liste.roles') }}" class="btn btn-secondary" id="btnNo">Non</a>
                                <button type="submit" class="btn btn-danger float-right">OUI</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
