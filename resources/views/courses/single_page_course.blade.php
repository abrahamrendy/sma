  <!-- Start Video and navigation area -->
  <section id="service" class="coursedetail">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="service_area coursedetail wow fadeIn" data-wow-duration="1s">
          <div class="coursedetailtop">
            <div class="coursedetailvideo online">
              <div class="videoplayer">
                <?php if (isset($selected_course_modules[0]->video)): ?>
                  <?php if (isset($user_enrolled) && ($user->type == 0 || $user->type == 2 || $user->type == 1) && ($user_enrolled->progress > 0)) { // SET DEFAULT VIDEO ACTIVE ACCORDING TO USER PROGRESS?>

                    <video controls="" id='video'>
                      <source src="<?=env('S3_URL').$selected_course_modules[floor(count($selected_course_modules)/(100/$user_enrolled->progress))]->video?>" type="video/mp4">
                    </video>
                  <?php } else { ?>
                    <video controls="" id='video'>
                      <source src="<?=env('S3_URL').$selected_course_modules[0]->video?>" type="video/mp4">
                    </video>
                  <?php } ?>
                <?php else: ?>
                  <!-- Leave it empty -->
                <?php endif ?>
              </div>
            </div>
            <div class="coursedetailcontents online">
              <div class="small">
                <div class="list">
                  <ul>
                    <?php $isactive = true;?>
                    <?php if (isset($selected_course_modules) && count($selected_course_modules) > 0): ?>
                      <?php $ct = 0;?>
                      <?php foreach ($selected_course_modules as $scm): ?>
                        <?php 
                          if (isset($user_enrolled) && ($user->type == 0 || $user->type == 2 || $user->type == 1) && ($user_enrolled->progress > 0)) {
                            // SET DEFAULT VIDEO ACTIVE ACCORDING TO USER PROGRESS
                            $userprogress = floor(count($selected_course_modules)/(100/$user_enrolled->progress));
                            $isactive = $ct == $userprogress;
                          }
                        ?>
                        <li style="cursor: pointer;" <?=($isactive)?"class='active selectcourse'":"class = 'selectcourse'"?> data-module = '<?php echo $scm->module_number;?>'>
                          <div class="listcontent">
                            <div class="inner">
                              <?php if (isset($user_enrolled) && (isset($user_payment_status) || $selected_course->price <= 0) && ($user->type == 0 || $user->type == 2 || $user->type == 1)) {?>
                              <!-- IF USER ENROLLED -->
                              <div class="innerimage">
                                <img src="{{ URL::to('/') }}<?=($isactive)?"/img/courses/playicon-min.png":"/img/courses/playicon-min.png"?>" alt="icon">  
                              </div>
                              
                              <?php } else { ?>
                                <!-- USER HASN'T ENROLLED -->
                                <div class="innerimage">
                                  <img src="{{ URL::to('/') }}<?=($isactive)?"/img/courses/playicon-min.png":"/img/courses/lockicon-min.png"?>" alt="icon">  
                                </div>
                              <?php } ?>
                              <p>{{$scm->title}}</p>  
                            </div>
                          </div>
                        </li>
                        <?php $isactive = false; ?>
                        <?php $ct++;?>
                      <?php endforeach ?>
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
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="team_area coursecontent wow fadeIn" data-wow-duration="1s">
            <div class="coursedetailbottom">
              <div class="coursedetailtitle">
                <?=(isset($selected_course->title))?$selected_course->title:''?>
              </div>
              <div class="coursedetaildiv">
                <div class="coursedetailoverview online">
                  <div class="author">
                    <div class="arrowicon"><img src="{{ URL::to('/') }}/img/courses/uparrow-min.png"></div>
                    <h2>Creator</h2>
                    <div style = "cursor: pointer" class="content_viewprofile" data-name = '<?php echo $selected_course->courselecturer?>' data-position="<?php echo $selected_course->lecturer_occu?>" data-organization="<?php echo $selected_course->lecturer_organization?>" data-interest="<?php echo $selected_course->lecturer_interest?>" data-country="<?php echo $selected_course->lecturer_country?>" data-url = "<?php echo $selected_course->web_url?>" data-description = '<?php echo $selected_course->lecturer_desc?>' data-photo="<?php echo $selected_course->profpic?>" >
                      <img src="{{ env('S3_URL') }}<?=(isset($selected_course->profpic))?$selected_course->profpic:'/img/default-avatar-min.jpg'?>">
                      <p><?=(isset($selected_course->courselecturer))?$selected_course->courselecturer:''?></p>
                    </div>
                  </div>
                  <div class="overview">
                    <h2>Program Overview</h2>
                    <p class="white-space-pre-wrap" style="word-wrap: break-word;"><?=(isset($selected_course->overview))?$selected_course->overview:''?></p>
                  </div>
                </div>
                <div id="coursedetailinfo" class="coursedetailinfo online">
                  <div class="coursedetailprice">
                    <?php if (isset($selected_course) && $selected_course->price > 0) {?>
                      <?php echo $selected_course->symbol?><?=(isset($selected_course->price))?number_format($selected_course->price,2,".",","):'0000'?>
                    <?php } else {?>
                      FREE
                    <?php } ?>
                  </div>
                  <h2>Course Info</h2>
                  <ul class="basic">
                    <li>
                      <div class="basicimage"><img src="{{ URL::to('/') }}/img/courses/play-min.png"></div>
                      <p><?=(isset($selected_course_modules))?count($selected_course_modules):'00'?> modules</p>
                    </li>
                    <li>
                      <div class="basicimage"><img src="{{ URL::to('/') }}/img/courses/time-min.png"></div>
                      <p><?php 
                      if (isset($selected_course_modules)) 
                      { # code...
                        $totalmins = 0;
                        foreach ($selected_course_modules as $scmc) {
                          $totalmins += (isset($scmc->duration))?floatval($scmc->duration):0;
                        }
                        if ($totalmins > 60) {
                          echo number_format($totalmins/60.0,1,".",","). ' hours';
                        } else {
                          echo number_format($totalmins,0,".",","). ' minutes';
                        }
                      }
                      ?></p>
                    </li>
                    <li>
                      <?php if (isset($selected_course->level_name)): ?>
                        <div class="basicimage"><img src="{{ URL::to('/') }}<?=(isset($selected_course->level_icon))?$selected_course->level_icon:''?>"></div>
                        <p><?=(isset($selected_course->level_name))?$selected_course->level_name:''?></p>
                      <?php endif ?>
                    </li>
                  </ul>
                  <ul class="additional white-space-pre-wrap">
                    <li><h5><?php echo $selected_course->catname?></h5></li>
                    <?php if (isset($selected_course->info) && $selected_course->info != ''): ?>
                      <!-- <?php $infos = explode(",", $selected_course->info); ?>
                      <?php foreach ($infos as $info_content): ?>
                        <li><h5>{{$info_content}}</h5></li>
                      <?php endforeach ?> -->
                      <li><h5>{{$selected_course->info}}</h5></li>
                    <?php endif ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </div>
  </section>
  <!-- End Course contents area -->
<?php if ((isset($user_payment_status) || $selected_course->price <= 0) && isset($user_enrolled) && ($user->type == 0 || $user->type == 2 || $user->type == 1) && isset($scm)){?>
  <script type="text/javascript">
    $(document).ready(function(){
      var flag = true;

      $('.selectcourse').click(function(){
        $('.selectcourse').removeClass('active');
        $(this).addClass('active');
        var video = $(this).attr('data-module');
        var totalVideo = "<?php echo count($selected_course_modules)?>";

        var myVideoPlayer = document.getElementById('video');
        var duration;
        myVideoPlayer.addEventListener('loadedmetadata', function() {
            duration = myVideoPlayer.duration;
        });
        

        var getm = $.ajax(
                          {
                            url: base_url + '/getm/'+'<?php echo $scm->course_id?>'+'/'+video,
                            type:'get',
                            dataType : "json",
                            success:function(datas)
                            {
                              $('.videoplayer video source').attr('src', s3_url + datas.video);
                              $('.videoplayer video').load();
                              flag = true; 
                            },
                            error:function(xhr,status,error)
                            {
                                alert("Error playing course. Please try again later.");
                            }
                          });
      });

      
      var myVideoPlayer = document.getElementById('video');
      myVideoPlayer.ontimeupdate = function(){
        var video = $('.list .active').attr('data-module');
        var totalVideo = "<?php echo count($selected_course_modules)?>";
        // VIDEO TIME > 80% THEN UPDATE PROGRESS
        videoProgress = Math.floor((100 / myVideoPlayer.duration) * myVideoPlayer.currentTime);
        if (videoProgress > 80 && flag) {
          var currentProgress = $.ajax(
                                    {
                                      url: base_url + '/getcurrentprogress/'+'<?php echo $scm->course_id?>',
                                      type:'get',
                                      dataType : "json",
                                      success:function(data)
                                      {
                                        if (data.info == 'success') {
                                          currentProgress = parseFloat(data.value);

                                          if (currentProgress == 0) {
                                            // if progress 0%
                                            var currentVideo = 1;
                                          } else {
                                            var currentVideo = (Math.floor(totalVideo/ (100 / currentProgress))) + 1;
                                          }
                                          // console.log('current video = ' + currentVideo);

                                          // console.log(myVideoPlayer.duration + " " + myVideoPlayer.currentTime);

                                          if (currentVideo == video) {
                                            if (flag) {
                                              progress = (100/totalVideo);
                                              // console.log('update');
                                              updateProgress(progress);
                                              flag = false;
                                            }
                                          }            
                                        } else {
                                          alert(data.message);
                                        }
                                      },
                                      error:function(xhr,status,error)
                                      {
                                          alert("Problem with course. Please try again later.");
                                      }
                                    });
        }
        // END
      };

      function updateProgress(percentage) {
        var getm = $.ajax(
                          {
                            url: base_url + '/updateprogress/'+'<?php echo $scm->course_id?>'+'/'+percentage,
                            type:'get',
                            dataType : "json",
                            success:function(data)
                            {
                              if (data.info == 'success') {
                                return true;
                              } else {
                                alert(data.message);
                              }
                            },
                            error:function(xhr,status,error)
                            {
                                alert("Problem with course. Please try again later.");
                            }
                          });
      }
    });
</script>
<?php }?>