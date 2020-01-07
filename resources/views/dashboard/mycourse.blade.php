
      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '{!! url('/mycourse'); !!}'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Enrolled Courses
            </a>
          </div>

          <!-- start popular training topic section -->
          <div id = "dashboard-mycourse">
            <section id="priceSection">
              <div class="">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Start Plan area -->
                    <?php if (isset($courses) && !empty($courses)) { ?>
                    <div class="pricearea bottom">
                      <ul class="price_nav"> 
                          <?php $i = 1;
                            foreach ($courses as $trcourse) { ?>
                              <li>
                              <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                                <div class="col-md-12 no-padding">
                                  <div class="col-md-3 no-padding">
                                    <img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img">
                                  </div>
                                  <div class="col-md-9 no-padding" style="padding-top: 23px">
                                      <?php if ($trcourse->type == 0) {?>
                                        <?php $startdate=date('Y-m-d h:i:s', strtotime($trcourse->start_date));
                                              $enddate=date('Y-m-d H:i:s',strtotime($trcourse->end_date));
                                              $percentage=0; $currentdate = date("Y-m-d H:i:s"); 
                                              $course_status="ENROLLED";
                                              if($currentdate >= $startdate && $currentdate <= $enddate){
                                                  $percentage =50;
                                                  $course_status="COMMENCED";
                                              }else if($currentdate > $enddate){
                                                  $percentage = 100;
                                                  $course_status="FINISHED";
                                              }?>
                                        <span class="coursetitle line-clamp line-clamp-2" style="width: 60%"><?=(isset($trcourse->title))?$trcourse->title:'';?></span>
                                        <button type="button" class="btn btn-blue-dark btn-course-status disabled" ><?php echo($course_status); ?></button>
                                        <span class="btn btn-red btn-remove-enrollment remove-enrollment" data-cid = "<?php echo $trcourse->course_id; ?>" data-id = "<?php echo $trcourse->enroll_id;?>"><i class="fa fa-times" style="color: white;" aria-hidden="true" ></i></span>
                                        <!-- <span class="courselecturer"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></span> -->
                                        <br><br>
                                        <div class = "progress-content-offline-course">
                                            <img class = "progress-start <?=($percentage == 0)? 'util-grayscale' : '';?>" src="{{ URL::to('/') }}/img/start-min.png">
                                            <img class = "progress-rank <?=($percentage < 100)? 'util-grayscale' : '';?>" src="{{ URL::to('/') }}/img/rank-min.png">
                                            <div class="progress">
                                              <span id = "mycourse-progress-lesson-label-<?php echo $i;?>" class="mycourse-progress-lesson-label <?=(($trcourse->progress == 0) || ($trcourse->progress == 100))? 'hide' : '';?>">Lesson 5</span>
                                              <img id = "mycourse-progress-label-<?php echo $i;?>" class ="progress-label <?=($trcourse->progress == 0 || ($trcourse->progress == 100))? 'hide' : '';?>" src="{{ URL::to('/') }}/img/Shape-29-min.png">
                                              <div id = 'mycourse-progress-bar-<?php echo $i;?>' class="progress-bar" role="progressbar" aria-valuenow="<?php echo($percentage)?>" aria-valuemin="0" aria-valuemax="100">
                                              </div>
                                            </div>
                                      <?php } else { ?>
                                        <span class="coursetitle line-clamp line-clamp-2" style="width: 60%"><?=(isset($trcourse->title))?$trcourse->title:'';?></span>
                                        <?php if ($trcourse->progress >= 100) {?>
                                          <button type="button" class="btn btn-blue-dark btn-course-status disabled" >FINISHED</button>
                                        <?php } else { ?>
                                          <button type="button" class="btn btn-blue-dark btn-course-status disabled" >COMMENCED</button>
                                        <?php } ?>
                                        <span class="btn btn-red btn-remove-enrollment remove-enrollment" data-cid = "<?php echo $trcourse->course_id; ?>" data-id = "<?php echo $trcourse->enroll_id?>"><i class="fa fa-times" style="color: white;" aria-hidden="true" ></i></span>
                                    <!-- <span class="courselecturer"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></span> -->
                                        <br><br>
                                        <div class = "progress-content">
                                        <img class = "progress-start <?=($trcourse->progress == 0)? 'util-grayscale' : '';?>" src="{{ URL::to('/') }}/img/start-min.png">
                                        <img class = "progress-rank <?=($trcourse->progress < 100)? 'util-grayscale' : '';?>" src="{{ URL::to('/') }}/img/rank-min.png">
                                        <div class="progress">
                                          <span id = "mycourse-progress-lesson-label-<?php echo $i;?>" class="mycourse-progress-lesson-label <?=(($trcourse->progress == 0) || ($trcourse->progress == 100))? 'hide' : '';?>"><?php echo number_format($trcourse->progress,2,'.','')?>%</span>
                                          <img id = "mycourse-progress-label-<?php echo $i;?>" class ="progress-label <?=($trcourse->progress == 0 || ($trcourse->progress == 100))? 'hide' : '';?>" src="{{ URL::to('/') }}/img/Shape-29-min.png">
                                          <div id = 'mycourse-progress-bar-<?php echo $i;?>' class="progress-bar" role="progressbar" aria-valuenow="<?=(isset($trcourse->progress))?$trcourse->progress:'';?>" aria-valuemin="0" aria-valuemax="100">
                                          <!-- <span class="sr-only">70% Complete</span> -->
                                      </div> 
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </li>
                        <?php $i++; } ?>
                        <?php } else {?>
                          <div class="pricearea">
                            <ul class="price_nav"> 
                              <div class="alert alert-info">
                                You haven't enrolled to any courses. Start searching courses <b><a style = "color: inherit;" href="{{ URL::to('/browsecourses')}}">here</a></b> !
                              </div>
                        <?php } ?>
                        <div class = 'hide' id = "totalcourses"><?php echo count($courses); ?></div>
                        <!-- <li>
                          <div class="col-md-12 no-padding">
                            <div class="col-md-3 no-padding">
                              <img src="{{ URL::to('/') }}/img/design-thinking-visual-min.png" alt="img">
                            </div>
                            <div class="col-md-9 no-padding" style="padding-top: 23px">
                              <span class="coursetitle">Science Behind Success</span>
                              <span class="courselecturer">Mr Jayson Krause</span>
                              <br><br>
                              <div class = "progress-content">
                                <img class = "progress-start" src="{{ URL::to('/') }}/img/start-min.png">
                                <img class = "progress-rank" src="{{ URL::to('/') }}/img/rank-min.png">
                                
                                <div class="progress">
                                  <span id = "mycourse-progress-lesson-label-2" class="mycourse-progress-lesson-label">Lesson 2</span>
                                  <img id = "mycourse-progress-label-2" class ="progress-label" src="{{ URL::to('/') }}/img/Shape-29-min.png">
                                  <div id = 'mycourse-progress-bar-2' class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                                  </div>
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
                        </li> -->
                      </ul>
                    </div>
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

  <script type="text/javascript">
    if (user_type != 0) {
      $('.remove-enrollment').remove();
    }
  </script>