<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

<a href="<?= base_url('c_user'); ?>" class="my-0 mr-md font-weight-normal">LapanganKu Reborn</a>
    
    <h5 class="my-0 mr-md-auto font-weight-normal"></h5>

    <nav class="my-2 my-md-0 mr-md">
        <a class="p-2 text-dark" href="<?= base_url('c_user/tourney');?>">Tourney</a>
        <a class="p-2 text-dark" href="#">Booking</a>
        
    </nav>
        <!-- <a class="btn btn-outline-primary" href="#">Sign up</a> -->

        
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">


      <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']?></span>
            <img class="img-profile rounded-circle" height="50" width="50" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('c_user/profile');?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('c_user/changepassword');?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Edit Password
            </a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="<?= base_url('c_user/histori');?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              History
            </a>
            <div class="dropdown-divider"></div>


            <a class="dropdown-item" href="<?= base_url('c_auth/logout')?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>
      </div>