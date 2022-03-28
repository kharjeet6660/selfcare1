<div class="left-sidebar">
  <!-- LOGO -->
  <div class="brand">
    <a href="<?php echo base_url()?>" class="logo">
      <span>
        <img src="<?php  echo base_url('asset/images/logo.png'); ?>" alt="logo-large" class="logo-lg logo-light">
        <img src="<?php  echo base_url('asset/images/logo.png'); ?>" alt="logo-large" class="logo-lg logo-dark">
      </span>
    </a>
  </div>
  <div class="sidebar-user-pro media border-end">          
    <div class="position-relative mx-auto">
      <?php
      $this->db->where('id',current_user()->id);
       $user_profile = $this->db->get('user_profiles')->result_array(); ?>
      <img src="<?php echo base_url($user_profile[0]['profile_image']); ?>"  class="rounded-circle thumb-sm">
      <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
    </div>
    <div class="media-body ms-2 user-detail align-self-center">
      <h5 class='font-14 m-0 fw-bold'><?php echo current_user()->first_name." ".current_user()->last_name ?></h5>  
      <p class='opacity-50 mb-0'>Emp ID. <?php echo current_user()->employee_id; ?></p>
    </div>          
  </div>

  <!--end logo-->
  <div class="menu-content h-100" data-simplebar>
    <div class="menu-body navbar-vertical">
      <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
        <!-- Navigation -->
        <?php
        $sidebar = strpos(current_url(), 'admin') ? 'includes/_admin_sidebar' : 'includes/_user_sidebar';
        $this->load->view($sidebar);
        ?>
      </div>

    </div>
  </div>  
</div>
