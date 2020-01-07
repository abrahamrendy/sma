      
      <!-- standard and simple pop-up -->
      <div id="customized-standard-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="account-modal-content">
          <div class="account-modal-content-small" style="width: 20%">

            <!-- ACCEPTED POP-UP & SCHEDULE APPOINTMENT POP-UP -->
            <div id = "administrator-edit-user-status" class="row modal-body">
              <div class="add-online-course-modal-content-title bottom">
                Edit
              </div>
              <form id ='edit-status-user-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="">
                <div class="col-md-12 util-text-align-left">
                  <label>Name</label>
                  <input class="form-control" name="adm-name" type="text" disabled>
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Email</label>
                  <input class="form-control" name="adm-email" type="text" disabled>
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Website</label>
                  <input class="form-control" name="adm-web-url" type="text">
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Personal Description</label>
                  <textarea class="form-control" name="adm-user-desc" type="text"> </textarea>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="adm-status">
                        <option value="1">Active</option>
                        <option value="2">Suspended</option>
                        <option value="0">Inactive</option>
                    </select>
                  </div>
                  <div class="col-md-4 coursecredits">
                    <label>Course Credits</label>
                    <input class="form-control" name="adm-course-credits" type="number">
                  </div>
                  <div class="col-md-4 proposalcredits" style="padding-left: 0px">
                    <label>Proposal Credits</label>
                    <input class="form-control" name="adm-proposal-credits" type="number">
                  </div>
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Course Owned</label>
                  <ul class="list-group" id = 'course-owned'>
                  </ul>
                </div>
                <div class="col-md-12 no-padding">
                  <button type="button" id="submit-edit-user-status" class="btn btn-blue view-proposal-btn send-schedule standard-modal-button">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end of standard and simple pop-up -->

      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            User Manager
            </a>
          </div>

          <!-- <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#invoice'>
                <img src="{{ URL::to('/') }}/img/invoice-icon-min.png">
                Invoice
              </a>
            </div>
            <div id = "payment-history-tab" class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#payment-history">
                <img src="{{ URL::to('/') }}/img/payment-icon-min.png">
                Payment History
              </a>
            </div>
          </div> -->

          <div class="tab-content">
            <div class = "tab-pane fade in active">
              <div class="administrator-table top bottom left-border right-border">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Name</th>
                      <th class="min-width-120">Email</th>
                      <th class="min-width-120">Country</th>
                      <!-- <th class="min-width-120">Occupation</th> -->
                      <th class="min-width-120">Organization</th>
                      <th class="min-width-120">Type</th>
                      <th class="min-width-120">Role</th>
                      <th class="min-width-120">Status</th>
                      <th class="min-width-120">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($all_users) && (count($all_users) > 0)) { ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($all_users as $data) { ?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td>
                            <a href = '#' class="detailed-user" data-id = "<?php echo $data->id?>">
                            <?php echo $data->name ?>
                            </a>
                          </td>
                          <td><?php echo $data->email ?></td>
                          <td><?php echo $data->country ?></td>
                          <!-- <td>
                          <?php 
                            if ($data->type == 1) {
                              echo $data->comp_occupation;
                            } else {
                              echo $data->occupation_name;
                            }
                          ?>
                          </td> -->
                          <td><?php echo $data->organization ?></td>
                          <td>
                            <?php 
                              if ($data->type == 0) {
                                echo "Individual";
                              } elseif ($data->type == 1) {
                                echo "Corporate";
                              } elseif ($data->type == 2) {
                                echo "Employee";
                              }
                            ?>
                          </td>
                          <td><?php echo $data->role_name ?></td>
                          <td>
                            <!-- <a href = '#' class="change-status-adm" data-id = "<?php echo $data->id?>" data-name = "<?php echo $data->name?>" data-email = "<?php echo $data->email?>" data-status = "<?php echo $data->status?>"> -->
                            <?php 
                              if ($data->status == 0) {
                                echo "Inactive";
                              } elseif ($data->status == 1) {
                                echo "Active";
                              } elseif ($data->status == 2) {
                                echo "Suspended";
                              }
                            ?>
                            <!-- </a> -->
                          </td>
                          <td align="center">
                            <i class="fa fa-pencil change-status-adm" aria-hidden="true" data-type = "{{$data->type}}" data-id = "<?php echo $data->id?>" data-name = "<?php echo $data->name?>" data-email = "<?php echo $data->email?>" data-status = "<?php echo $data->status?>" data-proposal = "{{$data->proposal_credits}}" data-credits = "<?php echo $data->course_credits?>" data-web-url = "<?php echo $data->web_url?>" data-user-desc = "<?php echo $data->user_desc?>"></i> 
                          </td>
                        </tr>
                      <?php $counter++; }?>     
                    <?php } else { $flag = false;?>
                        <!-- <tr>
                          <td colspan = 8 class="no-border" align="center"><b>No Users</b></td>
                        </tr> -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>