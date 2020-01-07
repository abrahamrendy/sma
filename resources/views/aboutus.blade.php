  <!-- Start About Us slider section -->
  <section id="sliderSection" class="homepageslider">            
    <div class="mainslider_area">
      <img class="slideimage" src="{{ URL::to('/') }}/img/aboutusimage-min.png" alt="aboutus-img">
      <div class="slider_caption" style="height: 100%; max-height: 600px; display: flex;">
        <h1 style="text-transform: uppercase; margin: auto;" class="lad_aboutusslider">Redefine Workplace Learning</h1>
      </div>
      <?php if (false): ?>
        <!-- Remove this when the slider is stable -->
        <div id="slides">
          <ul class="slides-container">
            <li>
              <!-- Static Contents -->
              <img class="slideimage" src="{{ URL::to('/') }}/img/aboutusimage-min.png" alt="aboutus-img">
              <div class="slider_caption" style="height: 100%; max-height: 600px; display: flex;">
                <h1 style="text-transform: uppercase; margin: auto;" class="lad_aboutusslider">Empower Yourself</h1>
              </div>
            </li>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </section>
  <!-- End About Us slider section -->

  <!-- start Our Story area -->
  <section id="testimonial" class="ourstory">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area wow fadeIn" data-wow-duration="1s">
            <div class="client_title" style="margin-bottom: 20px;">
              <h2>Our Story</h2>
            </div>
            <div class="aboutus_ourstory">
              <p align="justify" style="line-height: 27px; letter-spacing: 1.2px;">
                LAD is an online global platform that enables and facilitates learning & development professionals and organisations to develop and grow into global enterprise. We are redefining workplace learning by offering an inclusive platform for all, focuses on work-centric contents, holistic solutions for talent development professionals and data-driven insights.
              </p>
            </div>
            <div class="util-text-align-center">
              <a class="big_blue_button" target="_blank" href="{{URL::to('/')}}/download/Letter to Global L&D Community by Robert Yeo.pdf">READ OUR CHAIRMAN'S MESSAGE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Our Story area --> 

  <!-- start Video area -->
  <section id="testimonial" class="ourstory video">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area wow fadeIn" data-wow-duration="1s">
            <div class="aboutus_ourstory video">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/_CkcuB_UUEA" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Video area --> 

  <!-- start Leadership Team section -->
  <section id="priceSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 animated wow fadeIn" data-wow-duration="1s">
          <div class="client_title" style="margin-bottom: 20px;">
            <h2>Leadership Team</h2>
          </div>
          <div id="toprated" class="tab-pane fade in active">
            <div class="pricearea homepagetopics">
              <ul class="price_nav aboutusleadershipteam">
                <!-- Static Contents -->
                <li>
                  <img src="{{ URL::to('/') }}/img/LADTeam/robert-yeo-min.png" alt="img">
                  <h2>Robert Yeo</h2>
                  <h2>Chairman</h2>
                </li>
                <li>
                  <img src="{{ URL::to('/') }}/img/LADTeam/anton-widodo-min.png" alt="img">
                  <h2>Anton Widodo</h2>
                  <h2>CEO</h2>
                </li>
                <li>
                  <img src="{{ URL::to('/') }}/img/LADTeam/roy-lai-min.png" alt="img">
                  <h2>Roy Lai</h2>
                  <h2>Director</h2>
                </li>
                <li>
                  <img src="{{ URL::to('/') }}/img/LADTeam/david-tay-min.png" alt="img">
                  <h2>David Tay</h2>
                  <h2>Director</h2>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Leadership Team section -->

  <!-- Start Powered By area -->
  <section id="trustedby">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="trustedby_area wow fadeIn" data-wow-duration="1s">
          <div class="team_title aboutus" style="margin-bottom: 50px;">
            <h2 class="smaller">Backed & Powered&nbsp;&nbsp;by STADA</h2>
          </div>
          <div class="aboutus_partnership">
            <a target="_blank" href="http://www.stada.org.sg"><img src="{{ URL::to('/') }}/img/stadalogowithtagline_transparent-big-min.png"></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Powered By area --> 