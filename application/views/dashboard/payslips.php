<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
        <?php echo form_open(base_url('payslips/download/'.current_user()->id),'method="POST"'); ?>
        <div class="row pb-3">
            <div class="col-md-3 bg-white py-3 text-end">
                <input required class ="form-control" value="<?php echo set_value(date('y-m')) ?>" type="month" min="2022-01" max="2022-12" name="month">
            </div>
            <div class="col-md-1 bg-white col-sm-4 py-3">
             <button class="btn btn-primary">Apply</button>
         </div>
     </div>
 </form>
</div>
<?php $this->load->view('includes/footer'); ?>
</div>
