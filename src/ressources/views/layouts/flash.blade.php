@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" style="color:#fff">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Veuillez vérifier le formulaire ci-dessous pour les erreurs.</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div id="error-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Veuillez vérifier le formulaire ci-dessous pour les erreurs.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@if(Session::has('success_message'))
    <div class="alert alert-success" id="successMessage">
        {{ Session::get('success_message') }}
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif

{{-- @if(Session::has('danger'))
    <script>
         toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
         }
        toastr.success("{{ Session::get('message') }}", "Succès !", timeOut: 12000);
        toastr.info("{{ Session::get('message') }}", timeOut: 12000);
        toastr.danger("{{ Session::get('message') }}", "Erreur !", timeOut: 12000);
        toastr.warning("{{ Session::get('message') }}", "Attention !", timeOut: 12000);
    </script>
@endif --}}
