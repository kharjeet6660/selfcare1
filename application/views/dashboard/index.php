<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
      <?php $this->load->view('includes/flashdata'); ?>
      <div class="row"><h2>Welcome  Back <?php echo current_user()->first_name; ?></h2>
        <div class="col-sm-12">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">                      
                  <h4 class="card-title">Announcements</h4> 
                </div>                                         
              </div>     
            </div>
            <div class='card-body' style='min-height: 600px;'>
              <marquee direction='up' onmouseover="this.stop();" onmouseout="this.start();" style='min-height: 500px'>
                <div class="page-title-box">                
                  <?php foreach ($announcements as $item){ ?>
                    <div class='alert alert-dismissible  alert-success border-0' role='alert'><?php echo $item['title']?>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                  <?php } ?>
                </div>
              </marquee>
            </div>
          </div>
        </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
