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
              <h4 class="card-title">Announcements</h4>
              <div class="box-header with-border">
                <?php $this->load->view('includes/flashdata'); ?>
                <a href="<?php echo base_url('admin/announcements/new');?>" class="btn btn-success"><i data-feather="plus"></i> Create</a>
              </div>
              <!--end row-->                                  
            </div>
            <div class='card-body'>
              <table class="table table-striped">
                <tr>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($announcements as $item){ ?>
                  <tr>
                    <td><?php echo $item['start_date'];?></td>
                    <td><?php echo $item['end_date'];?></td>
                    <td><?php echo $item['title'];?></td>
                    <td><?php echo $item['status'];?></td>
                    <td><?php echo $item['description'];?></td>
                    <td>
                      <?php if ( $item['end_date'] >= date('Y-m-d')) {?>
                        <a href='<?php echo base_url('admin/announcements/'.$item['id'].'/edit'); ?>' ><i class="las la-edit text-secondary la-2x"></i></a>
                        <a id="<?php echo $item['id']; ?>" onClick="get_id(this.id)" href='<?php echo base_url('admin/announcements/'.$item['id'].'/delete'); ?>'> <i class="las la-trash-alt text-secondary la-2x"></i></a>
                      <?php } ?>
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
            url: "<?php echo base_url('admin/announcements/') ?>"+id+"/delete",
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
