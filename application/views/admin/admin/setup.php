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
                  <h4 class="card-title">Admin Setup</h4> 
                </div><!--end col-->                                                                            
              </div>  <!--end row-->                                  
            </div>
            <div class='card-body'>

              <table class="table table-striped">
                <tr>
                  <th>Key</th>
                  <th>Value</th>
                  <th></th>
                </tr>
            <?php foreach ($setup_entries as $item){ ?>
              <tr>
                <td><?php  echo $item['key'];?></td>
                <td><?php  echo $item['value'];?></td>
                <td>
                  <a href='<?php echo base_url(); ?>' class='btn btn-primary'>Edit</a>
                  <a href='<?php echo base_url(); ?>' class='btn btn-primary'> Remove</a>
                </td>
              </tr>
            <?php } ?>

              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
