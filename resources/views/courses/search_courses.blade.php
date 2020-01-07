  <!-- start courses section -->
  <section id="priceSection" style="padding-top: 0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="pricearea searchcourse wow fadeIn" data-wow-duration="1s">
            <div class="searchcourseheader" style="<?=(isset($totalcourse) && $totalcourse > 0)?'margin-bottom: 50px;':'margin-bottom: 0px;'?>">
              <div class="counts">
                <?php if (isset($totalcourse) && $totalcourse > 0): ?>
                  <p><?=$totalcourse?> results <?=(isset($category))?"for <b>$category</b>":''?></p>
                <?php else: ?>
                  <p>Your search "<?=(isset($category))?$category:''?>" did not match any courses.</p>
                <?php endif ?>
              </div>
              <?php if (isset($totalcourse) && $totalcourse > 0): ?>
                <div class="sort">
                  <label>
                    <p>Sorted By :</p>
                    <select class="form-control" id="searchcoursesortby">
                      <option value="1" <?=(isset($sort)&&($sort==1))?'selected':''?> >Best Match</option>
                      <option value="2" <?=(isset($sort)&&($sort==2))?'selected':''?> >Lowest Price</option>
                      <option value="3" <?=(isset($sort)&&($sort==3))?'selected':''?> >Lowest Level</option>
                    </select>
                  </label>
                </div>
              <?php endif ?>              
            </div>

            <?php if (isset($courses) && (count($courses) == 0)): ?>
              <div class="emptysearchcourse_best" style="letter-spacing: <?=(isset($promoted_random_category_name) && (strlen($promoted_random_category_name)<25))?'7px':'1px'?>">
                Best Sellers <?=(isset($promoted_random_category_name))?'in '.$promoted_random_category_name:''?>
              </div>
            <?php endif ?>            

            <ul class="price_nav browsecourses">
            <div style="display: none;">
              <?php print_r($courses); ?>
            </div>
              <?php if (isset($courses) && count($courses) > 0): ?>
                <?php foreach ($courses as $cs): ?>
                  <li style="margin-left: 0px;">
                    <a href="<?=(isset($cs->coursecode)&&(strlen($cs->coursecode)>0))?URL::to('/').'/coursedetail/'.$cs->coursecode:'#'?>">
                      <div class="courseimage">
                        <img src="{{ env('S3_URL') }}<?=(isset($cs->image))?$cs->image:''?>" alt="img" style="height: 100%;" >  
                      </div>
                      <div class="coursecontent">
                        <h3 class="searchcoursetitle"><?=(isset($cs->title))?$cs->title:''?></h3>
                        <h2 class="searchcourselecturer"><?=(isset($cs->courselecturer))?$cs->courselecturer:''?></h2>
                        <h5 class="searchcoursedescription"><?=(isset($cs->overview))?((strlen($cs->overview)>150)?substr($cs->overview, 0,150)."...":$cs->overview):'';?></h5>
                        <div class="searchcoursedetails">
                          <div class="searchcourselectures">
                            <?php if (isset($cs->type) && ($cs->type == 1)): ?>
                              <img src="{{ URL::to('/') }}/img/courses/play-min.png">
                              <p><?=(isset($cs->coursemodules_number))?$cs->coursemodules_number:'0'?> lectures</p>  
                            <?php else: ?>
                              <img src="{{ URL::to('/') }}/img/courses/offline_courses-min.png">
                              <p><?=(isset($cs->coursemodules_number))?$cs->coursemodules_number:'0'?> meetings</p>  
                            <?php endif ?>                            
                          </div>
                          <div class="searchcourseduration">
                            <img src="{{ URL::to('/') }}/img/courses/time-min.png">
                            <?php if (isset($cs->type) && ($cs->type == 1)): ?>
                              <p><?=(isset($cs->coursemodules_duration))?number_format($cs->coursemodules_duration/60.0,1,".",","):'0.0'  ?> hours</p>
                            <?php else: ?>
                              <p><?=(isset($cs->coursemodules_duration))?number_format($cs->coursemodules_duration/60.0,0,".",","):'0'  ?> hour/ meeting</p>
                            <?php endif ?>     
                          </div>
                          <div class="searchcourselevel">
                            <img src="{{ URL::to('/') }}<?=(isset($cs->courselevel_icon))?$cs->courselevel_icon:''?>">
                            <p><?=(isset($cs->courselevel_name))?$cs->courselevel_name:''?></p>
                          </div>
                          <h2 class="searchcourseprice"><?php if($cs->price == 0){ 
                                                            echo 'FREE';
                                                        }else{
                                                            echo $cs->symbol?><?=(isset($cs->price))?number_format($cs->price,2,".",","):'';}?></h2>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php endforeach ?>
              <?php elseif (isset($promoted_courses) && (count($promoted_courses) > 0)): ?>
                <?php foreach ($promoted_courses as $pcs): ?>
                  <li style="margin-left: 0px;">
                    <a href="<?=(isset($pcs->coursecode)&&(strlen($pcs->coursecode)>0))?URL::to('/').'/coursedetail/'.$pcs->coursecode:'#'?>">
                      <div class="courseimage">
                        <img src="{{ env('S3_URL') }}<?=(isset($pcs->image))?$pcs->image:''?>" alt="img" style="height: 100%; max-width: 310px !important;" >  
                      </div>
                      <div class="coursecontent">
                        <h3 class="searchcoursetitle"><?=(isset($pcs->title))?$pcs->title:''?></h3>
                        <h2 class="searchcourselecturer"><?=(isset($pcs->courselecturer))?$pcs->courselecturer:''?></h2>
                        <h5 class="searchcoursedescription"><?=(isset($pcs->overview))?((strlen($pcs->overview)>150)?substr($pcs->overview, 0,150)."...":$pcs->overview):'';?></h5>
                        <div class="searchcoursedetails">
                          <div class="searchcourselectures">
                            <img src="{{ URL::to('/') }}/img/courses/play-min.png">
                            <p><?=(isset($pcs->coursemodules_number))?$pcs->coursemodules_number:'0'?> lectures</p>
                          </div>
                          <div class="searchcourseduration">
                            <img src="{{ URL::to('/') }}/img/courses/time-min.png">
                            <p><?=(isset($pcs->coursemodules_duration))?number_format($pcs->coursemodules_duration/60.0,1,".",","):'0.0'  ?> hours</p>
                          </div>
                          <div class="searchcourselevel">
                            <img src="{{ URL::to('/') }}<?=(isset($pcs->courselevel_icon))?$pcs->courselevel_icon:''?>">
                            <p><?=(isset($pcs->courselevel_name))?$pcs->courselevel_name:''?></p>
                          </div>
                          <h2 class="searchcourseprice">$<?=(isset($pcs->price))?number_format($pcs->price,2,".",","):'0000'?></h2>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php endforeach ?>
              <?php endif ?>
            </ul>


            <?php if (isset($pagination_total_page) && ($pagination_total_page > 1)): ?>
              <div class="searchcoursepagination">
                <div class="small">
                  <ul>
                    <?php 
                      $redirect_baseURI = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                      if (strpos($redirect_baseURI, 'page') !== false) 
                      { # URI contains 'page'
                        // Replace URI page
                        $redirect_baseURI = substr($redirect_baseURI, 0, strpos($redirect_baseURI,"page"))."page=";
                      }
                      else
                      { # URI contains no 'page'
                        // Add page
                        $redirect_baseURI .= "&page=";
                      }
                    ?>

                    <!-- Left button -->
                    <?php if (isset($pagination_total_page) && ($pagination_total_page > 3)): ?>
                      <?php if (isset($currentpage) && $currentpage == 1): ?>
                        <li class="paginationcontent left">
                          <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationleft0-min.png"></a></div>
                        </li>
                      <?php else: ?>
                        <li class="paginationcontent left">
                          <div><a href="{{$redirect_baseURI.($currentpage-1)}}"><img src="{{ URL::to('/') }}/img/courses/paginationleft1-min.png"></a></div>
                        </li>
                      <?php endif ?>
                    <?php endif ?>
                    
                    <?php if (isset($pagination_total_page)): ?>
                      <?php 
                        // Define pagination start & end 
                        $startpagination = 1;
                        $endpagination = $pagination_total_page;

                        if ($pagination_total_page > 5) 
                        { # Limit pagination
                          $startpagination = (($currentpage-2) < 1)?1:$currentpage-2;
                          $endpagination = (($currentpage+2) > $pagination_total_page)?$pagination_total_page:$currentpage+2;
                          $totalpagination = $endpagination - $startpagination;
                          // Set minimum pagination to 5
                          if ($totalpagination < 5) 
                          { # 
                            if ($currentpage == 1 || $currentpage == 2) 
                            { # endpagination to 5
                              $endpagination = 5;
                            } else if (($currentpage == $pagination_total_page-1) || ($currentpage == $pagination_total_page))
                            { # startpagination to -4
                              $startpagination = $pagination_total_page-4;
                            }
                          }
                        }
                      ?>

                      <?php for($ct=$startpagination;$ct<=$endpagination;$ct++) : ?>
                        <?php if (isset($currentpage) && $currentpage == $ct): ?>
                          <li class="paginationcontent active">
                            <div><a href="#"><h2><?=$ct?></h2></a></div>
                          </li>
                        <?php else: ?>
                          <li class="paginationcontent">
                            <div><a href="{{$redirect_baseURI.$ct}}"><h2><?=$ct?></h2></a></div>
                          </li>
                        <?php endif ?>
                      <?php endfor; ?>
                    <?php endif ?>

                    <!-- Right button -->
                    <?php if (isset($pagination_total_page) && ($pagination_total_page > 3)): ?>
                      <?php if (isset($currentpage) && $currentpage == $pagination_total_page): ?>
                        <li class="paginationcontent right">
                          <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationright0-min.png"></a></div>
                        </li>
                      <?php else: ?>
                        <li class="paginationcontent right">
                          <div><a href="{{$redirect_baseURI.($currentpage+1)}}"><img src="{{ URL::to('/') }}/img/courses/paginationright1-min.png"></a></div>
                        </li>
                      <?php endif ?>
                    <?php endif ?>
                  </ul>
                </div>
              </div>  
            <?php elseif (isset($promoted_pagination_total_page) && ($promoted_pagination_total_page > 1)): ?>
              <div class="searchcoursepagination">
                <div class="small">
                  <ul>
                    <?php 
                      $redirect_baseURI = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                      if (!(strpos($redirect_baseURI, 'promoted') !== false))
                      { # URI does not contain promoted
                        if (strpos($redirect_baseURI, 'page') !== false) 
                        { # URI contains 'page', insert promoted before 'page'
                          $redirect_baseURI = substr($redirect_baseURI, 0, strpos($redirect_baseURI, '&page'))."&promoted=".$promoted_random_category_id.substr($redirect_baseURI, strpos($redirect_baseURI, '&page'));
                        }
                        else
                        { # URI does not contain 'page', insert promoted at the end of URI
                          // Add promoted
                          $redirect_baseURI .= "&promoted=".$promoted_random_category_id;
                        }
                      }

                      if (strpos($redirect_baseURI, 'page') !== false) 
                      { # URI contains 'page'
                        // Replace URI page
                        $redirect_baseURI = substr($redirect_baseURI, 0, strpos($redirect_baseURI,"page"))."page=";
                      }
                      else
                      { # URI contains no 'page'
                        // Add page
                        $redirect_baseURI .= "&page=";
                      }
                    ?>

                    <!-- Left button -->
                    <?php if (isset($promoted_pagination_total_page) && ($promoted_pagination_total_page > 3)): ?>
                      <?php if (isset($currentpage) && $currentpage == 1): ?>
                        <li class="paginationcontent left">
                          <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationleft0-min.png"></a></div>
                        </li>
                      <?php else: ?>
                        <li class="paginationcontent left">
                          <div><a href="{{$redirect_baseURI.($currentpage-1)}}"><img src="{{ URL::to('/') }}/img/courses/paginationleft1-min.png"></a></div>
                        </li>
                      <?php endif ?>
                    <?php endif ?>
                    
                    <?php if (isset($promoted_pagination_total_page)): ?>
                      <?php 
                        // Define pagination start & end 
                        $startpagination = 1;
                        $endpagination = $promoted_pagination_total_page;

                        if ($promoted_pagination_total_page > 5) 
                        { # Limit pagination
                          $startpagination = (($currentpage-2) < 1)?1:$currentpage-2;
                          $endpagination = (($currentpage+2) > $promoted_pagination_total_page)?$promoted_pagination_total_page:$currentpage+2;
                          $totalpagination = $endpagination - $startpagination;
                          // Set minimum pagination to 5
                          if ($totalpagination < 5) 
                          { # 
                            if ($currentpage == 1 || $currentpage == 2) 
                            { # endpagination to 5
                              $endpagination = 5;
                            } else if (($currentpage == $promoted_pagination_total_page-1) || ($currentpage == $promoted_pagination_total_page))
                            { # startpagination to -4
                              $startpagination = $promoted_pagination_total_page-4;
                            }
                          }
                        }
                      ?>

                      <?php for($ct=$startpagination;$ct<=$endpagination;$ct++) : ?>
                        <?php if (isset($currentpage) && $currentpage == $ct): ?>
                          <li class="paginationcontent active">
                            <div><a href="#"><h2><?=$ct?></h2></a></div>
                          </li>
                        <?php else: ?>
                          <li class="paginationcontent">
                            <div><a href="{{$redirect_baseURI.$ct}}"><h2><?=$ct?></h2></a></div>
                          </li>
                        <?php endif ?>
                      <?php endfor; ?>
                    <?php endif ?>

                    <!-- Right button -->
                    <?php if (isset($promoted_pagination_total_page) && ($promoted_pagination_total_page > 3)): ?>
                      <?php if (isset($currentpage) && $currentpage == $promoted_pagination_total_page): ?>
                        <li class="paginationcontent right">
                          <div><a href="#"><img src="{{ URL::to('/') }}/img/courses/paginationright0-min.png"></a></div>
                        </li>
                      <?php else: ?>
                        <li class="paginationcontent right">
                          <div><a href="{{$redirect_baseURI.($currentpage+1)}}"><img src="{{ URL::to('/') }}/img/courses/paginationright1-min.png"></a></div>
                        </li>
                      <?php endif ?>
                    <?php endif ?>
                  </ul>
                </div>
              </div>  
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End courses section -->
