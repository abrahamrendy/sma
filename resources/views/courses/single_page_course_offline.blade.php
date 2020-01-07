  <!-- Start Video and navigation area -->
  <section id="service" class="coursedetail">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="service_area coursedetail wow fadeIn" data-wow-duration="1s">
          <div class="coursedetailtop">
            <div class="coursedetailvideo">
              <div class="videoplayer">
                <?php if (isset($selected_course_modules[0]->video)): ?>
                  <video controls="">
                    <source src="{{ URL::to('/') }}{{$selected_course_modules[0]->video}}" type="video/mp4">
                  </video>
                <?php elseif (isset($selected_course->detail_image)): ?>
                  <img class="offline_course_image" src="{{ env('S3_URL') }}{{$selected_course->detail_image}}">
                <?php else: ?>
                  <!-- Leave it empty -->
                  <div class="offline_video_empty">
                    <div class="alert alert-danger fade in" style="display: inline-block;">
                      Sorry, there is no preview available for this course.
                    </div>
                  </div>                  
                <?php endif ?>
              </div>
            </div>
            <div class="coursedetailcontents pos-offline">
              <div class="small">
                <div id="coursedetailinfo" class="coursedetailinfo offline">
                  <div class="coursedetailprice">
                    <?php if (isset($selected_course) && $selected_course->price > 0) {?>
                      <?php echo $selected_course->symbol?><?=(isset($selected_course->price))?number_format($selected_course->price,2,".",","):'0000'?>
                    <?php } else {?>
                      FREE
                    <?php } ?>
                  </div>
                  <h2>Course Info</h2>
                  <ul class="basic">
                    <li class="hide">
                      <div class="basicimage"><img src="{{ URL::to('/') }}/img/courses/offline_courses-min.png"></div>
                      <p><?=(isset($selected_course_modules))?count($selected_course_modules):'00'?> meetings</p>
                    </li>
                    <li class="hide">
                      <div class="basicimage"><img src="{{ URL::to('/') }}/img/courses/time-min.png"></div>
                      <p><?php 
                        if (isset($selected_course_modules)) 
                        { 
                          $totalmins = 0;
                          foreach ($selected_course_modules as $scmc) {
                            $totalmins += (isset($scmc->duration))?floatval($scmc->duration):0;
                          }
                          echo number_format($totalmins/60.0,0,".",",");
                        }
                      ?> hour/meeting</p>
                    </li>
                    <li>
                      <?php if (isset($selected_course->level_name)): ?>
                        <div class="basicimage"><img src="{{ URL::to('/') }}<?=(isset($selected_course->level_icon))?$selected_course->level_icon:''?>"></div>
                        <p><?=(isset($selected_course->level_name))?$selected_course->level_name:''?></p>
                      <?php endif ?>
                    </li>
                    <li>
                      <div class="basicimage"><img src="{{ URL::to('/') }}/img/date-icon-min.png"></div>
                      <p>
                        <?php if ($selected_course->start_date != null && $selected_course->end_date != null){?>
                          <?php if (date("n", strtotime($selected_course->start_date)) == date("n", strtotime($selected_course->end_date))) {
                                    if (date("d", strtotime($selected_course->start_date)) == date("d", strtotime($selected_course->end_date))) {
                                      echo date('d F, Y', strtotime($selected_course->end_date)) ;
                                    } else {
                                      echo date('d', strtotime($selected_course->start_date)). '-' . date('d F, Y', strtotime($selected_course->end_date)) ;
                                    }
                                } else {
                                    echo date('d F', strtotime($selected_course->start_date)). ' - ' . date('d F, Y', strtotime($selected_course->end_date)) ;
                                  }?>
                        <?php } else {
                            if ($selected_course->start_date != null) {
                              echo date('d F, Y', strtotime($selected_course->start_date));
                            } else {
                              echo "-";
                            }
                          }?>
                      </p>
                    </li>
                  </ul>
                  <ul class="additional white-space-pre-wrap">
                    <li><h5><?php echo $selected_course->catname?></h5></li>
                    <?php if (isset($selected_course->info) && $selected_course->info != ''): ?>
                      <!-- <?php $infos = explode(",", $selected_course->info); ?>
                      <?php foreach ($infos as $info_content): ?>
                        <li><h5>{{$info_content}}</h5></li>
                      <?php endforeach ?> -->
                      <li><h5><?php echo $selected_course->info ?></h5></li>
                    <?php endif ?>
                  </ul>
                </div>
                <div class="link">
                  <?php if (Session::get('LAD_user_id')) {?>
                    <?php if (isset($user_enrolled) && ($user->type == 0 || $user->type == 2)) {?>
                      <a href="#" style="background-color: #C45403; cursor: not-allowed;" onclick="return false">enrolled</a>
                    <?php } else { ?>
                      <a href="{{ URL::to('/')}}/enroll/<?php echo $selected_course->coursecode?>">enroll now</a>
                    <?php } ?>
                  <?php } else {?>
                    <a href="#" id="enrollsignup">enroll now</a>
                  <?php } ?>
                </div>
                <div class="btn-blue-dark link" style="background-color: #1d619a; ">
                  <?php if (in_array(($selected_course->course_id), $user_wishlists)) {?>
                    <a href="" class="add-wishlist bookmarked" style="background-color: #525252" data-course_id = '<?php if (isset($selected_course->course_id)){ echo $selected_course->course_id; }?>'>remove from wishlist</a>
                  <?php } else { ?>
                    <a href="" class="add-wishlist" style="background-color: #1d619a" data-course_id = '<?php if (isset($selected_course->course_id)){ echo $selected_course->course_id; }?>'>add to wishlist</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Video and navigation area -->

  <!-- start Course contents area -->
  <section id="ourTeam">
    <div class="container">
      <!-- <div class="row"> -->
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="team_area coursecontent wow fadeIn" data-wow-duration="1s">
            <div class="coursedetailbottom">
              <div class="coursedetailtitle">
                <?=(isset($selected_course->title))?$selected_course->title:''?>
              </div>
              <div class="coursedetaildiv">
                <div class="coursedetailoverview" style="width: 100%">
                  <div class="author">
                    <div class="arrowicon"><img src="{{ URL::to('/') }}/img/courses/uparrow-min.png"></div>
                    <h2>Creator</h2>
                    <div style = "cursor: pointer" class="content_viewprofile" data-name = '<?php echo $selected_course->courselecturer?>' data-position="<?php echo $selected_course->lecturer_occu?>" data-organization="<?php echo $selected_course->lecturer_organization?>" data-interest="<?php echo $selected_course->lecturer_interest?>" data-country="<?php echo $selected_course->lecturer_country?>" data-url = "<?php echo $selected_course->web_url?>" data-description = '<?php echo $selected_course->lecturer_desc?>' data-photo="<?php echo $selected_course->profpic?>" >
                    <img class = 'creatorimg' src="{{ env('S3_URL') }}<?=(isset($selected_course->profpic))?$selected_course->profpic:'images/default-avatar-min.jpg'?>">
                    <p><?=(isset($selected_course->courselecturer))?$selected_course->courselecturer:''?></p>
                    </div>
                  </div>
                  <div class="overview">
                    <h2>Program Overview</h2>
                    <p style="word-wrap: break-word; white-space: pre-wrap;"><?=(isset($selected_course->overview))?$selected_course->overview:''?></p>
                    <?php if (isset($selected_course_modules) && (count($selected_course_modules) > 0)): ?>
                    <h2>Topics</h2>
                    <table class="offlinecoursetopics white-space-pre-wrap">
                        <?php $modulecounter = 1;?>
                        <?php foreach ($selected_course_modules as $scmk): ?>
                          <tr>
                            <td class="topicnumber">Topic <?=$modulecounter;?></td>
                            <td class="topictitle"><?=($scmk->title)?$scmk->title:'';?></td>
                          </tr>
                          <?php $modulecounter++; ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </div>
  </section>
  <!-- End Course contents area -->
