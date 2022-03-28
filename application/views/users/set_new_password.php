<?php $this->load->view('includes/head') ?>
<!-- Forget Password Page -->
<div class="card-header text-center text-muted"><h2>Brand Metrics : SelfCare</h2></div>
<div class="container padding-bottom-3x mb-2 mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<?php $Id = $token; ?>
				<?php echo form_open(base_url('reset-password?reset_token='.$token),'method="POST" class="card mt-4" ') ?>
				<h2 class="text-center text-muted">Welcome user!</h2>
					<div class="card-body">
						<div class="form-group"> 
							<label for="npassword">New Password</label> 
							<input required class="form-control" name="npassword" placeholder="Enter new password" type="password" id="npassword" >
						<?php echo form_error('n_pass'); ?>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group"> 
							<label required for="cpassword">Confirm Password</label> 
							<input class="form-control" name="cpassword" placeholder="Enter new password" type="password" id="cpassword" >
						<?php echo form_error('c_pass'); ?>
						</div>
					</div>
					<div class="card-footer"> 
						<button class="btn btn-success" type="submit">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
 <?php $this->load->view('includes/footer') ?>