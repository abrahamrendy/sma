
      <div class="col-md-12">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="img/icon-dashboard-min.png" class="hide">
            Modules
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs hide">
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

              <!-- start popular training topic section -->
              <div id = "dashboard-popular">
                <section id="priceSection">
                  <div class="bottom">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Start Plan area -->
                        <div class="pricearea">
                          <ul class="price_nav">
                            <!-- DYNAMIC CONTENT -->
                            <?php if (isset($courses) && (count($courses) > 0)): ?>
                              <?php foreach ($courses as $trcourse): ?>
                                <?php
                                  if ($trcourse->path != '') {
                                    $arrfilename = explode('/', $trcourse->path);
                                    $filename = $arrfilename[count($arrfilename)-1];
                                ?>
                                <li class="homepagelist">
                                  <a href="{{route('dl_files_modul', [$filename])}}" target="_blank">
                                    <img src="{{URL('/').'/img/8515.jpg'}}" alt="img">
                                    <h4 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->name))?$trcourse->name:'';?></h4>
                                  </a>
                                </li>
                                <?php } ?>
                              <?php endforeach ?>
                            <?php endif ?>
                          </ul>
                        </div> 
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