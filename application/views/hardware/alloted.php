<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">                      
                  <h4 class="card-title">Hardware machine Alloted</h4> 
                </div><!--end col-->                                                                            
              </div>  <!--end row-->                                  
            </div>
            <div class='card-body'>

              <table class="table table-striped">
                <tr>
                  <th>Item.</th>
                  <th>Allotment On</th>
                  <th>Action</th>
                </tr>
                <?php foreach($hardware as $item) { ?>
                  <tr>
                    <td><?php  echo $item['equipement'];?></td>
                    <td><?php echo date("d F Y", strtotime($item['assigned_on'])) ?></td>
                    <td><?php  echo $item['action'];?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
