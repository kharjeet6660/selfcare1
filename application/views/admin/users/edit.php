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
              <div class="row align-items-center"><h4 class="card-title">Edit User Details</h4></div>  <!--end row-->
            </div>
            <div class='card-body'>
              <?php echo form_open(base_url('admin/users/'.$user->id),'method="POST"'); ?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3 row">
                    <label for="example-email-input" class="col-sm-2 col-form-label text-end">Email </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" value="<?php echo $user->email?>" id="example-email-input" name="email" disabled='true'>
                    </div>
                  </div>
                  <div class="form-group mb-3 row">
                    <label for="example-email-input" class="col-sm-2 col-form-label text-end">Employee Id</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" value="<?php echo $user->employee_id?>" id="example-email-input" name="email" disabled='true'>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class=" form-group mb-3 row">
                    <label for="first_name" class="col-sm-2 col-form-label text-end">First Name </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="first_name" value="<?php echo $user_profile->first_name ?>" id="first_name">
                      <?php echo form_error('first_name'); ?>
                    </div>
                  </div>
                  <div class=" form-group mb-3 row">
                    <label for="last_name" class="col-sm-2 col-form-label text-end">Last Name </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="last_name" value="<?php echo $user_profile->last_name ?>" id="last_name">
                      <?php echo form_error('last_name'); ?>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label text-end">Gender </label>
                    <div class="col-sm-10">
                      <select class="form-control form-select" name="gender" aria-label="Default select example">
                        <option value="1" <?php echo ($user->gender==1) ? 'selected' : ''?>>Male</option>
                        <option value="2" <?php echo ($user->gender==2) ? 'selected' : ''?>>Female</option>
                        <option value="3" <?php echo ($user->gender==3) ? 'selected' : ''?>>Others</option>
                      </select>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label text-end" name="role">Set Role </label>
                    <div class="col-sm-10">
                      <select required class="form-select" name="role" >
                        <option value="0" <?php echo ($user->usertype==0) ? 'selected' : ''?>>User</option>
                        <option value="1" <?php echo ($user->usertype==1) ? 'selected' : ''?>>Admin</option>
                      </select>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label text-end" name="role">Location</label>
                    <div class="col-sm-10">
                      <select required class="form-select" name="location" required>
                       <option value=" ">Select</option>
                        <?php foreach($location as $item){ ?> 
                          <option value = "<?php echo $item['id']; ?>"><?php echo $item['address1'].','.$item['state'].','.$item['city'].','.$item['country'].','.$item['postal_code']; ?></option>
                        <?php } ?>
                        
                      </select>
                    </div>
                  </div>
                </div>
              </div>

                    <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label text-end" name="role" >Department</label>
                    <div class="col-sm-10">
                      <select required class="form-select" name="department" required >
                       <option value=" ">Select</option>
                        <option value=" ">Select</option>
                        <?php foreach($department as $item){ ?> 
                          <option value = "<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                        <?php } ?>
                        
                      </select>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="form-group col-sm-12 p-2">
                  <div class="form-group p-2">
                    <button class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-danger">Cancel</a>
                  </div>
                </div>
              </div>  
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>


