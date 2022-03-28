<div style='background: #fff'>
  <nav class="navbar-custom nav-sticky" id="navbar-custom">    
    <ul class="list-unstyled topbar-nav float-end mb-0">
      <li class="dropdown">
        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="ti ti-settings"></i></a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="<?php echo base_url('/profile')?>"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
          <div class="dropdown-divider mb-0"></div>
          <a class="dropdown-item" href="<?php echo base_url('/password')?>"><i class="ti ti-key font-16 me-1 align-text-bottom"></i> Update Password</a>
          <div class="dropdown-divider mb-0"></div>
          <a class="dropdown-item" href="<?php echo base_url('/logout')?>"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
        </div>
      </li>
    </ul>

    <ul class="list-unstyled topbar-nav mb-0">                        
      <li>
        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
          <i class="ti ti-menu-2"></i>
        </button>
      </li> 
      <!--li class="hide-phone app-search">
        <form role="search" action="#" method="get">
          <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
          <button type="submit"><i class="ti ti-search"></i></button>
        </form>
      </li-->                       
    </ul>
  </nav>
</div>