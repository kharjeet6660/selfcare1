<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<h2>Update : Hardware Object</h2>
			<?php $this->load->view('includes/flashdata') ?>
			<div class="row">
				<div class="col-sm-12">
					<div class='card'>
						<div class="card-header">
							<div class="row align-items-center">

							</div>                                  
						</div>
						<div class="card-body">
							<?php echo form_open('admin/hardware/'.$hardware->id,'method="POST"',); ?>

							<div class="row">
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="">Equipement</label>
											<input type="text" name="equipement"  class="form-control" value="<?php echo set_value('equipement', $hardware->equipement)?>" >
											<?php echo form_error('equipement'); ?>
										</div>
									</div>  
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="">Added On</label>
											<input type="date" name="purchased_on" class="form-control" value="<?php echo set_value('purchased_on', $hardware->purchased_on)?>">
											<?php echo form_error('purchased_on'); ?>
										</div>
									</div>
								</div>
								<div class="row p-2">
									<div class="col-sm-6 p-2">
										<div class="form-group p-2">
											<label for="">PO</label>
											<input type="type" name="purchased_order"  class="form-control"value="<?php echo set_value('purchased_order', $hardware->purchased_order)?>">
											<?php echo form_error('purchased_order'); ?>
										</div>
									</div>
								</div>
								<div class="form-group p-2">
									<button  class="btn btn-primary">Update</button>
									<a href="<?php echo base_url('admin/hardware');?>" class="btn btn-danger">Cancel</a>
								</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('includes/footer'); ?>
	</div>

