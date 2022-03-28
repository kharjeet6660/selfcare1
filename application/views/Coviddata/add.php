<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8">
					<div class='card'>
						<div class='card-body'><div>
							<h2 class="hk-pg-title font-weight-600 mb-10">Generate New Request</h2>
							<?php echo form_open('covid-data','method="POST"'); ?>
							<div class="row">
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="member_name">Member Name</label>
											<input type="text" name="member_name"  class="form-control"value="<?php echo set_value('member_name');?>">
											<?php echo form_error('member_name'); ?>
										</div>
									</div>
									<div class="col-sm-6 p-2"> 
										<div class="form-group p-2"> 
											<label for="relation">Relation</label>
											<select class="form-control" name="relation" required>
												<option value="">Select</option>
												<option value="self">Self</option>
												<option value="father">Father</option>
												<option value="mother">Mother</option>
												<option value="brother">Brother</option>
												<option value="sister">Sister</option>
												<option value="wife">Wife</option>
												<option value="son">Son</option>
												<option value="daughter">Daughter</option>
												<option value="grandfather">Grandfather</option>
												<option value="grandmother">Grandmother</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row p-2">
									<div class="col-sm-4 p-2">
										<div class="form-group p-2">
											<label for="date_1st_dose">Date of 1st Dose</label>
											<input type="date" name="date_1st_dose"  class="form-control" value="<?php echo set_value('date_1st_dose');?>" >
											<?php echo form_error('date_1st_dose'); ?>
										</div>
									</div>  
									<div class="col-sm-4 p-2">
										<div class="form-group p-2">
											<label for="date_2nd_dose"> Date Of 2nd Dose</label>
											<input type="date" name="date_2nd_dose" class="form-control" value="<?php echo set_value('date_2nd_dose');?>">
										</div>
									</div><div class="col-sm-4 p-2">
										<div class="form-group p-2">
											<label for="date_3rd_dose">Date of 3rd Dose</label>
											<input type="date" name="date_3rd_dose" class="form-control" value="<?php echo set_value('date_3rd_dose');?>">
										</div>
									</div>
								</div>
								<div class="form-group p-2">
									<button  class="btn btn-primary ">Submit</button>
									<a href="<?php echo base_url('covid-data') ?>" class="btn btn-danger">Cancel</a>
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

