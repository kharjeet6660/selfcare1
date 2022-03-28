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
              <h4 class="card-title">Branches</h4>
              <div class="box-header with-border">
                <?php $this->load->view('includes/flashdata'); ?>
                <a href="<?php echo base_url('admin/branches/new');?>" class="btn btn-success"><i data-feather="plus"></i> Create</a>
              </div>
              <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Name</th>
                  <th>RO</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($branches as $item){ ?>
                  <tr>
                    <td><?php echo $item['name'];?></td>
                    <td><?php echo $item['ro'];?></td>
                    <td>
                        <a href='<?php echo base_url('admin/branches/'.$item['id'].'/edit'); ?>' ><i class="las la-edit text-secondary la-2x"></i></a>
                        <a id="<?php echo $item['id']; ?>" onClick="get_id(this.id)" href='<?php echo base_url('admin/branches/'.$item['id'].'/delete'); ?>'> <i class="las la-trash-alt text-secondary la-2x"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
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
            url: "<?php echo base_url('admin/branches/') ?>"+id+"/delete",
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
