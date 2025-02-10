<div class="leftpanel">

    <div class="logopanel">
        <h1><span>[</span> FPM <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media userlogged">
                <img alt="" src="{{ asset('plugins-bracket/images/photos/loggeduser.png')}}" class="media-object">
                <div class="media-body">
                    <h4>John Doe</h4>
                    <span>"Life is so..."</span>
                </div>
            </div>

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
              <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

      <h5 class="sidebartitle">Menu</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="#"><i class="fa fa-home"></i> <span>Tableau de bord</span></a></li>
        <li class="nav-parent"><a href="#"><i class="fas fa-solid fa-tools"></i> <span>Gestion des droits</span></a>
          <ul class="children">
            <li><a href="{{ route('liste.permissions') }}"><i class="fas fa-fingerprint"></i> sssPermissions</a></li>
            <li><a href="{{ route('liste.roles') }}"><i class="fas fa-user-shield"></i> Rôles </a></li>
            <li><a href="{{ route('liste.utilisateurs') }}"><i class="fas fa-users-cog"></i> Utilisateurs </a></li>

          </ul>
        </li>

      </ul>


    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
