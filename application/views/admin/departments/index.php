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
                  <h4 class="card-title">Departments</h4> 
                  <?php $this->load->view('includes/flashdata'); ?>
                </div><!--end col-->   <div class="box-header with-border">
                  <a href="<?php echo base_url('admin/departments/new');?>" class="btn btn-success"><i class="fa fa-plus"></i> Create</a>
                </div>                                                                         
              </div>  <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table tablle-bordered table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php $i=1; ?>
                <?php foreach ($departments as $item){ ?>
                  <tr>
                    <td><?php  echo $i ;?></td>
                    <td><?php  echo $item['name'];?></td>
                    <td><?php  echo $item['active']== 1 ? 'Active' : 'Inactive';?></td>
                    <td>
                      <a href='<?php echo base_url('admin/departments/'.$item['id'].'/edit'); ?>' ><i class="text-secondary las la-edit la-2x"></i></a>
                      <a  id="<?php echo $item['id']; ?>" onClick="get_id(this.id)" href='<?php echo base_url('admin/departments/'.$item['id'].'/delete'); ?>' >  <i class="text-secondary las la-trash-alt la-2x"></i></a>
                    </td>
                  </tr>
                  <?php $i++ ; } ?>
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
          url: "<?php echo base_url('admin/departments/') ?>"+id+"/delete",
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
