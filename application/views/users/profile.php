<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <h2>Current User Details :</h2>
      <?php $this->load->view('includes/flashdata') ?>
      <div class="col-sm-12">
        <div class='card'>
          <div class="row">
            <div class="col-md-3 border-right">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" height="150px" width="150px" src="<?php echo base_url($user_profile->profile_image); ?>"><span class="font-weight-bold"><?php echo $user_profile->first_name ?></span><span class="text-black-50"><?php echo current_user()->email ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
              <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile</h4>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6"><label class="labels">First Name :</label><input type="text" class="form-control" name="first_name" disabled="true" value="<?php echo set_value('first_name',$user_profile->first_name); ?>"></div>
                  <div class="col-md-6"><label class="labels">Last Name :</label><input type="text" class="form-control" name="last_name" disabled="true" value="<?php echo set_value('last_name',$user_profile->last_name); ?>"></div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" disabled="true" value="<?php echo set_value('email',current_user()->email); ?>"></div>
                  <div class="col-md-6"><label class="labels">Employee Id :</label><input type="text" class="form-control" name="email" disabled="true" value="<?php echo set_value('email',current_user()->employee_id); ?>"></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6"><label class="labels">Mobile Number :</label><input type="text" class="form-control" name="phone_no" disabled="true" value="<?php echo set_value('phone_no',$user_profile->phone_no); ?>"></div>
                  <div class="col-md-6"><label class="labels">Gender :</label><input type="text" class="form-control" name="last_name" disabled="true" value="<?php echo set_value('gender',current_user()->gender ? 'Male' : 'Female') ?>"></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12"><label class="labels">Location :</label><input type="text" class="form-control" name="location" disabled="true" value="<?php echo set_value('location',current_user()->address1.', '.current_user()->city.', '.current_user()->state.', '.current_user()->country); ?>"></div>
                  <div class="col-md-12"><label class="labels">Department :</label><input type="text" class="form-control" name="name" disabled="true" value="<?php echo set_value('name',current_user()->name) ?>"></div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-4 mx-auto d-block pt-2">
                    <?php if($user_profile->id == current_user()->id){ ?>
                      <a href="<?php echo base_url('profile/edit/');?>" class="btn btn-success mx-auto d-block"><i data-feather="edit"></i> Edit</a>
                   <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
</div>

