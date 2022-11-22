<div class="left-side-menu">

  <div class="h-100" data-simplebar>
    <!-- User box -->
    <div class="user-box text-center">
      <img src="{{ asset('avatars/default.png')}}" alt="user-img" title="Mat Helme"
      class="rounded-circle avatar-md">
      <div class="dropdown">
        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
        data-bs-toggle="dropdown">{{ getAdminAuth()->email }} </a>
        <div class="dropdown-menu user-pro-dropdown">

         <!-- item-->
         <a href="/admin/profile" class="dropdown-item notify-item">
          <i class="fe-user"></i>
          <span>Mon Profil</span>
        </a>

        <!-- item-->
        <a href="/admin/change-password" class="dropdown-item notify-item">
          <i class="fe-settings"></i>
          <span>Changer de mot de passe</span>
        </a>
        <!-- item-->
        <a href="/admin/logout" class="dropdown-item notify-item">
          <i class="fe-log-out"></i>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <p class="text-muted">
      @if(getAdminAuth()->niveau == 2)
      Super Admin
      @else
      Administrateur
      @endif
    </p>
  </div>

  <!--- Sidemenu -->
  <div id="sidebar-menu">

    <ul id="side-menu">
      <li class="menu-title mt-2">Menu Principal</li>
      <li>
        <a href="/admin/dashboard">
          <i data-feather="airplay"></i>
          <span> Tableau de bord </span>
        </a>
      </li>

      @if(getAdminAuth()->niveau == 2)
      <li>
        <a href="#sidebarAdmin" data-bs-toggle="collapse">
          <i data-feather="users"></i>
          <span> Administrateurs </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarAdmin">
          <ul class="nav-second-level">
            <li>
              <a href="/admin/admins/add">Ajouter un administrateur</a>
            </li>
            <li>
              <a href="/admin/admins">Voir tout</a>
            </li>
          </ul>
        </div>
      </li>
      @endif

      <li>
        <a href="/admin/candidats">
          <i data-feather="users"></i>
          <span>Candidats</span>
        </a>
      </li>

      <li>
        <a href="/admin/entreprises">
          <i data-feather="layers"></i>
          <span>Entreprises</span>
        </a>
      </li>


      <li>
        <a href="/admin/soumissions">
          <i data-feather="layers"></i>
          <span>Soumissions</span>
        </a>
      </li>


      <li class="menu-title mt-2"> Autres</li>

      <li>
        <a href="#sidebarParameters" data-bs-toggle="collapse">
          <i data-feather="grid"></i>
          <span> Paramètres </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarParameters">
          <ul class="nav-second-level">
            <li>
              <a href="/admin/parametres/add">Ajouter</a>
            </li>
            <li>
              <a href="/admin/parametres">Voir tout</a>
            </li>
          </ul>
        </div>
      </li>


      @if(getAdminAuth()->niveau == 2)
      <li>
        <a href="/admin/journaux">
          <i data-feather="gift"></i>
          <span> Journal des Actions </span>
        </a>
      </li>
      @endif

      <li>
        <a href="/admin/logout">
          <i class="fe-log-out"></i>
          <span> Déconnexion </span>
        </a>
      </li>
    </ul>

  </div>
  <!-- End Sidebar -->

  <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>