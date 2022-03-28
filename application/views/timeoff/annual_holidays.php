
<?php $this->load->view('includes/head'); ?>
<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">
  <?php $this->load->view('includes/top-navbar'); ?>
  <?php $this->load->view('includes/sidebar'); ?>
  <!-- Main Content -->
  <div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
      <!-- Title -->
      <div class="hk-pg-header align-items-top">
        <div>
          <h2 class="hk-pg-title font-weight-600 mb-10">Annual Holidays:</h2>
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <tr>
              <th>Date</th>
              <th>Day</th>
              <th>Reason</th>
            </tr>
            <?php foreach ($holidays as $item){ ?>
              <tr>
                <td><?php echo date('d/m/Y', strtotime($item['actual_date']));?></td>
                <td><?php echo date('l', strtotime($item['actual_date']));?></td>
                <td><?php echo $item['reason'];?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <!-- /Title -->
    </div>
    <!-- /Container -->
  </div>
  <!-- /Main Content -->

  <?php $this->load->view('includes/footer'); ?>