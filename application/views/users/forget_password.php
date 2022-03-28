<?php $this->load->view('includes/head') ?>
<!-- Forget Password Page -->
<div class="card-header text-center"><h2>Brand Metrics : SelfCare</h2></div>
<div class="container padding-bottom-3x mb-2 mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div class="forgot">
					<h2>Forgot your password?</h2>
					<?php $this->load->view('includes/flashdata'); ?>
					<p>Change your password in three easy steps. This will help you to secure your password!</p>
					<ol class="list-unstyled">
						<li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
						<li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
						<li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
					</ol>
				</div>
				<?php echo form_open(base_url('forget-password'),'method="POST" class="card mt-4" ') ?>
				<div class="card-body">
					<div class="form-group"> <label for="email-for-pass">Enter your email address</label> <input class="form-control" name="email" type="email" id="email-for-pass" >
						<?php echo form_error('email'); ?>
						<small class="form-text text-muted">Enter the email address you used during the registration on SelfCare.com. Then we'll email a link to this address.</small> </div>
					</div>
					<div class="card-footer"> <button class="btn btn-success" type="submit">Get New Password</button> <a class="btn btn-danger" type="submit" href="<?php echo base_url('login'); ?>">Back to Login</button> </a>
					</form>
				</div>
			</div>
		</div>
	</body>
 <?php $this->load->view('includes/footer') ?>


