<aside class="main-sidebar sidebar-white-primary elevation-4">
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('logo.pn') }}" alt="{{ config('app.name') }}" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a> --}}
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset("back/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">User Name connecté</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- @if(auth()->user()->hasRole('admin')) --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-tools"></i>
                        <p>
                            Habilitations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('liste.permissions') }}" class="nav-link">
                                <i class="fas fa-fingerprint nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('liste.roles') }}" class="nav-link">
                                <i class="fas fa-user-shield"></i>
                                <p>Rôles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('liste.utilisateurs') }}" class="nav-link">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>    
                {{-- @endif --}}
            
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                
                
            </ul>
        </nav>
    </div>
</aside>
