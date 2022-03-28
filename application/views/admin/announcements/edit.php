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
            	<h4 class="card-title">Update Annoncement Details</h4>                        
            </div>
            <div class='card-body'>

              <?php echo form_open('admin/announcements/'.$announcements['id'],'method="POST"') ?>
				<div class="row">
					<div class="row p-2">
						<div class="col-sm-6 p-2">
							<div class="form-group p-2">
								<label for="">Start Date</label>
								<input type="date" name="startdate"  class="form-control" value="<?php echo set_value('startdate',$announcements['start_date']);?>" >
								<?php echo form_error('startdate'); ?>
							</div>
						</div>  
						<div class="col-sm-6 p-2">
							<div class="form-group p-2">
								<label for="">End Date</label>
								<input type="date" name="enddate" class="form-control" value="<?php echo set_value('enddate',$announcements['end_date']);?>">
								<?php echo form_error('enddate'); ?>
							</div>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-sm-6 p-2">
							<div class="form-group p-2">
								<label for="">title</label>
								<input type="text" name="title"  class="form-control" value="<?php echo set_value('title',$announcements['title']);?>">
								<?php echo form_error('title'); ?>
							</div>
						</div>
						<div class="col-sm-6 p-2">
							<div class="form-group p-2">
								<label for="">Description</label>
								<input type="text" name="description" class="form-control" value="<?php echo set_value('description',$announcements['description']);?>">
								<?php echo form_error('description'); ?>
							</div>
						</div>
					</div>  
					<div class="form-group p-2">
						<button  class="btn btn-primary">Update</button>
						<a href="<?php echo base_url('admin/announcements'); ?>" class="btn btn-danger">Cancel</a>
					</div>
				</div>          
			</form>
            </div>
          </div>
        </div>
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>


