<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header bg-primary d-flex align-items-center">
            <h3 class="card-title flex-grow-1" style="color:#fff; font-weight: bold">AJOUT DE ROLE</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('ajouter.modifier.role') }}">
                @csrf
                <input type="hidden" id="idRole" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input id="role" name="name" type="text" class="form-control"
                                    placeholder="Entrer le role" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
