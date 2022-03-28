<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h2 class='mt-5 md-5'>Welcome Admin.</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-12">
                  <i class="mdi mdi-human-greeting font-36 align-self-center text-dark"></i>
                  <h3 class="text-dark my-0 font-22 fw-bold"><?php echo $user_count;?> Total User(s)</h3>
                  <p class="text-muted mb-0 fw-semibold"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-12">
                  <i class="mdi mdi-warehouse font-36 align-self-center text-dark"></i>
                  <h3 class="text-dark my-0 font-22 fw-bold"><?php echo $department_count;?> Total Departments</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-12">
                  <i class="mdi mdi-pin font-36 align-self-center text-dark"></i>
                  <h3 class="text-dark my-0 font-22 fw-bold"><?php echo $location_count;?> Total Locations</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-12">
                  <i class="mdi mdi-pin font-36 align-self-center text-dark"></i>
                  <h3 class="text-dark my-0 font-22 fw-bold"><?php echo $circular_count;?> Total Circulars</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>