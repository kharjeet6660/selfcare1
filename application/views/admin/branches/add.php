<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class='card'>
						<div class='card-body'><div>
							<h2 class="hk-pg-title font-weight-600 mb-10">Create Branch</h2>
							<?php echo form_open('admin/branches','method="POST"'); ?>
							<div class="row">
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="name">Name</label>
											<input type="text" name="name"  class="form-control" value="<?php echo set_value('name');?>" >
											<?php echo form_error('name'); ?>
										</div>
									</div>  
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="">RO</label>
											<input type="text" name="ro" class="form-control" value="<?php echo set_value('ro');?>">
											<?php echo form_error('ro'); ?>
										</div>
									</div>
								</div>
								<div class="form-group p-2">
									<button  class="btn btn-primary">Create</button>
									<a href="<?php echo base_url('admin/branches') ?>" class="btn btn-danger">Cancel</a>
								</div>
							</div>          
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>
</div>
