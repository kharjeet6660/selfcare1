<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<h2>Current User Details :</h2>
			<?php $this->load->view('includes/flashdata') ?>
			<div class="col-sm-12">
				<div class='card'>
					<div class="row">
						<div class="col-md-3 border-right">
							<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" height="150px" width="150px" src="<?php echo base_url($user_profile->profile_image); ?>"><span class="font-weight-bold"><?php echo $user->first_name ?></span><span class="text-black-50"><?php echo current_user()->email ?></span><span> </span></div>
						</div>
						<div class="col-md-5 border-right">
							<div class="p-3 py-5">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<h4 class="text-right">Profile</h4>
								</div>
								<?php echo form_open(base_url('profile/'),'method="POST" enctype="multipart/form-data"') ?>
								<div class="row mt-2">
									<div class="col-md-6">
										<label class="labels">First Name</label>
										<input type="text" class="form-control" name="first_name"  value="<?php echo set_value('first_name',$user->first_name); ?>">
									</div>
									<div class="col-md-6">
										<label class="labels">Last Name</label>
										<input type="text" class="form-control" name="last_name"  value="<?php echo set_value('last_name',$user->last_name); ?>"></div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<label class="labels">Mobile Number</label>
											<input type="text" class="form-control" name="phone_no"  value="<?php echo set_value('phone_no',$user->phone_no); ?>">
										</div>
										<div class="col-md-12">
											<label class="labels">Nationality</label>
											<input type="text" class="form-control" name="nationality"  value="<?php echo set_value('nationality',$user->nationality); ?>">
										</div>
										<div class="col-md-12">
											<label class="labels">Location</label>
											<select class="form-control" name="location">
												
												<option value=" ">Select</option>
												<?php foreach($locations as $item){ ?> 
													<option value = "<?php echo $item['id']; ?>"><?php echo $item['address1'].','.$item['state'].','.$item['city'].','.$item['country'].','.$item['postal_code']; ?></option>
												<?php } ?>
												
											</select>
											
										</div>

										<div class="col-md-12">
											<label class="labels">Department</label>
											<select class="form-control" name="department">
												
												<option value=" ">Select</option>
												<?php foreach($departments as $item){ ?> 
													<option value = "<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
												<?php } ?>
												
											</select>
											
										</div>
										<div class="col-md-12">
											<label class="labels">Choose Image</label>
											<input type="file" class="form-control" name="filename" accept=".jpg,.png,.jpeg">
										</div>
										<?php if (isset($upload_error)) {
											echo $upload_error;
										}?>

										<div class="col-md-12 pt-2">
											<button  class="btn btn-primary">Update</button>
											<a href="<?php echo base_url('profile'); ?>" class="btn btn-danger">Cancel</a>
											</a>
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
	</div>
	<?php $this->load->view('includes/footer'); ?>
</div>


