<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">User Directory </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($bankdirectory as $item) { if (empty($item['micr'])) { ?>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body p-0">
                <div class="media p-3  align-items-center">     
                  <div class="media-body ms-3 align-self-center">
                    <h5 class="m-0"><?php  echo $item['particulars']?> <span class="badge badge-warning font-10">New</span></h5>
                    <p class="mb-0 text-muted"><?php echo $item['position'] ;?>, <?php echo $item['contactno']?>, </p>
                    <p class="mb-0 text-muted"><?php echo $item['email'];?></p>
                  </div>
                  <div class="action-btn">
                    <?php if(isset($is_admin_view)) { ?>
                    <a href="<?php echo base_url('admin/directory/'.$item['id'].'/edit')?>"><i class="las la-pen text-secondary font-16"></i></a>
                    <a href="<?php echo base_url('admin/directory/'.$item['id'].'/delete')?>"><i class="las la-trash-alt text-secondary font-16"></i></a> 
                    <?php } ?>
                  </div>
                </div>                                    
              </div>
	        </div>
          </div>
        <?php } }?>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                  <div class="dataTable-container">
                    <table class="table dataTable-table" id="datatable_1">
                      <thead class="thead-light">
                        <tr>
                          <th data-sortable="" class="desc"><a href="#" class="dataTable-sorter">UserName</a></th>
                          <th data-sortable=""><a href="#" class="dataTable-sorter">Branch</a></th>
                          <th>Position</th>
                          <th>email</th>
                          <th>Other Details</th>
                          <?php if(isset($is_admin_view)) { ?><th>Actions</th><?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($bankdirectory as $item){ if($item['micr']) { ?>
                          <tr>
                            <td><?php  echo $item['particulars'];?></td>
                            <td><?php  echo $item['brand_id'];?></td>
                            <td><?php  echo $item['position'];?></td>
                            <td><?php  echo $item['email'];?></td>
                            <td>
                              <?php  echo 'IFSC:'.$item['ifsc'];?><br />
                              <?php  echo 'MICR:'.$item['micr'];?><br />
                              <?php  echo 'TAN:'.$item['tan'];?><br />
                            </td>
                              <?php if(isset($is_admin_view)) { ?>
                            <td>
                              <a href="<?php echo base_url('admin/directory/'.$item['id'].'/edit')?>"><i class="las la-pen text-secondary font-16"></i></a>
                              <a href="<?php echo base_url('admin/directory/'.$item['id'].'/delete')?>"><i class="las la-trash-alt text-secondary font-16"></i></a> 
                            </td>
                              <?php } ?>
                          </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
