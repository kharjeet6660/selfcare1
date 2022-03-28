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
									<h4 class="card-title">Update Branch</h4> 
									<?php $this->load->view('includes/flashdata'); ?>
								</div>                               
							</div>
							<div class='card-body'>

								<div class="container-fluid  p-3">
									<?php echo form_open(base_url('admin/branches/'.$branch->id.''),'enctype="multipart/form-data"') ?>	
									<div class="row">
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="name">Name</label>
													<input type="text" name="name"  class="form-control" value="<?php echo set_value('name',$branch->name);?>" >
													<?php echo form_error('name'); ?>
												</div>
											</div>
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="ro">RO</label>
													<input type="text" name="ro"  class="form-control"value="<?php echo set_value('ro',$branch->ro);?>">
													<?php echo form_error('ro'); ?>
												</div>
											</div>
										</div>
										
										<div class="form-group p-2">
											<button  class="btn btn-primary">Update</button>
											<a href="<?php echo base_url('admin/branches'); ?>" class="btn btn-danger">Cancel</a>
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
