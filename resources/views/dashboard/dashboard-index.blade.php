
      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="img/icon-dashboard-min.png">
            Dashboard
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#feed'>
                <img src="img/feed-icon-min.png">
                Feed
              </a>
            </div>
            <div class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#wishlist">
                <img src="img/wishlist-icon-min.png">
                Wishlist
              </a>
            </div>
          </div>
          <div class="tab-content">
            <div id = 'feed' class = "tab-pane fade in active">
              <div class="recommended bottom">
                Featured Courses

                <div id="recommended-carousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators hide">
                    <li data-target="#recommended-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#recommended-carousel" data-slide-to="1"></li>
                    <li data-target="#recommended-carousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <?php if (isset($courses['featured']) && count($courses['featured']) > 0) {?>
                      <?php $counter = 0;?>
                      <?php foreach ($courses['featured'] as $course) { ?>
                        <div class="item <?php if ($counter == 0) { echo "active";}?>">
                          <div class="col-md-12">
                            <a href = "{{ URL::to('/') }}<?=(isset($course->coursecode))?'/coursedetail/'.$course->coursecode:'/browsecourses/';?>">
                              <div class="col-md-3">
                                <!-- <img class = "top bottom" src="img/design-thinking-visual-min.png" style="width: 115%"> -->
                                <div class= 'left-border top bottom' style="width: 197px; height: 212px; background-image: url('{{ env('S3_URL') }}<?php echo $course->image;?>'); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
                                  <!-- <img class = 'featured-img' src="{{ env('S3_URL') }}<?php echo $course->image;?>"> -->
                                  
                                </div>
                              </div>
                              <div class="col-md-9 item-content top bottom right-border">
                                <b class="dashboard-featured-course-title"><?php echo $course->title;?></b>
                                <br>
                                <span>
                                  <?php echo $course->courselecturer;?>
                                  <br><br>
                                  <span class="featured-overview"><?php echo $course->overview;?></span>
                                <span>
                                <br>
                                <span class="recommended-price-tag">
                                  <?php if (isset($course->price) && ($course->price > 0)) { ?>
                                    <h2><b><?=(isset($course->currencysymbol))?$course->currencysymbol:'US$';?><?php echo number_format($course->price,2,'.','');?></b></h2>
                                  <?php } else { ?>
                                    <h2><b>FREE</b></h2>
                                  <?php } ?>
                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                      <?php $counter++; } ?>
                    <?php } ?>

                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control recommended-control-arrow" href="#recommended-carousel" data-slide="prev">
                    <!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
                    <span class="left-arrow"><img src="img/arrow-left-min.png" height="15px"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control recommended-control-arrow" href="#recommended-carousel" data-slide="next">
                    <span class="left-arrow"><img src="img/arrow-right-min.png" height="15px"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>

              <!-- start popular training topic section -->
              <div id = "dashboard-popular">
                <section id="priceSection">
                  <span>Recommended for you</span>
                  <div class="bottom">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Start Plan area -->
                        <div class="pricearea">
                          <ul class="price_nav">
                            <!-- DYNAMIC CONTENT -->
                            <?php if (isset($courses['popular']) && (count($courses['popular']) > 0)): ?>
                              <?php foreach ($courses['popular'] as $trcourse): ?>
                                <li class="homepagelist">
                                  <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                                    <img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img">
                                    <?php if (in_array(Session::get("LAD_user_id"), explode(",",$trcourse->wishlist_user_id))) {?>
                                      <img class = "bookmark-icon bookmarked" src = "img/bookmark-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php } else { ?>
                                      <img class = "bookmark-icon hide" src = "img/add-icon-min.png" data-course_id = "<?=($trcourse->course_id)?>">
                                    <?php }?>
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
                      <div id="loadingDiv">
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
                        <a id= "see-more-feed" href="#" data-offset = '1' data-type = '2' data-user_id = '<?php echo Session::get("LAD_user_id");?>'>
                            <img class = "dashboard-see-more" src="img/arrow-right-min.png" style="width: 1%; margin-left: 20px; margin-top: 3px;">
                            <span class="dashboard-see-more">See More</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- End popular training topic section -->
            </div>

            <div id = 'wishlist' class = "tab-pane fade">

              <!-- start popular training topic section -->
              <div id = "dashboard-wishlist">
                <section id="priceSection">
                  <span>My Wishlist</span>
                  <div class="bottom">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Start Plan area -->
                        <div class="pricearea">
                          <ul class="price_nav">
                            <!-- DYNAMIC CONTENT -->
                            <?php if (isset($courses['wishlist']) && (count($courses['wishlist']) > 0)): ?>
                              <?php foreach ($courses['wishlist'] as $trcourse): ?>
                                <li class="homepagelist">
                                  <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                                    <img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img">
                                    <img class = "bookmark-icon bookmarked" src = "img/bookmark-min.png">
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
                      <div id="loadingDivWishlist">
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
                        <a id= "see-more-wishlist" href="#" data-offset = '1' data-user_id = '<?php echo Session::get("LAD_user_id");?>'>
                            <img class = "dashboard-see-more" src="img/arrow-right-min.png" style="width: 1%; margin-left: 20px; margin-top: 3px;">
                            <span class="dashboard-see-more">See More</span>
                        </a>
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
    </div>
  </div>