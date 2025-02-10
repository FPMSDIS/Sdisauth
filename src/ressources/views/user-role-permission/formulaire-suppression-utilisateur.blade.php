<div class="col-md-12">
    <div class="card card-primary">

        <div class="card-header bg-danger d-flex align-items-center" style="margin-bottom: 2em">
            <h3 class="card-title flex-grow-1" style="color:#fff; font-weight: bold">SUPPRESSION D'UN UTILISATEUR</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('supprimer.utilisateur', $utilisateur->id) }}">
                @csrf
                <div class="panel-body">
                    <div class="row" style="margin-bottom:1em">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">NOM PRENOM</label>
                                <input
                                    id="name" class="form-control" type="text" name="name"
                                    value="{{ $utilisateur->name }}" autofocus autocomplete="name"
                                    readonly
                                />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">E-MAIL</label>
                                <input
                                    id="email" class="form-control" type="email" name="email"
                                    value="{{  $utilisateur->email  }}" autocomplete="email"
                                    readonly
                                 />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-sm-6 -->
                    </div><!-- row -->
                </div>
                <!-- panel-body -->
                <div class="panel-footer" style="padding-top:2em; padding-bottom:2em">
                    <button type="submit" class="btn btn-primary pull-right">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>
