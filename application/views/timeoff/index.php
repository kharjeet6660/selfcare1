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
              <div class="row align-items-center">
                <div class="col"><h5 class="hk-sec-title">Employee Timeoff(s)</h5></div>
              </div>
            </div>
            <div class='card-body'>
              <!-- Some Info can be added -->
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col"><h5 class="hk-sec-title">List of Available Requests</h5></div>
              </div>
            </div>
            <div class='card-body'>
              <!-- Some Info can be added -->
                <?php foreach($timeoffs as $timeoff) {?>
                  <div class="media align-items-center mb-3">
                      <span class="thumb-xs justify-content-center d-flex align-items-center bg-soft-success rounded-circle fw-semibold"></span>
                      <div class="media-body ms-3 align-self-center">
                          <h6 class="m-0 font-15"><?php echo $timeoff['name'] ?></h6>
                          <div class="d-flex justify-content-between">
                            <?php $percent = ($timeoff['taken'] * 100)/ $timeoff['count']; ?>
                              <i class="mdi mdi-format-list-bulleted text-success"></i>
                              <span class="text-muted right"><?php echo $timeoff['taken'].'/'.$timeoff['count'] ?> Days Used</span>
                          </div>
                          <div class="progress mt-0" style="height:3px;">
                            
                              <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent;?>%;" aria-valuenow='' aria-valuemin='' aria-valuemax="<?php echo $timeoff['count']?>"></div>
                          </div>
                      </div>
                  </div>
                <?php } ?>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class='card'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="hk-sec-title">List of Request</h4>
                  <span><a class='btn btn-dark' href="<?php echo base_url('timeoff/new'); ?>">New Request</a></span>
                  
                </div>
              </div>
            </div>
            <div class='card-body'>

              <table class="table table-striped">
                <tr>
                  <th>Status</th>
                  <th>Type</th>
                  <th>Duration</th>
                  <th>Days</th>
                  <!-- <th>Approved By</th> -->
                  <th>Reason</th>
                  <th></th>
                </tr>
                <?php foreach($user_timeoffs as $timeoff){ ?>
                  <tr>
                    <td>
                      <?php switch('approve') {
                        case 'request':
                        $badge_class = 'badge badge-soft-blue';break;
                        case 'approve':
                        $badge_class = 'badge badge-soft-success';break;
                        case 'reject' || 'cancel':
                        $badge_class = 'badge badge-soft-danger';break;
                        default:
                        $badge_class = 'badge badge-soft-light';break;
                      }?>
                      <span class="<?php echo $badge_class; ?>"><?php echo $timeoff['status'] ?></span>
                    </td>
                    <td scope="row">
                      <?php echo $timeoff['name']; ?></td>
                    <td><?php echo date('d M', strtotime($timeoff['start_date'])) . ' - ' . date('d M', strtotime($timeoff['end_date'])) ?></td>
                    <td><?php echo $timeoff['total_days'] . ' day(s)' ?></td>
                    <td><?php echo $timeoff['reason'] ?></td>
                    <td>
                      <?php if(strtotime(date("Y-m-d")) < strtotime($timeoff['end_date'])) { ?>
                        <!--a href='< ?php echo base_url('timeoff/edit'); ?>'><i class="las la-pen text-primary font-16"></i></a-->
                        <a href='<?php echo base_url('/timeoff/'.$timeoff['id'].'/cancel'); ?>'><i class="las la-trash text-danger font-16"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
</div>
