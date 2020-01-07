  <!-- Start Accountinfo slider section -->
  <section id="sliderSection" class="homepageslider accountinfo">            
    <div class="mainslider_area" style="height: 100% !important">
      <img class="slideimage" src="{{ URL::to('/') }}/img/accountinfo-min.png" alt="accountinfo-img">
      <div class="slider_caption" style="display: flex; height: 100%; max-height: 600px;">
        <div style="margin: auto;">
          <h1 style="text-transform: uppercase; margin-top: 0px;" class="lad_homeslider">Account Info</h1>
        </div>
      </div>

      <?php if (false): ?>
        <!-- Remove this when the slider is stable -->
        <div id="slides" style="height: 100% !important">
          <ul class="slides-container">
            <li style="width: 102%;">
              <?php if (isset($header_contents)): ?>
                <img class="slideimage" src="{{ URL::to('/') }}<?=$header_contents->dashboard_image;?>" alt="img">
                <div class="slider_caption" style="display: flex; height: 100%; height: 100%; max-height: 600px;">
                  <div style="margin: auto;">
                    <h1 style="text-transform: uppercase; margin-top: 0px;" class="lad_homeslider"><?=$header_contents->dashboard_title;?></h1>
                    <p class="lad_homesliderquote"><?=$header_contents->dashboard_title_description;?></p>
                    <a class="slider_btn" href="{{ url('/browsecourses') }}">Learn Now</a>  
                  </div>
                </div>
              <?php endif ?>
            </li>
          </ul>
        </div>
      <?php endif ?>          
    </div>
  </section>
  <!-- End Accountinfo slider section -->

 <!-- start our knowledge partner area -->
  <section id="testimonial" style="background-color: #F5FAFF">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area wow fadeIn" data-wow-duration="1s">
            <div class="testimon_nav" style="width: 100%; margin-bottom: 30px;">
              <ul>
                <li class="accountinfoli">
                  <div class="accountinfocontents">
                    <div class="accountinfocontentstitle">
                      <img src="{{ URL::to('/') }}/img/individual-min.png" alt="img">
                    </div>
                    <div class="testimonial_content_text_div">
                      <div class="testimonial_content_text_content">
                        <p>Individual</p>
                        <div class="testimonial_content_text_content_list">
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Personalized Content</p>   
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Enroll for Courses</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Earn Badges</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listno-min.png" alt="logo">
                              <p>Post Courses</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content bottom">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listno-min.png" alt="logo">
                              <p>Request for & Submit Proposals</p>   
                            </div>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="signupplanbutton" id="accountinfo_signup_individual">
                      <div class="signupplanbuttoncontent">
                        <h2>Sign Up</h2>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="accountinfoli">
                  <div class="accountinfocontents">
                    <div class="accountinfocontentstitle">
                      <img src="{{ URL::to('/') }}/img/corporate-min.png" alt="img">
                    </div>
                    <div class="testimonial_content_text_div">
                      <div class="testimonial_content_text_content">
                        <p>Corporate</p>
                        <div class="testimonial_content_text_content_list">
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Personalized Content</p>   
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Enroll for Courses</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Earn Badges</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Post Courses</p> 
                            </div>
                          </div>
                          <div class="testimonial_content_text_content_list_content bottom">
                            <div class="contentcontainer">
                              <img src="{{ URL::to('/') }}/img/listyes-min.png" alt="logo">
                              <p>Request for & Submit Proposals</p>   
                            </div>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="signupplanbutton" id="accountinfo_signup_corporate">
                      <div class="signupplanbuttoncontent">
                        <h2>Sign Up</h2>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our knowledge partner area -->  
