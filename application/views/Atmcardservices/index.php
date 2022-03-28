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
              <h4 class="card-title">ATM Card Services</h4>
              <div class="box-header with-border">
                <?php $this->load->view('includes/flashdata'); ?>
                <a href="<?php echo base_url('atmcard-services/new');?>" class="btn btn-success"><i data-feather="plus"></i> Request</a>
              </div>
              <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Branch</th>
                  <th>Full Name</th>
                  <th>CIF</th>
                  <th>Account No.</th>
                  <th>Card No.</th>
                  <th>Request Type</th>
                  <th>Amount Withdrawn</th>
                  <th>Amount Dispensed</th>
                  <th>Date of Transaction</th>
                </tr>
                <?php foreach ($atmcard_services as $item){ ?>
                  <tr>
                    <td><?php echo $item['branch_name'];?></td>
                    <td><?php echo $item['name'];?></td>
                    <td><?php echo $item['cif'];?></td>
                    <td><?php echo $item['account_no'];?></td>
                    <td><?php echo $item['cardno'];?></td>
                    <td><?php echo $item['request_type'];?></td>
                    <td><?php echo $item['amount_withdrawn'];?></td>
                    <td><?php echo $item['amount_dispensed'];?></td>
                    <td><?php echo $item['date_of_trx'];?></td>
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
