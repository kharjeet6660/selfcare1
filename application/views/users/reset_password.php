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
							<?php $this->load->view('includes/flashdata'); ?>
						<?php echo form_open(base_url('password'),'method="POST"'); ?>
							<div class="row p-2">
								<div class="col-sm-12 p-2">
									<div class="form-group p-2">
										<label for="userPassword">Old Password : </label>
										<input name="o_pass" placeholder="Please  enter old password" class="form-control" id="userPassword" type="password">
										<?php echo form_error('o_pass'); ?>
									</div>
								</div>
							</div>  
							<div class="row p-2">
								<div class="col-sm-12 p-2">
									<div class="form-group p-2">
										<label for="userNewPassword">New Password :</label>
										<input name="n_pass" placeholder="Please  enter New password" class="form-control" id="userNewPassword" type="password">
										<?php echo form_error('n_pass'); ?>
									</div>
								</div>
							</div>
							<div class="row p-2">
								<div class="col-sm-12 p-2">
									<div class="form-group p-2">
										<label for="userConPassword">Confirm Password :</label>
										<input name="c_pass" placeholder="Please  re-enter new password" class="form-control" id="userConPassword" type="password">
										<?php echo form_error('c_pass'); ?>
									</div>
								</div>
							</div>
							<div class="row p-2">
								<div class="col-sm-6 p-2">
									<div class="form-group p-2">
										<button type="submit" class="btn btn-primary">Submit</button>
										<a href="<?php echo base_url() ?>" class="btn btn-danger">Cancel</a>
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
