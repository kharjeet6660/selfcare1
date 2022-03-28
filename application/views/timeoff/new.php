<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">                      
                  <h4 class="card-title">Request New Timeoff</h4>
                </div>
              </div>
            </div>
            <div class='card-body'>
              <?php echo form_open('timeoff', ['id' => 'frmTimeoff']); ?>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-6 p-2">
                    <div class="form-group p-2">
                      <label for="">Start Date</label>
                      <input type="date" class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>">
                      <?php echo form_error('start_date'); ?>
                    </div>
                  </div>  
                  <div class="col-sm-6 p-2">
                    <div class="form-group p-2">
                      <label for="">Start Date</label>
                      <input type="date" class="form-control" name="end_date" value="<?php echo set_value('end_date'); ?>">
                      <?php echo form_error('end_date'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">TimeOff Policy</label>
                  <select class="form-control custom-select" name='policy_id'>
                    <option selected="">Select</option>
                    <?php foreach ($policies as $policy): ?>
                      <option value=<?php echo $policy['id']?>><?php echo $policy['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                    </div>
                  </div>  
                </div>
              </div>

              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <label for="">Reason for Timeoff</label>
                      <textarea class="form-control" rows="4" placeholder="Textarea" name='reason'><?php echo set_value('reason'); ?></textarea>
                      <?php echo form_error('reason'); ?>
                    </div>
                  </div>  
                </div>
              </div>

              <div class="row">
                <div class="row p-2">
                  <div class="col-sm-12 p-2">
                    <div class="form-group p-2">
                      <button  class="btn btn-primary">Apply Timeoff</button>
                      <a href="<?php echo base_url('timeoff') ?>" class="btn btn-danger">Cancel</a>
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