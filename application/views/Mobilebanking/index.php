<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class='card'>
            <div class="card-header">
              <h4 class="card-title">Mobile Banking Request</h4>
              <div class="box-header with-border">
                <?php $this->load->view('includes/flashdata'); ?>
                <a href="<?php echo base_url('mobile-banking-request/new');?>" class="btn btn-success"><i data-feather="plus"></i> Request</a>
              </div>
              <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Branch</th>
                  <th>Name</th>
                  <th>CIF</th>
                  <th>Account No.</th>
                  <th>Request Type</th>
                </tr>
                <?php foreach ($mobile_banking_request as $item){ ?>
                  <tr>
                    <td><?php echo $item['branch_name'];?></td>
                    <td><?php echo $item['name'];?></td>
                    <td><?php echo $item['cif'];?></td>
                    <td><?php echo $item['account_no'];?></td>
                    <td><?php echo $item['request_type'];?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
