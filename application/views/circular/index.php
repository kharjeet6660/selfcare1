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
              <div class="row align-items-center">
                <div class="col">                      
                  <h4 class="card-title">Circulars</h4>                     
              </div>                                   
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Title</th>
                  <th>Circular No.</th>
                  <th>Department</th>
                  <th>Ref No</th>
                  <th style="width: auto" >Action</th>
                </tr>
                <?php foreach ($circular as $item){ ?>
                  <tr>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['id'].'/'.substr($item['issue_date'],0,4);?></td>
                    <td><?php  echo $item['department'];?></td>
                    <td><?php  echo 'BMF/'.substr($item['issue_date'],0,4).'/'.$item['department'].'/'.$item['id'];?></td>
                    <td>
                      <a href='<?php echo base_url('admin/circular/'.$item['id'].'/display/download'); ?>'> <i class="las la-file-download text-secondary la-2x"></i></a>
                    </td>
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
