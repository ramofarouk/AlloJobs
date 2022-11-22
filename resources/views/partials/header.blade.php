<div class="navbar-custom">
  <div class="container-fluid">
    <ul class="list-unstyled topnav-menu float-end mb-0">

      <li class="dropdown d-none d-lg-inline-block">
        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
          <i class="fe-maximize noti-icon"></i>
        </a>
      </li>

          <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="{{ asset('avatars/default.png')}}" alt="user-image" class="rounded-circle">
              <span class="pro-user-name ms-1">
                {{ getAdminAuth()->email }} <i class="mdi mdi-chevron-down"></i> 
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
              <!-- item-->
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Ravi de vous revoir</h6>
              </div>

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

              <div class="dropdown-divider"></div>

              <!-- item-->
              <a href="/admin/logout" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Logout</span>
              </a>

            </div>
          </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
          <a href="/admin/dashboard" class="logo logo-dark text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm.png')}}" alt="" height="22">
              <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-dark.png')}}" alt="" height="20">
              <!-- <span class="logo-lg-text-light">U</span> -->
            </span>
          </a>

          <a href="/admin/dashboard" class="logo logo-light text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm-light.png')}}" alt="" height="40" width="40">
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-light.png')}}" alt="" height="40" width="140">
            </span>
          </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
          <li>
            <button class="button-menu-mobile waves-effect waves-light">
              <i class="fe-menu"></i>
            </button>
          </li>

          <li>
            <!-- Mobile menu toggle (Horizontal Layout)-->
            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
              <div class="lines">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </a>
            <!-- End mobile menu toggle-->
          </li>   
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
        <!-- end Topbar -->