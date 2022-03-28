<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <h2>Assign Hardware to User:</h2>
      <?php $this->load->view('includes/flashdata') ?>
      <div class="row">
        <div class="col-sm-12">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">

              </div>                                  
            </div>
            <div class="card-body">
             <?php echo form_open('admin/hardware/'.$hardware->id.'/assign','method="POST"',); ?>
             <div class="row">
              <div class="row p-2">
                <div class="col-sm-6">
                  <div class="form-group p-2">
                    <label for="users">Select Equipment :</label>
                    <?php echo "(HRD".$hardware->id.") ".$hardware->equipement; ?>
                  </div>
                  <div class="form-group p-2">
                    <label for="users">Assigned to :</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                      <option>Select User</option>
                      <?php 
                      $users = $this->db->get('users')->result_array(); 
                      foreach($users as $item) {
                        echo "
                        <option value='".$item['id']." ' > ".$item['email']." </option>";
                      } 
                      ?>
                    </select>
                    <?php echo form_error('users'); ?>
                  </div>
                  <div class="form-group p-2">
                    <label for="notes">Notes :</label>
                    <input type="text" name="notes"  class="form-control" value="<?php echo set_value('notes');?>" >
                    <?php echo form_error('notes'); ?>
                  </div>
                  <div class="form-group p-2">
                   <button  class="btn btn-primary"><i data-feather="plus"></i> Assign</button>
                   <a href="<?php echo base_url('admin/hardware-assign') ?>" class="btn btn-danger">Cancel</a>
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
