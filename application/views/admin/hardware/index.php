<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<h2>Company Hardware List:</h2>
			<?php $this->load->view('includes/flashdata') ?>
			<div class="row">
				<div class="col-sm-12">
					<div class='card'>
						<div class="card-header">
							<div class="row align-items-center">

							</div>                                  
						</div>
						<div class="card-body">
							<a href='<?php echo base_url('admin/hardware/new'); ?>' class='btn btn-success'> <i data-feather="plus"></i> Create</a>
							<table class="table table-striped">
								<tr>
									<th>Id</th>
									<th>Equipement</th>
									<th>Added On</th>
									<th>PO</th>
									<th>Status</th>
									<th>ACTION</th>
								</tr>
								<?php foreach ($hardware as $item){ ?>
									<tr>
										<td><?php echo $item['id'];?></td>
										<td><?php echo $item['equipement'];?></td>
										<td><?php echo $item['purchased_on'];?></td>
										<td><?php echo $item['purchased_order'];?></td>
										<td><?php 
										if($item['aasm_state']=='assign') {echo 'Assigned By ' .$item['email'];}
										else {echo $item['aasm_state'];} ?>
									</td>
									<td>
										<?php if ($item['aasm_state']== 'in-stock') {?>
											<a href='<?php echo base_url('admin/hardware/'.$item['id'].'/edit'); ?>' class='btn btn-primary'> <i data-feather="edit"></i></a>
											<a href='<?php echo base_url('admin/hardware/'.$item['id'].'/delete'); ?>' class='btn btn-danger'> <i data-feather="delete"></i></a>
											<a href='<?php echo base_url('admin/hardware/'.$item['id'].'/assign'); ?>' class='btn btn-secondary'> <i data-feather="book"></i>Assign</a>
										<?php } elseif ($item['aasm_state']== 'assign') {?>
											<?php echo form_open(base_url('admin/hardware/'.$item['id'].'/collect')) ; ?>
											<button type="submit" name="action" value="collect" class="btn btn-secondary"><i data-feather="book"> </i>Collect</button>
										</form>
									<?php }?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>
</div>
