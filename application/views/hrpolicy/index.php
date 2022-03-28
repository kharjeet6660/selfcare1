<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
	<div class="page-content-tab">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class='card'>
						<div class="card-header">
							<h4 class="card-title">HR Policy</h4>
						</div>
						<div class='card-body'>
							<table class="table table-bordered">
								<tr>
									<th>Sr.</th>
									<th>Title</th>
								</tr>
								<tr>
									<td>1</td>
									<td><a href="upload/static/hrpolicy/hr-policy-manual-for-staff.pdf" target="new">HR Policy Manual for Staff</a></td>
								</tr>
								<tr>
									<td>2</td>
									<td><a href="<?php echo base_url('upload/static/hrpolicy/Candidate_Evaluation.pdf') ?>" target="new">Candidate Evaluation Form</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td><a href="upload/static/hrpolicy/Employee-Compensation-Insurance-Policy-Claim-Form.pdf" target="new">Employee Compensation Documents</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('includes/footer'); ?>
</div>
