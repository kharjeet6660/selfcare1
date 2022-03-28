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
                  <h4 class="card-title">Circulars</h4> 
                  <?php $this->load->view('includes/flashdata'); ?>
                </div><!--end col-->   <div class="box-header with-border">
                  <a href="<?php echo base_url('admin/circular/new');?>" class="btn btn-success"><i class="fa fa-plus"></i> Create</a>
                </div>                                                                         
              </div>  <!--end row-->                                  
            </div>
            <div class='card-body'>

              <table class="table table-striped">
                <tr>
                  <th>Year</th>
                  <th>Circular No.</th>
                  <th>Department</th>
                  <th>Ref No</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($circular as $item){ ?>
                  <tr>
                    <td><?php  echo substr($item['issue_date'],0,4);?></td>
                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['department'];?></td>
                    <td><?php  echo 'BMF/'.substr($item['issue_date'],0,4).'/'.$item['department'].'/'.$item['id'];?></td>
                    <td>
                      <a href='<?php echo base_url('admin/circular/'.$item['id'].'/edit'); ?>'><i class="las la-edit text-secondary la-2x"></i></a>
                      <a href='<?php echo base_url('admin/circular/'.$item['id'].'/display/download'); ?>'> <i class="las la-file-download text-secondary la-2x"></i></a>
                      <a id="<?php echo $item['id'] ?>" onClick="get_id(this.id)" href='<?php echo base_url('admin/circular/'.$item['id'].'/delete'); ?>'> <i class="las la-trash-alt text-secondary la-2x"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo $this->pagination->create_links(); ?>
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
          url: "<?php echo base_url('admin/circular/') ?>"+id+"/delete",
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
