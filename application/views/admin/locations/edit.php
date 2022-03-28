<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h2 class='mt-5 md-5'></h2>
				</div>
				<div class="col-sm-12">
					<div class='card'>
						<div class="card-header">
							<div class="row align-items-center">
								<div class="col">                      
									<h4 class="card-title">Update Location</h4> 
									<?php $this->load->view('includes/flashdata'); ?>                                                                 
								</div>  <!--end row-->                                  
							</div>
							<div class='card-body'>

								<div class="container-fluid  p-3">
									<?php echo form_open(base_url('admin/locations/'.$location->id.''),'enctype="multipart/form-data"') ?>	
									<div class="row">
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Address 1</label>
													<input type="text" name="address1"  class="form-control" value="<?php echo set_value('address1',$location->address1);?>" >
													<?php echo form_error('address1'); ?>
												</div>
											</div>
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="active">Address 2</label>
													<input type="text" name="address2"  class="form-control"value="<?php echo set_value('address2',$location->address2);?>">
													<?php echo form_error('address2'); ?>
												</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState">State</label>
											<select required="true" name="state" class="form-control" id="inputState">
												<option value="<?php echo set_value('state',$location->state);?>"><?php echo set_value('state',$location->state);?></option>
												<option value="Andra Pradesh">Andra Pradesh</option>
												<option value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Chhattisgarh">Chhattisgarh</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Himachal Pradesh">Himachal Pradesh</option>
												<option value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerala</option>
												<option value="Madya Pradesh">Madya Pradesh</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Meghalaya">Meghalaya</option>
												<option value="Mizoram">Mizoram</option>
												<option value="Nagaland">Nagaland</option>
												<option value="Orissa">Orissa</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Sikkim">Sikkim</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Telangana">Telangana</option>
												<option value="Tripura">Tripura</option>
												<option value="Uttaranchal">Uttaranchal</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="West Bengal">West Bengal</option>
												<option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
												<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option value="Chandigarh">Chandigarh</option>
												<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
												<option value="Daman and Diu">Daman and Diu</option>
												<option value="Delhi">Delhi</option>
												<option value="Lakshadeep">Lakshadeep</option>
												<option value="Pondicherry">Pondicherry</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="inputDistrict">District</label>
											<select name="city" class="form-control" id="inputDistrict">
												<option value="<?php echo set_value('city',$location->city);?>"><?php echo set_value('city',$location->city);?> </option>
											</select>
										</div>
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Country</label>
													<input type="text" name="country"  class="form-control" value="<?php echo set_value('country',$location->country);?>" >
													<?php echo form_error('country'); ?>
												</div>
											</div>
											
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="active">Postal Code</label>
													<input type="text" name="postal_code"  class="form-control"value="<?php echo set_value('postal_code',$location->postal_code);?>">
													<?php echo form_error('postal_code'); ?>
												</div>
											</div>
										</div>
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="active">Primary Email</label>
													<input type="email" name="primary_email"  class="form-control"value="<?php echo set_value('primary_email',$location->primary_email);?>">
													<?php echo form_error('primary_email'); ?>
												</div>
											</div>
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="active">Primary Contact</label>
													<input type="text" name="primary_contact"  class="form-control"value="<?php echo set_value('primary_contact',$location->primary_contact);?>">
													<?php echo form_error('primary_contact'); ?>
												</div>
											</div>
										</div>
										<div class="form-group p-2">
											<button  class="btn btn-primary">Update</button>
											<a href="<?php echo base_url('admin/locations'); ?>" class="btn btn-danger">Cancel</a>
										</div>
									</div>      
								</form>
								<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
								<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
								
								<script type="text/javascript" src="<?php echo base_url('asset/js/locationdropdown.js'); ?>"></script>
							</div>      

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('includes/footer'); ?>
</div>
