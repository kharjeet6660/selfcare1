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
									<h4 class="card-title">Create Circulars</h4>                                                                  
								</div>  <!--end row-->                                  
							</div>
							<div class='card-body'>

								<div class="container-fluid  p-3">
									
									<?php echo form_open(base_url('admin/circular'),'enctype="multipart/form-data"') ?>
									<div class="row">
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Title</label>
													<input type="text" name="title"  class="form-control"value="<?php echo set_value('title');?>">
													<?php echo form_error('title'); ?>
												</div>
											</div>
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Department</label>
													<input type="text" name="department"  class="form-control" value="<?php echo set_value('department');?>" >
													<?php echo form_error('department'); ?>
												</div>
											</div>
										</div>
										<div class="row p-2">
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Upload pdf</label>
													<input type="file" name="pdf_file"  class="form-control" >
													<?php if(isset($upload_error)){ echo $upload_error ; } ?>
												</div>
											</div> 
										</div>  
										<div class="form-group p-2">
											<button  class="btn btn-primary">Create</button>
											<a href="<?php echo base_url('admin/circular') ?>" class="btn btn-danger">Cancel</a>
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
