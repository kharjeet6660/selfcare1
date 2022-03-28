<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class='card'>
            <div class='card-body'>
              <?php echo form_open('admin/users','method="POST"'); ?>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-6 p-2">
                    <div class="form-group p-2">
                      <label for="">First Name</label>
                      <input type="text" name="first_name"  class="form-control" value="<?php echo set_value('first_name');?>" >
                      <?php echo form_error('first_name'); ?>
                    </div>
                  </div>  
                  <div class="col-sm-6 p-2">
                    <div class="form-group p-2">
                      <label for="">Last Name</label>
                      <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name');?>">
                      <?php echo form_error('last_name'); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">Email</label>
                      <input type="email" name="email"  class="form-control" value="<?php echo set_value('email');?>" >
                      <?php echo form_error('email'); ?>
                    </div>
                  </div> 
                </div>
              </div>

              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control" value="<?php echo set_value('password');?>">
                      <?php echo form_error('password'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">Gender</label>
                      <select required class="form-select" name="gender" >
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Others</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">Employee Id</label>
                      <input type="text" name="emp_id" class="form-control" value="<?php echo set_value('emp_id');?>">
                      <?php echo form_error('emp_id'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="role">Set Role</label>
                      <select required class="form-select" name="role" >
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group p-2">
                <label for="users">Select Location</label>
                <select form-select name="location" id="location" class="form-control" required>
                  <option>Select Location</option>
                  <?php
                  foreach($location as $item) {
                    echo "
                    <option value='".$item['id']." ' > ".$item['city'].$item['state']." </option>";
                  } 
                  ?>
                </select>
                <?php echo form_error('location'); ?>
              </div>

              <div class="form-group p-2">
                    <label for="users">Department</label>
                    <select name="department" id="department" class="form-control" required>
                      <option>Select Department</option>
                      <?php 
                      
                      foreach($departments as $item) {
                        echo "
                        <option value='".$item['id']." ' > ".$item['name']." </option>";
                      } 
                      ?>
                    </select>
                    <?php echo form_error('department'); ?>
                  </div>

              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-6 p-2">

                    <div class="form-group p-2">
                      <button  class="btn btn-primary">Create</button>
                      <a href="<?php echo base_url('admin/users') ?>" class="btn btn-danger">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
</div>
