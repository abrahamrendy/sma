      <script type="text/javascript">
        var count_courses = "<?php echo $count_courses ;?>";
      </script>

      <!-- standard and simple pop-up -->
      <div id="disclaimer-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="account-modal-content">
          <div class="account-modal-content-small" style="width: 65%">

            <!-- READ MORE PROPOSAL POP-UP -->
            <div class="row modal-body" style="color: #066FB7">
              <div class="add-online-course-modal-content-title">
                <span id = 'rmp-title'>Posting a Course at LAD</span>
              </div>
              <div class="col-md-12">
                <div class="col-md-2">
                  <img src="{{ URL::to('/') }}/img/Step1.png" />
                  <br>
                  <div class="util-margin-top-10">
                    <div class="mx-auto" style="width: 200px;">
                      <span><b>STEP 1.</b></span>
                      <br><div class="util-margin-top-10"></div>
                      <span class="">FREELY LIST YOUR COURSES</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-1 arrow-disclaimer">
                  <img src="{{ URL::to('/') }}/img/arrow_steps.svg" />
                </div>
                <div class="col-md-2">
                  <img src="{{ URL::to('/') }}/img/Step2.png" />
                  <br>
                  <div class="util-margin-top-10">
                   <div class="mx-auto" style="width: 200px;">
                      <span><b>STEP 2.</b></span>
                      <br><div class="util-margin-top-10"></div>
                      <span class="">GET REGISTRATION AND OUR TEAM WILL CONFIRM THE PAYMENT</span>
                   </div>
                  </div>
                </div>
                <div class="col-md-1 arrow-disclaimer">
                  <img src="{{ URL::to('/') }}/img/arrow_steps.svg" />
                </div>
                <div class="col-md-2">
                  <img src="{{ URL::to('/') }}/img/Step3.png" />
                  <br>
                  <div class="util-margin-top-10">
                   <div class="mx-auto" style="width: 200px;">
                      <span><b>STEP 3.</b></span>
                      <br><div class="util-margin-top-10"></div>
                      <span class="">CONFIRM THAT THE COURSE HAS TAKEN PLACE</span>
                   </div>
                  </div>
                </div>
                <div class="col-md-1 arrow-disclaimer">
                  <img src="{{ URL::to('/') }}/img/arrow_steps.svg" />
                </div>
                <div class="col-md-2 no-padding">
                  <img src="{{ URL::to('/') }}/img/Step4.png" />
                  <br>
                  <div class="util-margin-top-10">
                   <div class="mx-auto">
                      <span><b>STEP 4.</b></span>
                      <br><div class="util-margin-top-10"></div>
                      <span class="">SETTLEMENT OF PAYMENT. 10% SERVICE FEE FOR EACH REGISTRATION</span>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 util-text-align-left top bottom" style="padding: 30px 10px; margin: 20px 10px">
                <span id='rmp-desc' style="font-size: 18px">Course listing fee is absolutely free so use our platform to reach out to learners globally. LAD charges flat fee of 10% for each registration of the course and settle the payment with course creator once the course has been completed.</span>
              </div>
              <div class="col-md-12" style="padding-bottom: 30px">
                <button type="button" id = 'accept-disclaimer' class="btn btn-blue view-proposal-btn" style="font-size: 18px;">I have read and agreed to the terms of listing my course</button>
              </div>
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
            Post Course
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            @if (session('status'))
              @if (session('status') == '1' || session('status') == '3')
                <div class="box-content dashboard-active dashboard-tabs">
              @else
                <div class="box-content dashboard-tabs">
              @endif
            @else
              <div class="box-content dashboard-active dashboard-tabs">
            @endif
              <a data-toggle="tab" href = '#online'>
                <img src="{{ URL::to('/') }}/img/online-min.png">
                Online
              </a>
            </div>
            @if (session('status'))
              @if (session('status') == '2' || session('status') == '4')
                <div class="box-content dashboard-active dashboard-tabs">
              @else
                <div class="box-content dashboard-tabs">
              @endif
            @else
              <div class="box-content dashboard-tabs">
            @endif
              <a data-toggle="tab" href="#offline">
                <img src="{{ URL::to('/') }}/img/offline-icon-min.png">
                Offline
              </a>
            </div>
          </div>
          <div class="tab-content">

            @if (session('status'))
              @if (session('status') == '1' || session('status') == '3')
                <div id = 'online' class = "tab-pane fade in active">
              @else
                <div id = 'online' class = "tab-pane fade in">
              @endif
            @else
              <div id = 'online' class = "tab-pane fade in active">
            @endif
              <!-- start popular training topic section -->
              <div id = "dashboard-popular">
                <section id="priceSection">
                  @if (session('status'))
                    @if (session('status') == '1')
                      <div class="alert alert-success alert-dismissable fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Success adding course.
                      </div>
                    @else
                      @if (session('status') == '3')
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Error adding course.
                        </div>
                      @endif
                    @endif
                  @endif
                  <div class="alert alert-danger alert-dismissable fade in" id="alert-not-available">
                      <a href="#" class="close" aria-label="close">&times;</a>
                      Posting online course is currently unavailable.
                  </div>
                  <div class="bottom">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Start Plan area -->
                        <div class="pricearea">
                          <ul class="price_nav">
                            <!-- <li class="add-course" id = "add-course-online"> -->
                            <li class="add-course" id = 'add-course-online-temporary'>
                              <a href="" onclick="return false">
                                <img class = 'add-course-img' src="{{ URL::to('/') }}/img/addcourse-min.png" alt="img" style="max-height: 100% !important;">
                              </a>
                            </li>
                            <!-- DYNAMIC CONTENT -->
                            <?php if (isset($courses['popular']) && (count($courses['popular']) > 0)): ?>
                              <?php foreach ($courses['popular'] as $trcourse): ?>
                                <li class="homepagelist">
                                  <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                                    <img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img">
                                    <!-- <?php if (in_array(Session::get("LAD_user_id"), explode(",",$trcourse->wishlist_user_id))) {?>
                                      <img class = "bookmark-icon bookmarked" src = "img/bookmark-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php } else { ?>
                                      <img class = "bookmark-icon hide" src = "img/add-icon-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php }?> -->
                                    <h4 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->title))?$trcourse->title:'';?></h4>
                                    <h3 class="courselecturer line-clamp line-clamp-1"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></h3>
                                    <h3 class="courseprice">
                                      <?php if (isset($trcourse->price) && ($trcourse->price > 0)) {?>
                                        <?=(isset($trcourse->currencysymbol))?$trcourse->currencysymbol:'US$';?><?=(isset($trcourse->price))?number_format($trcourse->price,2,".",","):'';?>
                                      <?php } else {?>
                                        FREE
                                      <?php } ?>
                                    </h3>
                                  </a>
                                </li>
                              <?php endforeach ?>
                            <?php endif ?>
                            
                          </ul>
                        </div> 
                    </div>
                      <div id="loadingDiv" class = 'loadingDiv'>
                        <div class="windows8">
                          <div class="wBall" id="wBall_1">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_2">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_3">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_4">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_5">
                            <div class="wInnerBall"></div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <a class = 'see-more-feed' href="#" data-offset = '1' data-type = '1' data-user_id = '<?php echo Session::get("LAD_user_id");?>'>
                            <img class = "dashboard-see-more" src="{{ URL::to('/') }}/img/arrow-right-min.png" style="width: 1%; margin-left: 20px; margin-top: 3px;">
                            <span class="dashboard-see-more">See More</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- End popular training topic section -->
            </div>


            @if (session('status'))
              @if (session('status') == '2' || session('status') == '4')
                <div id = 'offline' class = "tab-pane fade in active">
              @else
                <div id = 'offline' class = "tab-pane fade in">
              @endif
            @else
              <div id = 'offline' class = "tab-pane fade in">
            @endif
              <!-- start popular training topic section -->
              <div id = "dashboard-popular">
                <section id="priceSection">
                  @if (session('status'))
                    @if (session('status') == '2')
                      <div class="alert alert-success alert-dismissable fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Success adding course.
                      </div>
                    @else
                      @if (session('status') == '4')
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Error adding course.
                        </div>
                      @endif
                    @endif
                  @endif
                  <div class="bottom">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Start Plan area -->
                        <div class="pricearea">
                          <ul class="price_nav">
                            <li class="add-course" id = "add-course-offline">
                              <a href="" onclick="return false">
                                <img class = 'add-course-img' src="{{ URL::to('/') }}/img/addcourse-min.png" alt="img" style="max-height: 100% !important;">
                              </a>
                            </li>
                            <!-- DYNAMIC CONTENT -->
                            <?php if (isset($courses['offline_popular']) && (count($courses['offline_popular']) > 0)): ?>
                              <?php foreach ($courses['offline_popular'] as $trcourse): ?>
                                <li class="homepagelist">
                                  <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                                    <img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img">
                                    <!-- <?php if (in_array(Session::get("LAD_user_id"), explode(",",$trcourse->wishlist_user_id))) {?>
                                      <img class = "bookmark-icon bookmarked" src = "img/bookmark-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php } else { ?>
                                      <img class = "bookmark-icon hide" src = "img/add-icon-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php }?> -->
                                    <h4 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->title))?$trcourse->title:'';?></h4>
                                    <h3 class="courselecturer line-clamp line-clamp-1"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></h3>
                                    <h3 class="courseprice">
                                      <?php if (isset($trcourse->price) && ($trcourse->price > 0)) {?>
                                        <?=(isset($trcourse->currencysymbol))?$trcourse->currencysymbol:'US$';?><?=(isset($trcourse->price))?number_format($trcourse->price,2,".",","):'';?>
                                      <?php } else {?>
                                        FREE
                                      <?php } ?>
                                    </h3>
                                  </a>
                                </li>
                              <?php endforeach ?>
                            <?php endif ?>
                            
                          </ul>
                        </div> 
                    </div>
                      <div id="loadingDiv" class = 'loadingDiv'>
                        <div class="windows8">
                          <div class="wBall" id="wBall_1">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_2">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_3">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_4">
                            <div class="wInnerBall"></div>
                          </div>
                          <div class="wBall" id="wBall_5">
                            <div class="wInnerBall"></div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <a class = 'see-more-feed' href="#" data-offset = '1' data-type = '0' data-user_id = '<?php echo Session::get("LAD_user_id");?>'>
                            <img class = "dashboard-see-more" src="{{ URL::to('/') }}/img/arrow-right-min.png" style="width: 1%; margin-left: 20px; margin-top: 3px;">
                            <span class="dashboard-see-more">See More</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- End popular training topic section -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#alert-not-available').hide();
      $('#add-course-online-temporary').click(function(){
        $('#alert-not-available').show();
      });
      $(document).on('click', '#alert-not-available .close', function(){
        $('#alert-not-available').hide();
      });
    });
  </script>