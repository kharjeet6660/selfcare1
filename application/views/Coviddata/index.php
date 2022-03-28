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
              <h4 class="card-title">Covid Data</h4>
              <div class="box-header with-border">
                <?php $this->load->view('includes/flashdata'); ?>
                <a href="<?php echo base_url('covid-data/new');?>" class="btn btn-success"><i data-feather="plus"></i> Add</a>
              </div>
              <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Member Name</th>
                  <th>Relation</th>
                  <th>Date of 1st Dose</th>
                  <th>Date of 2nd Dose</th>
                  <th>Date of 3rd Dose</th>
                </tr>
                <?php foreach ($covid_data as $item){ ?>
                  <tr>
                    <td><?php echo $item['member_name'];?></td>
                    <td><?php echo $item['relation'];?></td>
                    <td><?php echo $item['date_1st_dose'];?></td>
                    <td><?php echo $item['date_2nd_dose'];?></td>
                    <td><?php echo $item['date_3rd_dose'];?></td>
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
