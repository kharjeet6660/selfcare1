<ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
  <?php
if (current_user()->usertype == 1) {?>
  <li class="nav-item">
    <a href='<?php echo base_url('admin'); ?>' class="nav-link" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-settings menu-icon"></i>
      <span>Admin Panel</span>
    </a>
  </li>
  <hr>
<?php }
   ?>
  <li class="nav-item">
    <a href='<?php echo base_url(); ?>' class="nav-link" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-warehouse menu-icon"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a href='<?php echo base_url('circular'); ?>' class="nav-link" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-note-multiple menu-icon"></i>
      <span>Circulars</span>
    </a>
  </li>
  <li class="nav-item">
    <a href='<?php echo base_url('hardware/alloted'); ?>' class="nav-link" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-laptop-chromebook menu-icon"></i>
      <span>Hardware Assigned</span>
    </a>
  </li>

  <li class="nav-item">
    <a href='<?php echo base_url('forms'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-bitbucket menu-icon"></i>
      <span>Download Forms</span>
    </a>
  </li>
  <li class="nav-item">
    <a href='<?php echo base_url('hr-policy'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-account-search menu-icon"></i>
      <span>HR Policy</span>
    </a>
  </li>

  <li class="nav-item">
    <a  href='<?php echo base_url('directory'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-account-settings menu-icon"></i>
      <span>Directory</span>
    </a>
  </li>
  <li class="nav-item">
    <a  href='<?php echo base_url('payslips'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-file-document menu-icon"></i>
      <span>Payslips</span>
    </a>
  </li>
  <li class="nav-item">
    <a  href='<?php echo base_url('atmcard-services'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-cash-100 menu-icon"></i>
      <span>ATM Cash Request</span>
    </a>
  </li>
  <li class="nav-item">
    <a  href='<?php echo base_url('internet-banking-request'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-bank menu-icon"></i>
      <span>Internet Banking Request</span>
    </a>
  </li>
  <li class="nav-item">
    <a  href='<?php echo base_url('mobile-banking-request'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-bank menu-icon"></i>
      <span>Mobile Banking Request</span>
    </a>
  </li>
  <li class="nav-item">
    <a  href='<?php echo base_url('covid-data'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-hexagon-multiple menu-icon"></i>
      <span>Covid Data</span>
    </a>
  </li>
  <!--li class="nav-item">
    <a  href='<?php echo base_url('timeoff'); ?>' class="nav-link" href="#sidebarAnalytics" role="button"
      aria-expanded="false" aria-controls="sidebarAnalytics">
      <i class="mdi mdi-beach menu-icon"></i>
      <span>TimeOff</span>
    </a>
  </li-->
</ul>
