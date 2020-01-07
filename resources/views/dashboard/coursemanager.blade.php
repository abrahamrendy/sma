      <!-- standard and simple pop-up -->
      <div id="customized-standard-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="add-online-course-modal-content">
          <div class="add-online-course-modal-content-small" style="width: 40%">

            <!-- ACCEPTED POP-UP & SCHEDULE APPOINTMENT POP-UP -->
            <div id = "administrator-edit-course" class="row modal-body">
              <div class="add-online-course-modal-content-title bottom">
                Edit Course
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
                  <label>Creator</label>
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
                  <div class="col-md-4 manager-date">
                    <label>Start Date</label>
                    <input class="form-control modaldatepickeradm" name="adm-start" type="text">
                  </div>
                  <div class="col-md-4 manager-date">
                    <label>End Date</label>
                    <input class="form-control modaldatepickeradm" name="adm-end" type="text">
                  </div>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-4">
                    <label>Currency</label>
                    <select class="form-control" name="adm-currency">
                    <?php if (isset($currencies)) {?>
                        <?php foreach ($currencies as $data) { ?>
                          <option value="<?php echo $data->id ?>"><?php echo $data->name?> (<?php echo $data->symbol?>)</option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                  </div>
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
                        <option value="3">Completed</option>
                        <option value="4">Cancelled</option>
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
                  <?php if (isset($users) && ($users->country == 'SG' || $users->type == 3)) {?>
                  <div class="col-md-6">
                    <label></label>
                    <div class="tellusdivtitle" id="adminsfc" style="margin-top: 11px;">
                      <div class="checkbox checkbox-info checkbox-circle" style="margin: 0px;">
                        <input id="checkboxsfc" name="is_sfc" type="checkbox">
                        <label for="checkboxsfc" style="color: black;">
                          SkillsFuture Credit Payment
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
                  <span class="alert alert-info" style="display: block; font-size: 9pt; padding: 8px">Recommended dimension is 720x400 pixels</span>
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

      <!-- enrolled users pop-up -->
      <div id="enrolled-users-modal" class="modal" style="z-index: 39">
        <div class="tellus-modal-content">
          <div class="tellus-modal-content-small" style="border: 0px; min-width: 0px;">

            <div class="row modal-body" style="padding-bottom: 40px">
              <div class="add-online-course-modal-content-title bottom">
                Enrolled Users
              </div>
              <!-- <div id="enrolled-users">
                <ol class="rounded-list">
                </ol>
              </div> -->
              <div class="administrator-table top bottom left-border right-border" style="width: 100%; text-align: left">
                <table class="table table-bordered table-hover" id = 'enrolled-users-table'>
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Name</th>
                      <th class="min-width-120">Email</th>
                      <th class="min-width-120">Phone</th>
                      <th class="min-width-120">Organization</th>
                      <th class="min-width-120">Occupation</th>
                      <th class="min-width-120">Country</th>
                      <th class="min-width-120">Status</th>
                      <th class="min-width-120">Action</th>
                    </tr>
                  </thead>
                  <tbody class="util-text-align-center">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of enrolled users pop-up -->

      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Course Manager
            </a>
          </div>

          <?php if ($users->type == 1) {?>
          <div class="dashboard-subheader bottom nav nav-tabs" style="width: 108%">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#own'>
                <!-- <img src="{{ URL::to('/') }}/img/invoice-icon-min.png"> -->
                Own
              </a>
            </div>
            <div id = "payment-history-tab" class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#enroll">
                <!-- <img src="{{ URL::to('/') }}/img/payment-icon-min.png"> -->
                Enrolled
              </a>
            </div>
          </div>
          <?php } ?>

          <div class="tab-content">
            <div class = "tab-pane fade in active" id = 'own'>
              <div class="administrator-table top bottom left-border right-border">
                <table class="table table-bordered table-hover" id = 'course-manager-table'>
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Code</th>
                      <th class="min-width-120">Title</th>
                      <th class="min-width-120">Creator</th>
                      <th class="min-width-120">Price</th>
                      <th class="min-width-120" style="min-width: 100px">Start Date</th>
                      <th class="min-width-120" style="min-width: 100px">End Date</th>
                      <th class="min-width-120">Signups</th>
                      <th class="min-width-120">Type</th>
                      <th class="min-width-120">Status</th>
                      <th class="min-width-120">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($courses) && (count($courses) > 0)) { ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($courses as $data) { ?>
                        <tr>
                          <td align="center"><?php echo $counter ?></td>
                          <td align="center"><?php echo $data->coursecode ?></td>
                          <td>
                            <a style="color: #337ab7;" href="{{ URL::to('/') }}<?=(isset($data->coursecode))?'/coursedetail/'.$data->coursecode:'/browsecourses/';?>">
                            <?php echo $data->title ?>
                          </td>
                          <td><?php echo $data->courselecturer ?></td>
                          <td style="text-align: right;"><?=(isset($data->currencysymbol))?$data->currencysymbol:'US$';?><?php echo number_format($data->price,2,'.',',') ?></td>
                          <td align="center"><?php if ($data->start_date != '') { echo date("d-m-Y", strtotime($data->start_date)); } ?></td>
                          <td align="center"><?php if ($data->end_date != '') { echo date("d-m-Y", strtotime($data->end_date)); }  ?></td>
                          <?php if (isset($data->enroller_id)) {?>
                            <td align="center"><a href="#" style="color: #337ab7;" onclick="return show_enrolledusers_modal('<?php echo $data->users_id?>','<?php echo $data->course_id?>','<?php echo $data->enroller_id ?>','<?php echo $data->enroller ?>','<?php echo $data->enroller_email ?>','<?php echo $data->enroller_organization ?>','<?php echo $data->enroller_country ?>', '<?php echo $data->enroller_phone?>', '<?php echo $data->enroller_occupation?>')"><?php echo count(explode(';', $data->enroller_id)); ?></a></td>
                          <?php } else {?>
                            <td align="center">0</td>
                          <?php } ?>
                          <td align="center">
                            <?php 
                              if ($data->type == 0) {
                                echo "Offline";
                              } elseif ($data->type == 1) {
                                echo "Online";
                              }
                            ?>
                          </td>
                          <td align="center">
                            <?php 
                              if ($data->status == 0) {
                                echo "Inactive";
                              } elseif ($data->status == 4) {
                                echo "Cancelled";
                              } elseif ($data->status == 1) {
                                echo "Active";
                              } elseif ($data->status == 3) {
                                echo "Completed";
                              }
                            ?>
                          </td>
                          <td class="util-text-align-center">
                            <i class="fa fa-pencil administrator-course-edit" aria-hidden="true" data-issfc = "<?php echo $data->sfc;?>" data-isfeatured = "<?php echo $data->isfeatured;?>" data-cid = "<?php echo $data->course_id;?>" data-code = "<?php echo $data->coursecode;?>" data-title = "<?php echo $data->title;?>" data-lecturer = "<?php echo $data->courselecturer;?>" data-currency = "<?php echo $data->currency_id?>" data-price = "<?php echo $data->price;?>" data-type = "<?php echo $data->type;?>" data-status = "<?php echo $data->status;?>" data-start = "<?php if ($data->start_date != '') { echo date("d-m-Y", strtotime($data->start_date)); } ?>" data-end = "<?php if ($data->end_date != '') { echo date("d-m-Y", strtotime($data->end_date)); } ?>" data-cat = '<?php echo $data->category ?>' data-cover = "<?php echo $data->image ?>"></i> 
                          </td>
                        </tr>
                      <?php $counter++; }?>     
                    <?php } else { $flag = false;?>
                        <!-- <tr>
                          <td colspan = 11 class="no-border" align="center"><b>No Courses</b></td>
                        </tr> -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <?php if ($users->type == 1) {?>
            <div class = "tab-pane fade in" id = 'enroll'>
              <div class="administrator-table top bottom left-border right-border">
                <table class="table table-bordered table-hover" id = 'enroll-course-manager-table'>
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Code</th>
                      <th class="min-width-120">Title</th>
                      <th class="min-width-120">Creator</th>
                      <th class="min-width-120">Signups</th>
                      <th class="min-width-120">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($enrolled_courses) && (count($enrolled_courses) > 0)) { ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($enrolled_courses as $data) { ?>
                        <?php if (isset($data->enroller_id) ) {?>
                        <tr>
                          <td align="center"><?php echo $counter ?></td>
                          <td align="center"><?php echo $data->coursecode ?></td>
                          <td>
                            <a style="color: #337ab7;" href="{{ URL::to('/') }}<?=(isset($data->coursecode))?'/coursedetail/'.$data->coursecode:'/browsecourses/';?>">
                            <?php echo $data->title ?>
                          </td>
                          <td><?php echo $data->courselecturer ?></td>
                          <td align="center"><a href="#" style="color: #337ab7;" onclick="return show_enrolledusers_modal('<?php echo $data->users_id?>','<?php echo $data->course_id?>','<?php echo $data->enroller_id ?>','<?php echo $data->enroller ?>','<?php echo $data->enroller_email ?>','<?php echo $data->enroller_organization ?>','<?php echo $data->enroller_country ?>', '<?php echo $data->enroller_phone?>', '<?php echo $data->enroller_occupation?>',true)"><?php echo count(explode(';', $data->enroller_id)); ?></a></td>
                          <td align="center">
                            <?php 
                              if ($data->status == 0) {
                                echo "Inactive";
                              } elseif ($data->status == 1) {
                                echo "Active";
                              } elseif ($data->status == 3) {
                                echo "Completed";
                              } elseif($data->status == 4) {
                                echo "Cancelled";
                              }
                            ?>
                          </td>
                        </tr>
                      <?php $counter++; }}?>     
                    <?php } else { $flag = false;?>
                        <!-- <tr>
                          <td colspan = 6 class="no-border" align="center"><b>No Courses</b></td>
                        </tr> -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>