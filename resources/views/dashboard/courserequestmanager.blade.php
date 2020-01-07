      <!-- standard and simple pop-up -->
      <div id="customized-standard-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="add-online-course-modal-content">
          <div class="add-online-course-modal-content-small" style="width: 40%">

            <!-- ACCEPTED POP-UP & SCHEDULE APPOINTMENT POP-UP -->
            <div id = "administrator-edit-customized-course" class="row modal-body">
              <div class="add-online-course-modal-content-title bottom">
                Edit Customized Course
              </div>
              <form id ='edit-course-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="cid" value="">
                <div class="col-md-8 util-text-align-left">
                  <label>Title</label>
                  <input class="form-control" name="adm-title" type="text">
                </div>
                <div class="col-md-4 util-text-align-left">
                  <label>Code</label>
                  <input class="form-control" name="adm-code" type="text" disabled>
                </div>
                <div class="col-md-6 util-text-align-left" style="margin-top: 25px">
                  <label>Lecturer</label>
                  <input class="form-control" name="adm-lecturer" type="text" disabled>
                </div>
                <div class="col-md-6 util-text-align-left" style="margin-top: 25px">
                  <label>Category</label>
                  <select class = "form-control" name = 'adm-category'>
                    <option hidden ></option>
                    <?php if (isset($courses_categories)) {?>
                            <?php foreach ($courses_categories as $data) { ?>
                              <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                            <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-4">
                    <label>Price</label>
                    <input class="form-control" name="adm-price" type="number">
                  </div>
                  <div class="col-md-4">
                    <label>Start Date</label>
                    <input class="form-control modaldatepickeradm" name="adm-start" type="text">
                  </div>
                  <div class="col-md-4">
                    <label>End Date</label>
                    <input class="form-control modaldatepickeradm" name="adm-end" type="text">
                  </div>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-4">
                    <label>Type</label>
                    <select class="form-control" name="adm-type">
                        <option value="0">Offline</option>
                        <option value="1">Online</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="adm-status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                  </div>
                  <?php if (isset($users) && $users->type == 3) {?>
                  <div class="col-md-4">
                    <label></label>
                    <div class="tellusdivtitle" id="adminfeatured" style="margin-top: 11px;">
                      <div class="checkbox checkbox-info checkbox-circle" style="margin: 0px;">
                        <input id="checkboxfeatured" name="is_featured" type="checkbox">
                        <label for="checkboxfeatured" style="color: black;">
                          Featured
                        </label>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-12">
                    <label>Overview</label>
                    <textarea class="form-control" name="adm-overview" rows="5"> </textarea>
                  </div>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-12">
                    <label>Additional Info</label>
                    <textarea class="form-control" name="adm-info" rows="5"> </textarea>
                  </div>
                </div>
                <div class="col-md-12 no-padding util-text-align-left hide" id='topic-part' style="margin-top: 25px">
                  <div class="col-md-12">
                    <label>Topic</label>
                    <textarea class="form-control" name="adm-topics" rows="5"> </textarea>
                  </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6" style="margin-top: 25px">
                  <div class="left-border right-border top bottom" style="padding: 18px 0px 18px 0px;">
                    <img id="blah-settings" src="{{ URL::to('/') }}/img/uploadcoverlogo-min.png" alt="your image" />
                  </div>
                  <label class="custom-file-upload">
                    <input type='file' name='cover' class = "hide" onchange="readURLSetting(this);"/>
                    Edit Cover
                  </label>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-12 no-padding">
                  <button type="button" id="submit-edit-courses" class="btn btn-blue view-proposal-btn send-schedule standard-modal-button">Send</button>
                  <button type="button" id="delete-edit-courses" class="btn btn-red view-proposal-btn send-schedule standard-modal-button">Delete</button>
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
            Course Request Manager
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
                <table class="table table-bordered table-hover" id = 'course-manager-table'>
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Title</th>
                      <th class="min-width-120">Requester</th>
                      <th class="min-width-120">Price</th>
                      <th class="min-width-120">Participants</th>
                      <th class="min-width-120" style="min-width: 100px">Start Date</th>
                      <th class="min-width-120" style="min-width: 100px">End Date</th>
                      <th class="min-width-120">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($courses) && (count($courses) > 0)) { ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($courses as $data) { ?>
                        <tr>
                          <td align="center"><?php echo $counter ?></td>
                          <td align="center"><?php echo $data->description ?></td>
                          <td align="center"><?php echo $data->requester ?></td>
                          <td style="text-align: right;">$<?php echo number_format($data->budget,2,'.',',') ?></td>
                          <td align="center"><?php echo $data->participants ?></td>
                          <td align="center"><?php if ($data->start_date != '') { echo date("d-m-Y", strtotime($data->start_date)); } ?></td>
                          <td align="center"><?php if ($data->end_date != '') { echo date("d-m-Y", strtotime($data->end_date)); }  ?></td>
                          <td class="util-text-align-center">
                            <i class="fa fa-pencil administrator-course-request-edit hide" data-cid = '<?php echo $data->id ?>' data-confidentiality = '<?php echo $data->confidentiality?>' aria-hidden="true"></i> 
                            <i class="fa fa-trash-o administrator-course-request-delete" data-cid = '<?php echo $data->id ?>' data-title = '<?php echo $data->description?>' aria-hidden="true"></i> 
                          </td>
                        </tr>
                      <?php $counter++; }?>     
                    <?php } else { $flag = false;?>
                        <!-- <tr>
                          <td colspan = 10 class="no-border" align="center"><b>No Customized Courses</b></td>
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