<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">                      
                  <h4 class="card-title">Download Forms</h4>
                </div><!--end col-->                                                                            
              </div>  <!--end row-->                                  
            </div>
            <div class='card-body'>
              <ol class='list-group'>
                <?php $i=1; $array = array('.pdf','.doc','.xls','-','.','_','+');
                foreach($forms as $file) {
                  if(preg_match("/pdf/i", $file)) { ?>
                    <li class='list-group-item'><a href="<?php echo base_url('upload/static/'.$file); ?>" target='_blank'>
                      <?php echo $i++."). ".trim(str_replace($array,' ',$file))?></a>
                    </li>
                <?php }} ?>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('includes/footer'); ?>
</div>