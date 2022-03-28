<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
  <div class="page-content-tab">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <?php $this->load->view('includes/flashdata'); ?>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Employee Details </h4>
              <a href="<?php echo base_url('admin/users/new');?>" class="btn btn-success"><i data-feather="plus"></i> Create New User</a> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                  <div class="dataTable-top">
                  </div>
                  <div class="dataTable-container">
                    <table class="table dataTable-table" id="datatable_1">
                      <thead class="thead-light">
                        <tr>
                          <th data-sortable="" class="desc"><a href="#" class="dataTable-sorter">Name</a></th>
                          <th >Emp ID</th>
                          <th data-sortable=""><a href="#" class="dataTable-sorter">Email</a></th>
                          <th>Gender</th>
                          <th>Contact</th>
                          <th>Department</th>
                          <th>Location</th>
                          <th data-type="date" data-format="YYYY/DD/MM" data-sortable=""><a href="#" class="dataTable-sorter">Start Date</a></th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $item){ ?>
                          <tr>
                            <td>
                              <?php  echo $item['first_name'].' '.$item['last_name']?>
                              <?php echo is_user_active($item['status']) ? "<span class='badge badge-soft-success'>Active</span>" : "<span class='badge badge badge-soft-danger'>Deactivated</span>" ?>
                            </td>
                            <td><?php  echo $item['employee_id'];?></td>
                            <td><?php  echo $item['email'];?></td>
                            <td>
                              <?php $data = array(1 => 'Male', 2 => 'Female', 3 => 'Others');
                              print_r($data[$item['gender']]);
                              ?>
                            </td>
                            <td><?php  echo $item['phone_no'];?></td>
                            <td><?php  echo $item['department'];?></td>
                            <td><?php  echo $item['state'].', '.$item['city'];?></td>
                            <td><?php  echo $item['created_at'];?></td>
                            <td>
                              <?php if(is_user_active($item['status'])) { ?>
                                <a href="<?php echo base_url('admin/users/'.$item['id'].'/edit'); ?>"><i class="text-secondary las la-edit la-2x"></i></a>
                                <a id="<?php echo $item['id']; ?>" onClick="get_id(this.id)" href="<?php echo base_url('admin/users/'.$item['id'].'/delete'); ?>"><i class="text-secondary las la-trash-alt la-2x"></i></a>
                              <?php } ?>

                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
          function get_id(id) {
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
                  url: "<?php echo base_url('admin/users/') ?>"+id+"/delete",
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
