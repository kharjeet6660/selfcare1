<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container">
			<div class='card'>
				<div class='card-header'>
					<h2>Payroll List</h2>
					<?php $this->load->view('includes/flashdata'); ?>
					<!-- Display status message -->
					<?php if(!empty($success_msg)){ ?>
						<div class="col-xs-12">
							<div class="alert alert-success"><?php echo $success_msg; ?></div>
						</div>
					<?php } ?>
					<?php if(!empty($error_msg)){ ?>
						<div class="col-xs-12">
							<div class="alert alert-danger"><?php echo $error_msg; ?></div>
						</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-2">
							<a href="<?php echo base_url('admin/payroll/new');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Import</a>
						</div> 
						<div class="col-sm-2">
							<a href="<?php echo base_url('payrolltemplate/payroll-template.xlsx');?>" class="btn btn-success"><i class="fa fa-download"></i>
							Template</a>
						</div> 
					</div>

				</div>
				<!-- Data list table -->
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Employee ID</th>
							<th>Payroll Month</th>
							<th>Working Days</th>
							<th>Total Earning</th>
							<th>Total Deduction</th>
							<th>Net Earning</th>
							<th>Narattions</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($payroll)){ foreach($payroll as $row){ ?>
							<tr>
								<td><?php echo $row['employee_id']; ?></td>
								<td><?php echo date('F/Y', strtotime($row['payroll_month']));; ?></td>
								<td><?php echo $row['working_days']; ?></td>
								<td><?php echo $row['total_earnings']; ?></td>
								<td><?php echo $row['total_deductions']; ?></td>
								<td><?php echo $row['net_salary']; ?></td>
								<td><?php echo $row['naration1'].'/'.$row['naration2']; ?></td>
								<td>
									<a href='<?php echo base_url('admin/payroll/'.$row['id'].'/edit'); ?>'><i class="las la-edit text-secondary la-2x"></i></a>
									<?php if($row['status'] == 1) {?>
										<a id="<?php echo $row['id']; ?>" onClick="get_id(this.id)" href='<?php echo base_url('admin/payroll/'.$row['id'].'/delete'); ?>' >  <i class="text-secondary las la-trash-alt la-2x"></i></a>
									<?php } else { ?>
										<a class="confirm_del_btn" value="$row['id']" href='<?php echo base_url('admin/payroll/'.$row['id'].'/delete'); ?>' class='btn btn-info'>  Activate</a>
									<?php } ?>
								</td>
							</tr>
						<?php } }else{ ?>
							<tr><td colspan="5">No Payroll(s) Data found...</td></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	function get_id(id){
		event.preventDefault();
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this data!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					method: "GET",
					url: "<?php echo base_url('admin/payroll/') ?>"+id+"/delete",
					data: {id:id},
					success:function(response){
						swal("Your data has been deleted!", {
							icon: "success",
						}).then((result) => {
							location.reload();
						});
					}
				});
			} else {
				swal("Your data is safe!");
			}
		});
	}

</script>
<?php $this->load->view('includes/footer'); ?>
</div>
