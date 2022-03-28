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
							<h2 class="hk-pg-title font-weight-600 mb-10">Generate New Request</h2>
							<?php echo form_open('mobile-banking-request','method="POST"'); ?>
							<div class="row">
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="branch">Select Branch</label>
											<select name="branch_id" id="branch_id" class="form-control" required>
												<option value="">Select</option>
												<?php 
												foreach($branches as $item) {
													echo $data; ?>
													$data = <option value="<?php echo $item['id'] ?>" > <?php echo $item['name'] ?></option>
												<?php } 
												?>
											</select>
										</div>
									</div>  
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="name">Name</label>
											<input type="text" name="name"  class="form-control"value="<?php echo set_value('name');?>">
											<?php echo form_error('name'); ?>
										</div>
									</div>
								</div>
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="cif">CIF</label>
											<input type="Number" name="cif"  class="form-control" value="<?php echo set_value('cif');?>" >
											<?php echo form_error('cif'); ?>
										</div>
									</div>  
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="account_no">Account Number</label>
											<input type="Number" name="account_no" class="form-control" value="<?php echo set_value('account_no');?>">
											<?php echo form_error('account_no'); ?>
										</div>
									</div>
								</div> 
								<div class="row p-2">
									<div class="col-sm-12 p-2">
										<div class="form-group p-2">
											<label for="request_type">Request Type</label>
											<select class="form-control" name="request_type" required>
												<option value="">Select</option>
												<option value="block-account">block-account</option>
												<option value="unblock-account">unblock-account</option>
												<option value="new-issue">new-issue</option>
											</select>
										</div>
									</div>
								</div> 
								<div class="form-group p-2">
									<button  class="btn btn-primary">Create</button>
									<a href="<?php echo base_url('mobile-banking-request') ?>" class="btn btn-danger">Cancel</a>
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

