<div class="col-md-12">
    <div class="card card-primary">

        {{-- <div class="card-header d-flex align-items-center">
            <h3 class="card-title flex-grow-1">AJOUT D'UN UTILISATEUR</h3>
        </div> --}}
        <div class="card-header bg-primary d-flex align-items-center" style="margin-bottom:2em">
            <h3 class="card-title flex-grow-1" style="color:#fff; font-weight: bold">AJOUT D'UN UTILISATEUR</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('creer.utilisateur') }}">
                @csrf
                <div class="panel-body">
                    <div class="row" style="margin-bottom:1em">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">NOM PRENOM</label>
                                <input id="name" class="form-control" type="text" name="name"
                                    value="{{ old('name') }}" autofocus autocomplete="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">E-MAIL</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email') }}" autocomplete="username" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-sm-6 -->
                    </div><!-- row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">MOT DE PASSE</label>
                                <input id="password" class="form-control" type="password" name="password"
                                    autocomplete="new-password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">CONFIRMATION DE MOT DE PASSE</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" autocomplete="new-password" />
                                @error('password_confirmation')
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
