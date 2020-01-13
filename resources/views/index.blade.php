  <!-- Start Homepage slider section -->
  <section id="sliderSection" class="homepageslider">  
    <div class="mainslider_area" style="height: 100% !important; background-color: #2D2D2D">
      <img class="slideimage" src="{{ URL::to('/') }}/img/banner_home.jpg" alt="img">
      <div class="slider_caption" style="display: flex; height: 100%; max-height: 600px;">
        <div style="margin: auto;">
          <img src="{{ URL::asset('img/KATARTIZO LOGO-01.png') }}" alt="img" width="50%">  
          <p class="lad_homesliderquote" style="margin-top: 0px;">Don't miss this chance, join us now! Click the button below to register!</p>
          <a class="slider_btn hvr-sweep-to-right" href="{{ url('/register') }}">Register Now</a>  
        </div>
      </div>    
    </div>
  </section>
  <!-- End Homepage slider section -->

  <!-- start Redefining Workplace Learing area -->
  <section id="ourTeam">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="team_area wow fadeIn" data-wow-duration="1s">
            <div class="team_title">
              <h2>OUR PURPOSES</h2>
              <hr class="title_hr">
            </div>
            <div class="team redefining">
              <ul class="team_nav">
                <li data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-offset="200">
                  <div class="team_img">
                    <i class="fas fa-level-up-alt purposes_icon"></i>
                  </div>
                  <div class="team_content">
                    <h4>Upgrading</h4>
                    <p>Meningkatkan kapasitas para pelayan Tuhan untuk semakin dipertajam dalam pelayanan kepada jiwa-jiwa secara praktis.</p>
                  </div>
                </li>

                <li data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-offset="200">
                  <div class="team_img">
                    <i class="fas fa-globe-asia purposes_icon"></i>
                  </div>
                  <div class="team_content">
                    <h4>Commissioning</h4>
                    <p>Mengutus para pelayan Tuhan yang sudah dipersiapkan secara praktis untuk ditempatkan sesuai kebutuhan cabang gereja, visi dan panggilan Tuhan.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Redefining Workplace Learing area -->

  <!-- start Request customized courses area -->
  <section id="howWorks" style="width: 100%;/*background-image: url('{{ URL::to('/') }}/img/gear.png');*/background-size: cover;">
    <div class="container">
      <div class="row wow fadeIn" data-wow-duration="1s">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="client_title" style="margin-top: 4%">
            <h2 style="text-transform: uppercase;"><span style="color: #fff; font-weight: 300">Our Story</span></h2>
            <hr class="title_hr">
          </div>
          <div class="howworks_area" data-aos="flip-left" style="background-image: url('{{ URL::to('/') }}/img/backstory.jpg'); background-size: cover;
    background-position: center;">
            <div class="browsemore">
              <!-- <h2 id="index_request_title">Corporate Solutions</h2> -->
              <!-- <h3 class="question">Did not find what you are looking for?</h3> -->
              <h3 class="lower">Sukawarna Mission Academy (SMA) adalah wadah pelatihan untuk meningkatkan kapabilitas para pelayan Tuhan yang siap pakai dan serba bisa dalam menggenapi Amanat Agung Tuhan Yesus. SMA berupaya menjawab kebutuhan akan pendidikan praktis dari para pengajar yang berlatar belakang pengalaman di bidangnya sehingga dapat lebih maksimal dalam mendidik para peserta didik.</h3>
              <h3 class="lower">Di masa pencurahan Roh Kudus terakhir dan terbesar yang sering diistilahkan sebagai era Pentakosta ke-3 ini, SMA menjadi sarana praktis untuk memperlengkapi dan mengutus para pelayan Tuhan yang rindu terlibat langsung penggenapan Amanat Agung Tuhan Yesus di lapangan.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Request customized courses area -->

  <!-- Start Trusted By area -->
  <section id="trustedby">
    <div class="container wow fadeIn" data-wow-duration="1s">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="trustedby_area">
          <div class="team_title">
            <h2>JOIN US</h2>
            <hr class="title_hr">
          </div>
          <div class="trusted_contents hidden">
            <ul class="home_small">
              <?php if (isset($trusted_by) && count($trusted_by) > 0): ?>
                <?php foreach ($trusted_by as $tbcontents): ?>
                  <li class="trustedby_image">
                    <a target="_blank" title="<?=$tbcontents->name;?>">
                      <img src="{{ URL::to('/') }}<?=$tbcontents->image;?>" align="left">
                    </a>
                  </li>
                <?php endforeach ?>
              <?php endif ?>              
            </ul>
          </div>

          <div class="align-center" data-aos = "flip-up">
            <div class="info-box" style="background-image: url('{{ URL::to('/') }}/img/register.jpg'); background-size: cover;
    background-position: center;">

              <div class="info-text-container" data-aos ="fade-in" data-aos-duration="2000">
                <h2>LOCATION</h2>
                <h3>GBI Sukawarna cabang Aruna</h3>
                <h3>Pkl 18.00 - 22.00 WIB</h3>
                <br>
                <h2>TUITION FEE</h2>
                <h3>Rp 1.000.000,-</h3>
                <p style="font-weight: 100">(Belum termasuk biaya wisuda Rp 250.000,-)</p>

                <a class="slider_btn hvr-icon-up" href="{{ url('/register') }}" style="font-weight: 600;margin-top: 20px; font-size: 20px;">Register Now<i class="fas fa-user-plus hvr-icon" style="margin-left: 15px;"></i></a> 
              </div>
            </div>
          </div>

          <div class="align-center learn-more-container" data-aos="fade-right">
            <a class="slider_btn hvr-bounce-to-bottom" href="http://localhost/sma/public/lecturers">Learn More About Our Lecturers</a>
          </div>

          <div class="align-center learn-more-container" data-aos="fade-left">
            <a class="slider_btn hvr-bounce-to-bottom" href="http://localhost/sma/public/curriculum">Learn More About Our Curriculum</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Trusted By area -->

  <!-- Start Service area -->
  <section id="service" class="homepagequotes hidden">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="lad_service_area">
          <ul class="home_small wow fadeIn" data-wow-duration="1s">
            <!-- Static Contents -->
            <li class="col-md-4">
              <a href="{{ url('/browsecourses') }}">
                <div class="homepageslidercaptions">
                  <img src="{{ URL::to('/') }}/img/features11-min.png" align="left">
                  <h2>Discover workplace-centric<br/>courses</h2>    
                </div>
              </a>
            </li>
            <li class="col-md-4">
              <a href="{{ url('/achievements') }}">
                <div class="homepageslidercaptions">
                  <img src="{{ URL::to('/') }}/img/features21-min.png" align="left">
                  <h2>Build your professional<br/>achievements</h2>    
                </div>
              </a>
            </li>
            <li class="col-md-4">
              <a href="#trustedby" id="lad_index_a3">
                <div class="homepageslidercaptions">
                  <img src="{{ URL::to('/') }}/img/features31-min.png" align="left">
                  <h2>Trusted by world's leading<br/>companies</h2>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <img style="max-width: 100%; max-height: 100%;" src="{{ URL::to('/') }}/img/separator-min.png" align="left">
      </div>
    </div>
  </section>
  <!-- End Service area -->

  <!-- start popular training topic section -->
  <section id="priceSection" class="hidden">
    <div class="container">
      <div class="row wow fadeIn" data-wow-duration="1s">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="client_title">
            <h2 style="text-transform: uppercase;"><a href="{{ url('/browsecourses') }}" style="color: inherit">Browse Courses</a></h2>
          </div>
          <!-- <div class="categorybutton">
            <a href="#" class="leftbutton active">Top Rated</a>
            <a href="#" class="middlebutton">Trending</a>
            <a href="#" class="rightbutton">New</a>
          </div> -->

          <div class="categorybutton">
            <ul class="nav nav-pills">
              <li class="leftbutton active">
                <a data-toggle="pill" href="#featured">Featured</a>
              </li>
              <li class="middlebutton">
                <a data-toggle="pill" href="#trending">Trending</a>
              </li>
              <li class="rightbutton">
                <a data-toggle="pill" href="#newcourses">New</a>
              </li>
            </ul>
          </div>

          <div class="tab-content ">
            <div id="featured" class="tab-pane fade in active">
              <!-- Start Top Rated area -->
              <div class="pricearea homepagetopics">
                <ul class="price_nav">
                  <?php if (isset($courses['featured']) && (count($courses['featured']) > 0)): ?>
                    <?php foreach ($courses['featured'] as $trcourse): ?>
                      <li class="homepagelist">
                        <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                          <div class="homepagelistimage"><img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img"></div>
                          <h3 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->title))?$trcourse->title:'';?></h3>
                          <h2 class="courselecturer line-clamp line-clamp-1"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></h2>
                          <h2 class="courseprice"><?php if($trcourse->price == 0){ 
                                                            echo 'FREE';
                                                        }else{
                                                            echo $trcourse->symbol?><?=(isset($trcourse->price))?number_format($trcourse->price,2,".",","):'';}?></h2>
                        </a>
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>
                </ul>
              </div>
              <!-- End Top Rated area -->
            </div>
            <div id="trending" class="tab-pane fade">
              <!-- Start Top Rated area -->
              <div class="pricearea homepagetopics">
                <ul class="price_nav">
                  <?php if (isset($courses['trending']) && (count($courses['trending']) > 0)): ?>
                    <?php foreach ($courses['trending'] as $trcourse): ?>
                      <li class="homepagelist">
                        <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                          <div class="homepagelistimage "><img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img"></div>
                          <h3 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->title))?$trcourse->title:'';?></h3>
                          <h2 class="courselecturer line-clamp line-clamp-1"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></h2>
                          <h2 class="courseprice"><?php if($trcourse->price == 0){ 
                                                            echo 'FREE';
                                                        }else{
                                                            echo $trcourse->symbol?><?=(isset($trcourse->price))?number_format($trcourse->price,2,".",","):'';}?></h2>
                        </a>
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>
                </ul>
              </div>
              <!-- End Top Rated area -->
            </div>
            <div id="newcourses" class="tab-pane fade">
              <!-- Start Top Rated area -->
              <div class="pricearea homepagetopics">
                <ul class="price_nav">
                  <?php if (isset($courses['new']) && (count($courses['new']) > 0)): ?>
                    <?php foreach ($courses['new'] as $trcourse): ?>
                      <li class="homepagelist">
                        <a href="{{ URL::to('/') }}<?=(isset($trcourse->coursecode))?'/coursedetail/'.$trcourse->coursecode:'/browsecourses/';?>">
                          <div class="homepagelistimage"><img src="{{ env('S3_URL') }}<?=(isset($trcourse->image))?$trcourse->image:'';?>" alt="img"></div>
                          <h3 class="coursetitle line-clamp line-clamp-2"><?=(isset($trcourse->title))?$trcourse->title:'';?></h3>
                          <h2 class="courselecturer line-clamp line-clamp-1"><?=(isset($trcourse->courselecturer))?$trcourse->courselecturer:'';?></h2>
                          <h2 class="courseprice"><?php if($trcourse->price == 0){ 
                                                            echo 'FREE';
                                                        }else{
                                                            echo $trcourse->symbol?><?=(isset($trcourse->price))?number_format($trcourse->price,2,".",","):'';}?></h2>
                        </a>
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>
                </ul>
              </div>
              <!-- End Top Rated area -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End popular training topic section -->

  <!-- start our knowledge partner area -->
  <section id="testimonial" class="hidden">
    <div class="container">
      <div class="row wow fadeIn" data-wow-duration="1s">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area">
            <div class="client_title">
              <h2>Our Knowledge Partners</h2>
            </div>
            <div class="testimon_nav">
              <ul>
                <?php if (isset($okp) && count($okp) > 0): ?>
                  <?php foreach ($okp as $okpcontents): ?>
                    <li>
                      <div class="testimonial_content">
                        <div class="testimonial_content_title">
                          <div class="testimonial_content_title_div">
                            <a class="testimonial_content_title_image" href="<?php echo $okpcontents->linked_url?>">
                              <img src="{{ URL::to('/') }}<?=$okpcontents->image;?>" alt="img">
                            </a>
                            <div class="testimonial_content_title_name">
                              <?=$okpcontents->name;?>
                            </div>
                          </div>
                        </div>
                        <div class="testimonial_content_text_div">
                          <div class="testimonial_content_text_content">
                            <?=$okpcontents->description;?>
                          </div>  
                        </div>
                      </div>
                    </li>
                  <?php endforeach ?>
                <?php endif ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our knowledge partner area -->  

  <!-- start special quote -->
  <section id="specialQuote" class="hidden">
    <div class="container">
      <div class="row wow fadeIn" data-wow-duration="1s">
        <div class="col-lg-12 col-md-12">
          <input type="text" name="search" class="subscribe-field" placeholder="Email Address">
          <button class="subscribebutton" name="subscribe">Subscribe</button>
        </div>
      </div>
    </div>
  </section>
  <!-- End special quote -->
