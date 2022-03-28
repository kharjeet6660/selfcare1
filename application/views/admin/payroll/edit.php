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
									<h4 class="card-title">Update Payroll</h4> 
									<?php $this->load->view('includes/flashdata'); ?>                
								</div>                             
							</div>
							<div class='card-body'>
								<div class="container-fluid  p-3">
									<?php echo form_open(base_url('admin/payroll/'.$payroll->id),'method="POST"') ?>	
									<div class="row">
										<div class="row p-2">
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Working Days</label>
													<input type="text" name="working_days"  class="form-control" value="<?php echo set_value('working_days',$payroll->working_days);?>" >
													<?php echo form_error('working_days'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Basic</label>
													<input type="text" name="basic"  class="form-control" value="<?php echo set_value('basic',$payroll->basic);?>" >
													<?php echo form_error('basic'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">HRA</label>
													<input type="text" name="hra"  class="form-control" value="<?php echo set_value('hra',$payroll->hra);?>" >
													<?php echo form_error('hra'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Conveyance</label>
													<input type="text" name="conveyance"  class="form-control" value="<?php echo set_value('conveyance',$payroll->conveyance);?>" >
													<?php echo form_error('conveyance'); ?>
												</div>
											</div>
										</div>
										<div class="row p-2">
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Special Allowance</label>
													<input type="text" name="special_allowance"  class="form-control" value="<?php echo set_value('special_allowance',$payroll->special_allowance);?>" >
													<?php echo form_error('special_allowance'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">LTA</label>
													<input type="text" name="lta"  class="form-control" value="<?php echo set_value('lta',$payroll->lta);?>" >
													<?php echo form_error('lta'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Total Earnings</label>
													<input type="text" name="total_earnings"  class="form-control" value="<?php echo set_value('total_earnings',$payroll->total_earnings);?>" >
													<?php echo form_error('total_earnings'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">TDS</label>
													<input type="text" name="tds"  class="form-control" value="<?php echo set_value('tds',$payroll->tds);?>" >
													<?php echo form_error('tds'); ?>
												</div>
											</div>
										</div>
										<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Advance</label>
													<input type="text" name="advance"  class="form-control" value="<?php echo set_value('advance',$payroll->advance);?>" >
													<?php echo form_error('advance'); ?>
												</div>
											</div>
											<div class="col-sm-6 p-2">
												<div class="form-group p-2">
													<label for="">Bonus</label>
													<input type="text" name="bonus"  class="form-control" value="<?php echo set_value('bonus',$payroll->bonus);?>" >
													<?php echo form_error('bonus'); ?>
												</div>
											</div>
										<div class="row p-2">
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Professional Tax</label>
													<input type="text" name="professional_tax"  class="form-control" value="<?php echo set_value('professional_tax',$payroll->professional_tax);?>" >
													<?php echo form_error('professional_tax'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">EPF</label>
													<input type="text" name="epf"  class="form-control" value="<?php echo set_value('epf',$payroll->epf);?>" >
													<?php echo form_error('epf'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Other Deductions</label>
													<input type="text" name="other_deductions"  class="form-control" value="<?php echo set_value('other_deductions',$payroll->other_deductions);?>" >
													<?php echo form_error('other_deductions'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Loan</label>
													<input type="text" name="loan"  class="form-control" value="<?php echo set_value('loan',$payroll->loan);?>" >
													<?php echo form_error('loan'); ?>
												</div>
											</div>
										</div>
										<div class="row p-2">
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Total Deductions</label>
													<input type="text" name="total_deductions"  class="form-control" value="<?php echo set_value('total_deductions',$payroll->total_deductions);?>" >
													<?php echo form_error('total_deductions'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Net Salary</label>
													<input type="text" name="net_salary"  class="form-control" value="<?php echo set_value('net_salary',$payroll->net_salary);?>" >
													<?php echo form_error('net_salary'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Naration 1</label>
													<input type="text" name="naration1"  class="form-control" value="<?php echo set_value('naration1',$payroll->naration1);?>" >
													<?php echo form_error('naration1'); ?>
												</div>
											</div>
											<div class="col-sm-3 p-2">
												<div class="form-group p-2">
													<label for="">Naration 2</label>
													<input type="text" name="naration2"  class="form-control" value="<?php echo set_value('naration2',$payroll->naration2);?>" >
													<?php echo form_error('naration2'); ?>
												</div>
											</div>
										</div>
										<div class="form-group p-2">
											<button  class="btn btn-primary">Update</button>
											<a href="<?php echo base_url('admin/payroll'); ?>" class="btn btn-danger">Cancel</a>
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
