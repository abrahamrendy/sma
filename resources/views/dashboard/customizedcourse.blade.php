      <!-- standard and simple pop-up -->
      <div id="customized-standard-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="account-modal-content">
          <div class="account-modal-content-small" style="width: 35%">

            <!-- ACCEPTED POP-UP & SCHEDULE APPOINTMENT POP-UP -->
            <div id = "accepted-request" class="row modal-body hide">
              <div class="add-online-course-modal-content-title bottom">
                Schedule Appointment
              </div>
              <form id ='schedule-appointment-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="pid" value="">
                <div class="col-md-12 util-text-align-left">
                  <label>Date & time</label>
                </div>
                <div class="col-md-5">
                  <input class="form-control modaldatepicker" id="schedule-date" name="schedule-date" type="text">
                </div>
                <div class="col-md-1 util-font-size-11 no-padding" style="padding-top: 5px;">
                  <label>@</label>
                </div>
                <div class="col-md-2 no-padding" style="padding-right: 5px">
                  <input class="form-control" id="" name="appointment-hour" type="number" min="1" max="12" oninput="if(parseInt(this.value,10)<10)this.value='0'+this.value; maxLengthCheck(this)">
                </div>
                <div class="col-md-2 no-padding" style="padding-right: 5px">
                  <input class="form-control" id="" name="appointment-minute" type="number" min="0" max="59" oninput="if(parseInt(this.value,10)<10)this.value='0'+this.value; maxLengthCheck(this)">
                </div>
                <div class="col-md-2 no-padding" style="padding-left: 0px">
                  <select class="form-control" name="appointment-ampm">
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                  </select>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-5">
                    <label>Location</label>
                    <input class="form-control" id="" name="appointment-location" type="text">
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                    <label>Postal code</label>
                    <input class="form-control" id="" name="appointment-postal" type="text">
                  </div>
                </div>
                <div class="col-md-12 no-padding">
                  <button type="button" id="submit-appointment" class="btn btn-blue view-proposal-btn send-schedule standard-modal-button">Send</button>
                </div>
              </form>
            </div>

            <!-- REJECTED POP-UP -->
            <div id = "rejected-request" class="row modal-body hide">
              <div class="add-online-course-modal-content-title bottom">
                What do you think can be improved from this proposal?
              </div>
              <form id = 'rejected-request-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="pid" value="">
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Feedback</label>(optional)
                  <textarea class="form-control" id="" name="feedback" rows="4"> </textarea>
                </div>
                <div class="col-md-12 no-padding">
                   <button type="button" id="submit-feedback" class="btn btn-blue view-proposal-btn send-schedule standard-modal-button">Send</button>
                </div>
              </form>
            </div>

            <!-- READ MORE PROPOSAL POP-UP -->
            <div id = "read-more-proposal" class="row modal-body hide">
              <div class="add-online-course-modal-content-title util-font-black">
                <span id = 'rmp-title'>The Art and Craft of Storytelling</span>
                <div class="subtitle util-font-weight-normal">
                  <span id = 'rmp-organization'>Performanalytics</span>
                </div>
                <div class="subtitle icon-part util-font-size-11">
                  <img src="{{ URL::to('/') }}/img/spot-icon-min.png" style="width: 16px">
                    <span id ='rmp-location'>Singapore</span>
                </div>
                <div id='rmp-status'>
                  <!--APPEND READMORE STATUS-->
                </div>
              </div>
              <div class="col-md-12 util-text-align-left top bottom" style="padding: 20px 10px">
                <span id='rmp-desc'>Product doesn’t sell; emotion does. The ability to craft and tell a story that links your audience to your product is essential for anyone in sales. This 8-hour workshop breaks down the process into the craft of storytelling – forms, designs, approaches; and the art of storytelling – speaking from the heart, finding joy in your tale, using your voice effectively for impact</span>
              </div>
              <div class="col-md-12 pdfproposal center">
                <div class="col-md-3 no-padding">
                  <a>
                    <img src="{{ URL::to('/') }}/img/pdficon-min.png" alt="your image" align="middle" />
                    <span class="pdfitemname">Traineeprofiles.pdf</span>
                  </a>
                </div>
                <div class="col-md-3 no-padding">
                  <a>
                    <img src="{{ URL::to('/') }}/img/pdficon-min.png" alt="your image" align="middle" />
                    <span class="pdfitemname">Traineeprofiles.pdf</span>
                  </a>
                </div>
              </div>
              <div class="hide col-md-12 util-font-size-11" style="padding-top: 15px;">
                <span style="text-decoration: underline; font-weight: 700">Download ></span>
              </div>
              <div class="col-md-12 no-padding">
                <button type="button" id = 'accept-proposal-my-requests' class="btn btn-blue view-proposal-btn standard-modal-button">Accept</button>
                <button type="button" id = 'reject-proposal-my-requests' class="btn standard-modal-button transparent-blue-btn">Reject</button>
              </div>
            </div>

            <!-- RESCHEDULE POP-UP -->
            <div id = "reschedule-proposal" class="row modal-body hide">
              <div class="add-online-course-modal-content-title">
                A rescheduled appointment
                <br>
                has been suggested
              </div>
              <div class="col-md-12 subtitle util-font-size-11 top bottom" style="padding: 20px 10px">
                <span>26 September 2017</span>,
                <br>
                <span>13:00</span>,
                <br>
                <span>SPACES City Hall Singapore - 188726</span>
              </div>
              <div class="col-md-12 no-padding">
                <button type="button" class="btn btn-blue view-proposal-btn standard-modal-button">Accept</button>
                <button type="button" class="btn standard-modal-button transparent-blue-btn">Reschedule</button>
              </div>
            </div>

            <!-- SUGGESTED APPOINTMENT ACCEPTED POP-UP -->
            <div id = "accepted-appointment-proposal" class="row modal-body hide">
              <div class="icon-part" style="margin-top: 50px;">
                  <img src="{{ URL::to('/') }}/img/accept-icon-min.png">
              </div>
              <div class="add-online-course-modal-content-title">
                Your suggested appointment
                <br>
                has been accepted
              </div>
            </div>

            <!-- APPROVED SCHEDULE POP-UP -->
            <div id = "approved-reschedule-proposal" class="row modal-body hide">
              <div class="add-online-course-modal-content-title">
                Congratulations your proposal
                <br>
                was accepted
              </div>
              <div class="col-md-12 util-font-size-11 top" style="padding: 20px 10px">
                Appointment has been suggested with these details
              </div>
              <div class="col-md-12 subtitle util-font-size-11 top bottom" style="padding: 20px 10px">
                <span id= 'mp-time'>26 September 2017</span>,
                <br>
                <span id= 'mp-clock'>13:00</span>,
                <br>
                <span id= 'mp-location'>SPACES City Hall Singapore - 188726</span>
              </div>
              <div class="col-md-12 no-padding">
                <button type="button" id = 'approved-schedule-accept-btn' class="btn btn-blue view-proposal-btn standard-modal-button">Accept</button>
                <button type="button" id = 'approved-schedule-reschedule-btn' class="btn standard-modal-button transparent-blue-btn">Reschedule</button>
              </div>
            </div>

            <!-- FEEDBACK POP-UP -->
            <div id = "rejected-feedback" class="row modal-body hide">
              <div class="add-online-course-modal-content-title">
                Feedback
              </div>
              <div class="col-md-12 util-font-size-11 top feedback-content" style="padding: 20px 10px">
                Appointment has been suggested with these details
              </div>
              <div class="col-md-12 no-padding">
                <button type="button" id = 'rejected-feedback-close-btn' class="btn btn-blue view-proposal-btn standard-modal-button">Close</button>
              </div>
            </div>

            <!-- READ MORE OTHER REQUEST POP-UP -->
            <div id = "read-more-other-proposal" class="row modal-body hide">
              <div class="add-online-course-modal-content-title util-font-black">
                <span id="bor_title">Strategic Plan</span>
                <div id = 'bor_organization' class="subtitle util-font-weight-normal">
                  Ataari
                </div>
                <div id = 'bor_location' class="subtitle icon-part util-font-size-11">
                  <img src="{{ URL::to('/') }}/img/spot-icon-min.png" style="width: 16px">
                    <span>Singapore</span>
                </div>
              </div>

              <div class="col-md-12 util-text-align-left top bottom" style="padding: 20px 30px">
                <span id= 'bor_desc'>Scope of work required, free-text descriptions</span>
                <div class="icon-part col-md-12 no-padding util-text-align-left" style="padding-top: 15px">
                  <div class="col-md-12 util-margin-top-10" id ='bor_date'>
                    <img class = "util-img-width-25" src="{{ URL::to('/') }}/img/date-icon-min.png">
                    <span>17-19 April, 2017</span>
                  </div>
                  <div class="col-md-12 util-margin-top-10" id ='bor_participants'>
                    <img class = "util-img-width-25" src="{{ URL::to('/') }}/img/qty-min.png" style="width: 31px !important;">
                    <span style="margin-left: 5px;">50 persons</span>
                  </div>
                  <div class="col-md-12 util-margin-top-10" id ='bor_budget'>
                    <img class = "util-img-width-25" src="{{ URL::to('/') }}/img/money-bag-min.png">
                    <span>S$1200</span>
                  </div>
                </div>
              </div>

              <div class="col-md-12 util-margin-top-10" style="padding-top: 10px;">
              </div>
              <div class="col-md-12 pdfproposal center">
                <div class="col-md-3 no-padding pdffiles">
                  <a>
                    <img src="{{ URL::to('/') }}/img/pdficon-min.png" alt="your image" align="middle" />
                    <span class="pdfitemname">Traineeprofiles.pdf</span>
                  </a>
                </div>
                <div class="col-md-3 no-padding pdffiles">
                  <a>
                    <img src="{{ URL::to('/') }}/img/pdficon-min.png" alt="your image" align="middle" />
                    <span class="pdfitemname">Traineeprofiles.pdf</span>
                  </a>
                </div>
              </div>

              <div class="col-md-12 no-padding">
                <button id = 'submit-proposal' type="button" class="btn btn-blue view-proposal-btn standard-modal-button">Submit Proposal</button>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end of standard and simple pop-up -->

      <!-- start add proposal modal -->
      <div id="add-proposal-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="account-modal-content">
          <div class="account-modal-content-small" style="width: 50%">

            <div class="row modal-body">
              <div class="add-online-course-modal-content-title bottom">
                Proposal for Customized Courses
              </div>
              <!-- <div class="col-md-12"> -->
                <form id = "add-proposal-form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="ccid" value="">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="add-proposal-title" class="required">Title</label>
                      <input type="text" class="form-control" id="add-proposal-title" name = "proposal-title" required/>
                    </div>
                    <div class="form-group">
                      <label for="add-proposal-desc" class="required">Description</label>
                      <textarea class="form-control" id="add-proposal-desc" name = "proposal-desc" rows="5" placeholder="Require minimum 100 words" minlength= "100" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-1">
                  </div>
                  <div class="col-md-3">
                    <div class="left-border right-border top bottom" style="padding: 50px 0px 50px 0px;">
                      <img id="blah" src="{{ URL::to('/') }}/img/pdficon-min.png" alt="your image" style="width: 45%" />
                      <span id="submitproposal_pdf_names" style="display: none; margin-left: 30px"></span>
                    </div>
                    <label class="custom-file-upload">
                      <!-- <input type="file" class="hide" onchange="readPDF(this)" id="requestcustomized_pdf" name="requestcustomized_pdf[]" multiple=""> -->
                      <input type='file' class = "hide" onchange="readPDFProposal(this);" name="submitproposal_pdf[]" id = 'submitproposal_pdf' multiple="" accept="application/pdf" />
                      Upload
                    </label>
                  </div>
                  <div class="col-md-12" style="margin-top: 20px; padding-bottom: 20px">
                    <button id = 'confirm-form-proposal' type="submit" class="btn btn-default btn-post" onclick="return checkWordCount('add-proposal-desc');">SUBMIT</button>
                  </div>
                  <span class="close delete-proposal-pdf" style="display: none;right: 37px;top: 32%;"></span>
                </form>
              <!-- </div> -->
            </div>

          </div>
        </div>
      </div>
      <!-- emd add proposal modal -->

      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Customized Courses
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#myrequest'>
                <img src="{{ URL::to('/') }}/img/request-min.png">
                My Request
              </a>
            </div>
            <div class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#myproposal">
                <img src="{{ URL::to('/') }}/img/proposal-min.png">
                My Proposal
              </a>
            </div>
            <div class="box-content dashboard-tabs" style="width: 38%">
              <a data-toggle="tab" href="#browseotherrequest">
                <img src="{{ URL::to('/') }}/img/available-min.png" style="width: 9%">
                Browse Other Requests
              </a>
            </div>
          </div>


          <div class="tab-content">
            <!-- My Request Tab -->
            <div id = 'myrequest' class = "tab-pane fade in active">

              <!-- If there is requested course -->
              <?php if (isset($course_requests) && count($course_requests) > 0) {?>
                  <div id="exist-customized" class="">
                            <div class="hide col-md-12 completed-table top bottom left-border right-border">
                                <div class="completed-content col-md-12 no-padding">
                                  <div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">
                                    <div class="subtitle">Mastery of Facilitation</div>
                                    <div class="description col-md-7 no-padding">
                                      The 2-day workshop will equip participants with the skills and strategies to facilitate groups to better solve problems and make effective decisions...
                                    </div>
                                    <div class="col-md-2 no-padding" style="padding-left: 15px">
                                      <button type="button" class="btn btn-blue btn-blue-dark edit-btn edit-request">Edit</button>
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0px; padding-left: 5px">
                                      <button type="button" id="view-proposal" class="btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown">View Proposal <span class="proposal-notif">2</span></button>
                                      <!-- start view proposal dropdown -->
                                        <ul class="dropdown-menu view-proposal-dropdown" role="menu">
                                          <li class="container col-md-12">
                                            <table class="table">
                                              <tbody>
                                                <tr>
                                                  <th>Title</th>
                                                  <td>: The Art and Craft of Storytelling</td>
                                                  <td rowspan="3" style="vertical-align: middle;"><button type="button" class="btn btn-blue view-proposal-btn read-more-proposal">Read More</button></td>
                                                </tr>
                                                <tr>
                                                  <th>Company Name</th>
                                                  <td>: BIT Healthcare</td>
                                                </tr>
                                                <tr>
                                                  <th>Description</th>
                                                  <td><div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: 28em">: We work together as a team since 2006 and keep improving keep improving keep improving </div></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </li>
                                          <li class="container col-md-12">
                                            <table class="table top">
                                              <tbody>
                                                <tr>
                                                  <th>Title</th>
                                                  <td>: The Art and Craft of Storytelling</td>
                                                  <td rowspan="3" style="vertical-align: middle;"><button type="button" class="btn btn-blue view-proposal-btn read-more-proposal">Read More</button></td>
                                                </tr>
                                                <tr>
                                                  <th>Company Name</th>
                                                  <td>: BIT Healthcare</td>
                                                </tr>
                                                <tr>
                                                  <th>Description</th>
                                                  <td><div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: 28em">: We work together as a team since 2006 and keep improving keep improving keep improving </div></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </li>
                                      </ul>
                                    <!-- End view proposal dropdown -->
                                    </div>
                                  </div>
                                  <div class="icon-part col-md-12 no-padding" style="padding-top: 15px">
                                    <div class="col-md-2">
                                      <img src="{{ URL::to('/') }}/img/money-bag-min.png">
                                      <span>S$1200</span>
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0px">
                                      <img src="{{ URL::to('/') }}/img/qty-min.png" style="width: 19%">
                                      <span>50 persons</span>
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0px">
                                      <img src="{{ URL::to('/') }}/img/book-icon-min.png" style="padding-right: 0px">
                                      <span>Entrepreneurship</span>
                                    </div>
                                    <div class="col-md-3">
                                      <img src="{{ URL::to('/') }}/img/date-icon-min.png">
                                      <span>17-19 April, 2017</span>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    <?php foreach ($course_requests as $data) { ?>
                            <div class="col-md-12 completed-table top bottom left-border right-border">
                                <div class="completed-content col-md-12 no-padding">
                                  <div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">
                                    <div class="subtitle"><?php echo $data->description;?></div>
                                    <div class="description col-md-7 no-padding">
                                      <?php echo $data->additional_info?>
                                    </div>
                                    <div class="col-md-2 no-padding" style="padding-left: 15px">
                                      <button type="button" class="btn btn-blue btn-blue-dark edit-btn edit-request" data-id= "<?php echo $data->id?>" data-desc = "<?php echo $data->description?>" data-addinfo = "<?php echo $data->additional_info?>" data-currency = "<?php echo $data->currency_id?>" data-budget = "<?php echo number_format($data->budget,0,'','');?>" data-participant = "<?php echo $data->participants?>" data-area="<?php echo $data->area_of_training?>" data-confidentiality = "<?php echo $data->confidentiality?>" data-start_date = "<?php if ($data->start_date != '') { echo date("l, F d, Y", strtotime($data->start_date));}?>" data-end_date = "<?php if ($data->end_date != '') {echo date("l, F d, Y", strtotime($data->end_date));}?>" data-pdf = "<?php echo $data->pdf?>">Edit</button>
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0px; padding-left: 5px">
                                      <!-- <button type="button" class="view-proposal btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown">View Proposal <span class="proposal-notif">2</span></button> -->
                                      <!-- <button type="button" class="view-proposal btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown" disabled>View Proposal</span></button> -->

                                      <?php if ($data->proposal_id != null) { ?>
                                        <?php 
                                          $split_id = explode(';', $data->proposal_id);
                                          $split_title = explode(';', $data->proposal_title);
                                          $split_desc = explode(';', $data->proposal_desc);
                                          $split_pdf = explode(';', $data->proposal_pdf);
                                          $split_status = explode(';', $data->proposal_status);
                                          $split_organization = explode(';', $data->proposal_organization);
                                          $split_country = explode(';', $data->proposal_country);
                                          $total = count($split_title);
                                          $total_status = 0;
                                          for ($j=0; $j < $total; $j++) { 
                                            if ($split_status[$j] != 3) {
                                              $total_status++;
                                            }
                                          }
                                        ?>
                                        <?php if ($total_status != 0) { ?>
                                          <button type="button" class="view-proposal btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown">View Proposal <span class="proposal-notif"><?php echo $total_status?></span></button>
                                          <!-- start view proposal dropdown -->
                                          <ul class="dropdown-menu view-proposal-dropdown" role="menu">
                                              <?php 
                                                for ($i=0; $i < $total; $i++) { 
                                                  if ($split_status[$i] != 3) {
                                                ?>
                                                <li class="container col-md-12">
                                                  <table class="table <?php if ($i > 0) { echo "top";}?>">
                                                    <tbody>
                                                      <tr>
                                                        <th>Title</th>
                                                        <td>: <?php echo $split_title[$i]?></td>
                                                        <td rowspan="2" style="vertical-align: middle;">
                                                          <button type="button" class="btn btn-blue view-proposal-btn read-more-proposal" data-title = "<?php if (isset($split_title[$i])){echo $split_title[$i];}?>" data-desc = "<?php if (isset($split_desc[$i])){echo $split_desc[$i];}?>"  data-pid = "<?php echo $split_id[$i]?>" data-organization = "<?php echo $split_organization[$i]?>" data-country = "<?php echo $split_country[$i]?>" data-status = '<?php echo $split_status[$i];?>' data-pdf = "<?php if (isset($split_pdf[$i])){ echo $split_pdf[$i];}?>">Read More</button>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th>Company Name</th>
                                                        <td>: <?php echo $split_organization[$i]?></td>
                                                      </tr>
                                                      <tr>
                                                        <th>Description</th>
                                                        <td><div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: 28em">: <?php if (isset($split_desc[$i])){echo $split_desc[$i];}?> </div></td>
                                                        <td style="vertical-align: middle;">
                                                          <?php
                                                            switch ($split_status[$i]) {
                                                              case '0':
                                                                echo '<button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" disabled>PENDING REVIEW</button>';
                                                                break;
                                                              case '1':
                                                                echo '<button type="button" class="btn btn-blue view-proposal-btn" disabled ><img class="checklist-btn-icon" src="'.URL::to('/').'/img/ceklis-copy-min.png" />ACCEPTED</button>';
                                                                break;
                                                              case '2':
                                                                 echo '<button type="button" class="btn rejected-btn" disabled><img class="checklist-btn-icon" src="'. URL::to("/").'/img/xicon-min.png" />REJECTED</button>';
                                                                break;
                                                              default:
                                                                echo "No Status Available";
                                                                break;
                                                            }
                                                          ?>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </li>
                                               <?php } } ?>
                                          </ul>
                                          <!-- End view proposal dropdown -->
                                        <?php } else { ?>
                                          <button type="button" class="view-proposal btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown" disabled>View Proposal</span></button>
                                        <?php } ?>
                                      
                                      <?php } else { ?>
                                        <button type="button" class="view-proposal btn btn-blue view-proposal-btn dropdown-toggle" data-toggle="dropdown" disabled>View Proposal</span></button>
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class="icon-part col-md-12 no-padding" style="padding-top: 15px">
                                    <div class="col-md-2 <?php if(number_format($data->budget,0,'','') == 0 ) { echo "hide";}?>" style="text-align: left;">
                                      <img src="{{ URL::to('/') }}/img/money-bag-min.png">
                                      <span><?=(isset($data->currencysymbol))?$data->currencysymbol:'US$';?><?php echo number_format($data->budget,0,'','')?></span>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                      <img src="{{ URL::to('/') }}/img/qty-min.png" style="width: 23%">
                                      <span><?php echo $data->participants?> persons</span>
                                    </div>
                                    <div class="col-md-4" style="padding-right: 0px; text-align: center;">
                                      <img src="{{ URL::to('/') }}/img/book-icon-min.png" style="width: 7%">
                                      <?php
                                        $cat = explode(',', $data->category_names);
                                        $total_cat = count($cat);
                                      ?>
                                      <?php?>
                                      <span><?php echo $cat[0]?></span>
                                      <br>
                                      <?php if ($total_cat > 1) {?>
                                        <span style="font-size: 0.8em;">and <?php echo ($total_cat-1)?> more</span>
                                      <?php } ?>
                                    </div>
                                    <div class="col-md-4" style="text-align: left;">
                                      <img src="{{ URL::to('/') }}/img/date-icon-min.png" style="width: 9%">
                                      <span>
                                        <?php if ($data->start_date != null && $data->end_date != null){?>
                                          <?php if (date("n", strtotime($data->start_date)) == date("n", strtotime($data->end_date))) {
                                                    if (date('d',strtotime($data->start_date)) == date('d', strtotime($data->end_date))) {
                                                      echo date('d F, Y', strtotime($data->start_date));
                                                    } else {
                                                      echo date('d', strtotime($data->start_date)). '-' . date('d F, Y', strtotime($data->end_date)) ;
                                                    }
                                                } else {
                                                    echo date('d F', strtotime($data->start_date)). ' - ' . date('d F, Y', strtotime($data->end_date)) ;
                                                }?>
                                        <?php } else {
                                            if ($data->start_date != null) {
                                              echo date('d F, Y', strtotime($data->start_date));
                                            } else {
                                              echo "-";
                                            }
                                          }?>

                                      </span>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    <?php } ?>
                  </div>
              <!-- End existed course -->
              <?php } else {?>
                  <!-- Requested Courses Section -->
                  <div id="no-customized">
                    <div class="col-md-12 billing-table top bottom left-border right-border">
                        SUBMIT YOUR REQUEST FOR CUSTOMIZED COURSE TODAY
                    </div>
                  </div>
              <?php } ?>

              <div class="col-md-12 no-padding" style="margin-top: 15px;">
                <button type="button" id= "add-my-request-btn" class="btn btn-blue btn-submit-settings"><img class="" src="{{ URL::to('/') }}/img/plus-min.png" style="width: 3%"></button>
              </div>
              <!-- End of Requested Courses Section -->

              <!-- Completed Section -->
              <div id= "complete-section" class="top col-md-12 no-padding hide">
                <div class="subtitle util-font-weight-normal">
                  Completed
                </div>
                <div class="col-md-12 completed-table top bottom left-border right-border">
                    <div class="completed-content col-md-12 no-padding">
                      <div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">
                        <div class="subtitle">Mastery of Facilitation</div>
                        <div class="description col-md-9 no-padding">
                          The 2-day workshop will equip participants with the skills and strategies to facilitate groups to better solve problems and make effective decisions...
                        </div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-blue btn-blue-dark completed-btn" disabled>COMPLETED</button>
                        </div>
                      </div>
                      <div class="icon-part col-md-12 no-padding" style="padding-top: 15px">
                        <div class="col-md-2">
                          <img src="{{ URL::to('/') }}/img/money-bag-min.png">
                          <span>S$1200</span>
                        </div>
                        <div class="col-md-3" style="padding-right: 0px;">
                          <img src="{{ URL::to('/') }}/img/qty-min.png" style="width: 19%">
                          <span>50 persons</span>
                        </div>
                        <div class="col-md-3" style="padding-right: 0px">
                          <img src="{{ URL::to('/') }}/img/book-icon-min.png">
                          <span>Entrepreneurship</span>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ URL::to('/') }}/img/date-icon-min.png" style="width: 9%;">
                          <span>17-19 April, 2017</span>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- End of Completed Section -->
            </div>
            <!-- End of My Request Tab -->

            <!-- My Proposal Tab -->
            <div id = 'myproposal' class = "tab-pane fade in">

              <!-- Proposal Exists Section -->
              <?php if (isset($course_proposals) && count($course_proposals)>0) {?>
                <div id="exist-proposal" class="">
                  <div class="hide col-md-12 completed-table top bottom left-border right-border">
                      <div class="completed-content col-md-12 no-padding">
                        <div class="text-part col-md-12 no-padding">
                          <div class="description col-md-7 no-padding">
                            <div class="subtitle">Mastery of Facilitation</div>
                          </div>
                          <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                            <button type="button" class="btn btn-blue view-proposal-btn"><img class="checklist-btn-icon" src="{{ URL::to('/') }}/img/ceklis-copy-min.png" />ACCEPTED</button>
                          </div>
                          <div class="col-md-1">
                            <a href="#" class="set-appointment">
                              <img class = "bell-icon-notif" src="{{ URL::to('/') }}/img/bellicon-min.png">
                              <img class = "proposal-calendar-icon" src="{{ URL::to('/') }}/img/calendarwithdotted-min.png">
                            </a>
                          </div>
                          <div class="col-md-2 no-padding">
                            <div class="subtitle util-font-size-11">Set Appointment</div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="hide col-md-12 completed-table top bottom left-border right-border">
                      <div class="completed-content col-md-12 no-padding">
                        <div class="text-part col-md-12 no-padding">
                          <div class="description col-md-7 no-padding">
                            <div class="subtitle">Mastery of Facilitation</div>
                          </div>
                          <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                            <button type="button" class="btn transparent-blue-btn">ACCEPTED</button>
                          </div>
                          <div class="col-md-1">
                            <a href = '#' class = "proposal-approved-btn"><img class = "proposal-calendar-icon" src="{{ URL::to('/') }}/img/calendarwithdotted-min.png"></a>
                          </div>
                          <div class="col-md-2 no-padding">
                            <div class="subtitle util-font-size-11">30 September 2017</div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="hide col-md-12 completed-table top bottom left-border right-border">
                      <div class="completed-content col-md-12 no-padding">
                        <div class="text-part col-md-12 no-padding">
                          <div class="description col-md-7 no-padding">
                            <div class="subtitle">Mastery of Facilitation</div>
                          </div>
                          <div class="col-md-3" style="padding-right: 0px; padding-left: 5px">
                            <button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" disabled>PENDING REVIEW</button>
                          </div>
                          <div class="col-md-2 no-padding" style="padding-left: 15px">
                            <button type="button" class="btn cancel-btn">Cancel</button>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="hide col-md-12 completed-table top bottom left-border right-border">
                      <div class="completed-content col-md-12 no-padding">
                        <div class="text-part col-md-12 no-padding">
                          <div class="description col-md-7 no-padding">
                            <div class="subtitle">Mastery of Facilitation</div>
                          </div>
                          <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                            <button type="button" class="btn rejected-btn" disabled><img class="checklist-btn-icon" src="{{ URL::to('/') }}/img/xicon-min.png" />REJECTED</button>
                          </div>
                          <div class="col-md-3 no-padding" style="padding-left: 15px">
                            <button type="button" class="btn cancel-btn">Remove from the list</button>
                          </div>
                        </div>
                      </div>
                  </div>
                  <?php foreach ($course_proposals as $data) { ?>
                    <?php if ($data->status != 3) { ?>
                      <div class="col-md-12 completed-table top bottom left-border right-border">
                          <div class="completed-content col-md-12 no-padding">
                            <div class="text-part col-md-12 no-padding">
                              <span class="hide cpid"><?php echo $data->id?></span>
                              <span class="hide crid"><?php echo $data->course_request_id?></span>
                              <div class="description col-md-7 no-padding">
                                <div class="subtitle"><?php echo $data->title ?></div>
                                <div class="col-xs-12">Proposal for : <?php echo "<strong>".$data->course_desc."</strong>"?></div>
                              </div>
                              <?php if ($data->status == 0) {?>
                                <!-- PENDING REVIEW -->
                                <div class="col-md-3" style="padding-right: 0px; padding-left: 5px">
                                  <button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" disabled>PENDING REVIEW</button>
                                </div>
                                <div class="col-md-2 no-padding" style="padding-left: 15px">
                                  <button type="button" class="btn cancel-btn cancel-proposal">Cancel</button>
                                </div>
                              <?php } else { ?>
                                <?php if ($data->status == 1) {?>
                                  <!-- ACCEPTED -->
                                  <?php if ($data->appointment_time == null) {?>
                                          <!-- NOT SET APPOINTMENT -->
                                          <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                                            <button type="button" class="btn-blue view-proposal-btn btn-disabled-nochange" disabled><img class="checklist-btn-icon" src="{{ URL::to('/') }}/img/ceklis-copy-min.png" />ACCEPTED</button>
                                          </div>
                                          <div class="col-md-1">
                                            <span class="set-appointment" style="cursor: pointer;" data-pid = '<?php echo $data->id ?>'>
                                              <img class = "bell-icon-notif" src="{{ URL::to('/') }}/img/bellicon-min.png">
                                              <img class = "proposal-calendar-icon" src="{{ URL::to('/') }}/img/calendarwithdotted-min.png">
                                            </span>
                                          </div>
                                          <div class="col-md-2 no-padding set-appointment" style="cursor: pointer;" data-pid = '<?php echo $data->id ?>'">
                                            <div class="subtitle util-font-size-11">Set Appointment</div>
                                          </div>
                                  <?php } else {?>
                                          <!-- APPOINTMENT SET -->
                                          <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                                            <button type="button" class="transparent-blue-btn btn-disabled-nochange" disabled>ACCEPTED</button>
                                          </div>
                                          <div class="col-md-1">
                                            <span class = "proposal-approved-btn" style="cursor: pointer" data-pid = '<?php echo $data->id ?>' data-time = "<?php echo date('j F Y', strtotime($data->appointment_time))?>" data-clock = "<?php echo date('H:i', strtotime($data->appointment_time))?>" data-location = "<?php echo $data->appointment_location?>-<?php echo $data->appointment_postal?>"><img class = "proposal-calendar-icon" src="{{ URL::to('/') }}/img/calendarwithdotted-min.png"></span>
                                          </div>
                                          <div class="col-md-2 no-padding">
                                            <div class="subtitle util-font-size-11 proposal-approved-btn" style="cursor: pointer;" data-pid = '<?php echo $data->id ?>' data-time = "<?php echo date('j F Y', strtotime($data->appointment_time))?>" data-clock = "<?php echo date('H:i', strtotime($data->appointment_time))?>" data-location = "<?php echo $data->appointment_location?>-<?php echo $data->appointment_postal?>"><?php echo date('j F Y', strtotime($data->appointment_time))?></div>
                                          </div>
                                  <?php }?>
                                <?php } else { ?>
                                    <!-- REJECTED -->
                                    <div class="col-md-2" style="padding-right: 0px; padding-left: 5px">
                                      <button type="button" class="btn rejected-btn" disabled><img class="checklist-btn-icon" src="{{ URL::to('/') }}/img/xicon-min.png" />REJECTED</button>
                                    </div>
                                    <div class="col-md-2 no-padding" style="padding-left: 15px">
                                      <button type="button" class="btn cancel-btn view-feedback" data-feedback = '<?php echo $data->feedback?>'>View Feedback</button>
                                    </div>
                                    <div class="col-md-1 no-padding" style="padding-top:10px;padding-left: 15px">
                                      <img src="{{ URL::to('/')}}/img/trash-min.png" class="remove-proposal" style="width:47%;cursor: pointer;">
                                    </div>
                                <?php } ?>
                              <?php }?>
                            </div>
                          </div>
                      </div>
                    <?php } ?>
                  <?php } ?>
                </div>
                <!-- End of Proposal Exists Section -->
                <script type="text/javascript">
                  var user_proposal = '<?php echo count($course_proposals)?>';
                </script>
              <?php } else { ?>
                <!-- No Proposal Section -->
                <div id="no-proposal" class="">
                  <div class="col-md-12 billing-table top bottom left-border right-border">
                      BROWSE OTHER REQUESTS <br> AND SUBMIT YOUR FIRST PROPOSAL TODAY
                      <br><br>
                      <button type="button" class="btn btn-blue" id = 'no-proposal-browse'>BROWSE NOW</button>
                  </div>
                </div>
                <script type="text/javascript">
                  var user_proposal = 0;
                </script>
                <!-- End of No Proposal Section -->
              <?php } ?>
            </div>
            <!-- End of My Proposal Tab -->

            <!-- Browse Other Request Tab -->
            <div id = 'browseotherrequest' class = "tab-pane fade in">
              <div id="" class="">

                <div class="col-md-3 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name="bor_area">
                        <option value="" disabled selected style="display: none;">Area of Training</option>
                        <option value="">All</option>
                        <?php if (isset($courses_categories_filter)) {?>
                          <?php foreach ($courses_categories_filter as $cat) {?>
                                    <option value="<?php echo $cat->id?>"><?php echo $cat->name?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-2" style="padding-right: 0px">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name = 'bor_country'>
                        <option value="" disabled selected style="display: none;">Country</option>
                        <option value="">All</option>
                        <?php
                          $codes = json_decode(file_get_contents('http://country.io/iso3.json'), true);
                          $names = json_decode(file_get_contents('http://country.io/names.json'), true);
                          $iso3_to_name = array();
                          foreach($codes as $iso2 => $iso3) {
                              $iso3_to_name[$iso3] = $names[$iso2];
                          }
                        ?>
                        <?php if (isset($countries)) {?>
                          <?php foreach ($countries as $cor) {?>
                                    <option value="<?php echo $cor->country?>"><?php if (isset ($names[$cor->country])) {echo $names[$cor->country];} else {echo $cor->country;}?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div id = 'other-request-content'>
                <?php if (isset($course_other_requests) && count($course_other_requests) > 0) {?>
                  <?php foreach ($course_other_requests as $cor){?>
                              <div class="col-md-12 completed-table top bottom left-border right-border">
                                  <div class="completed-content col-md-12 no-padding">
                                    <div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">
                                      <div class="subtitle" style="padding-bottom: 0px;"><?php echo $cor->description?></div>
                                      <?php if ($cor->confidentiality == 0) { ?>
                                          <div class="subtitle util-font-size-11 util-font-weight-normal"><?php echo $cor->organization?></div>
                                      <?php } else {?>
                                          <div class="subtitle util-font-size-11 util-font-weight-normal" style="font-style: italic;">Confidential</div>
                                      <?php } ?>
                                      <div class="description col-md-8 no-padding">
                                        <?php echo $cor->additional_info?>
                                      </div>
                                      <div class="col-md-2">
                                        
                                      </div>
                                      <div class="col-md-2 no-padding" style="padding-left: 15px">
                                        <button type="button" class="read-more-other btn btn-blue view-proposal-btn" data-title = "<?php echo $cor->description?>" data-add_info = "<?php echo $cor->additional_info?>" data-participants = "<?php echo $cor->participants?>" data-start_date = "<?php if ($cor->start_date != '') { echo date("d-F-Y", strtotime($cor->start_date));}?>" data-end_date = "<?php if ($cor->end_date != '') {echo date("d-F-Y", strtotime($cor->end_date));}?>" data-cc = '<?php echo $cor->ccid?>' data-currency = "<?php echo $cor->currencysymbol?>" data-budget = "<?php echo number_format($cor->budget,0,'','');?>" data-location = "<?php if (isset ($names[$cor->country])) {echo $names[$cor->country];} else {echo $cor->country;}?>" data-organization = "<?php echo $cor->organization?>" data-pdf = "<?php echo $cor->pdf ?>">Read More</button>
                                      </div>
                                    </div>
                                    <div class="icon-part col-md-12 no-padding" style="padding-top: 15px; text-align: left">
                                      <div class="col-md-2 no-padding">
                                        <img src="{{ URL::to('/') }}/img/spot-icon-min.png" style="width: 15%">
                                        <span><?php if (isset ($names[$cor->country])) {echo $names[$cor->country];} else {echo $cor->country;}?></span>
                                      </div>
                                      <div class="col-md-2 no-padding">
                                        <img src="{{ URL::to('/') }}/img/money-bag-min.png" style="width: 18%">
                                        <?php if ($cor->budget > 0) { ?>
                                          <span><?=(isset($cor->currencysymbol))?$cor->currencysymbol:'US$';?><?php echo number_format($cor->budget,0,'','')?></span>
                                        <?php } else {?>
                                          <span style="font-style: italic;"> Confidential </span>
                                        <?php } ?>
                                      </div>
                                      <div class="col-md-8" style="padding-right: 0px;">
                                        <img src="{{ URL::to('/') }}/img/book-icon-min.png" style="width: 4%">
                                        <?php
                                          $cat = explode(',', $cor->category_names);
                                          $total_cat = count($cat);
                                        ?>
                                        <?php?>
                                        <span><?php echo $cat[0]?></span>
                                        <br>
                                        <?php if ($total_cat > 1) {?>
                                          <span style="font-size: 0.8em; margin-left: 30%">and <?php echo ($total_cat-1)?> more</span>
                                        <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                  <?php } ?>
                <?php } else { ?>
                    <div id="no-other-request">
                      <div class="col-md-12 billing-table top bottom left-border right-border">
                          OTHER REQUEST COURSES NOT FOUND
                      </div>
                    </div>
                <?php } ?>
                </div>

                <div class="col-md-12 completed-table top bottom left-border right-border hide">
                    <div class="completed-content col-md-12 no-padding">
                      <div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">
                        <div class="subtitle" style="padding-bottom: 0px;">Mastery of Facilitation</div>
                        <div class="subtitle util-font-size-11 util-font-weight-normal">Inclusive Customer Service Workshop</div>
                        <div class="description col-md-8 no-padding">
                          The 2-day workshop will equip participants with the skills and strategies to facilitate groups to better solve problems and make effective decisions...
                        </div>
                        <div class="col-md-2">
                          
                        </div>
                        <div class="col-md-2 no-padding" style="padding-left: 15px">
                          <button type="button" class="btn btn-blue view-proposal-btn">Read More</button>
                        </div>
                      </div>
                      <div class="icon-part col-md-12 no-padding" style="padding-top: 15px">
                        <div class="col-md-2">
                          <img src="{{ URL::to('/') }}/img/spot-icon-min.png" style="width: 20%">
                          <span>Singapore</span>
                        </div>
                        <div class="col-md-2">
                          <img src="{{ URL::to('/') }}/img/money-bag-min.png">
                          <span>S$1200</span>
                        </div>
                        <div class="col-md-3">
                          <img src="{{ URL::to('/') }}/img/book-icon-min.png">
                          <span>Entrepreneurship</span>
                        </div>
                      </div>
                    </div>
                </div>

              </div>
              <div class="searchcoursepagination hide">
              <div class="small">
                <ul>
                  <li class="paginationcontent left">
                    <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationleft0-min.png"></a></div>
                  </li>
                  <li class="paginationcontent active">
                    <div><a href="#"><h2>1</h2></a></div>
                  </li>
                  <li class="paginationcontent">
                    <div><a href="#"><h2>2</h2></a></div>
                  </li>
                  <li class="paginationcontent">
                    <div><a href="#"><h2>3</h2></a></div>
                  </li>
                  <li class="paginationcontent">
                    <div><a href="#"><h2>4</h2></a></div>
                  </li>
                  <li class="paginationcontent">
                    <div><a href="#"><h2>5</h2></a></div>
                  </li>
                  <li class="paginationcontent right">
                    <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationright1-min.png"></a></div>
                  </li>
                </ul>
              </div>
            </div>
            </div>
            <!-- End of Browse Other Request Tab -->
          </div>
        </div>
      </div>
    </div>
  </div>