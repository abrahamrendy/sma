  <!-- standard and simple pop-up -->
  <div id="contactus-confirmation-modal" class="modal" style="z-index: 39; padding-top: 0%">
    <div class="account-modal-content">
      <div class="account-modal-content-small" style="width: 35%">
        <!-- SUGGESTED APPOINTMENT ACCEPTED POP-UP -->
        <div id = "accepted-appointment-proposal" class="row modal-body">
          <div class="tellus-modal-finish-container" style="height: 320px;">
            <div class="tellus-modal-finish-small">
              <div class="title">
                Thank you for contacting us!
              </div>
              <div class="content util-font-black">
                We will send reply to your email as soon as possible
              </div> 
              <div class="content" style="margin-top: 60px;">
                <span id ='contactusconfirmationclose'>Close</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- end of standard and simple pop-up -->

  <!-- Start Contactus slider section -->
  <section id="sliderSection" class="homepageslider">            
    <div class="mainslider_area">
        <img class="slideimage hidden" src="{{ URL::to('/') }}/img/contactus/contactusimage-min.png" alt="contactus-img">
        <div class="slider_caption" style="display: flex; height: 100%; max-height: 600px;">
            <div style="margin: auto;">
              <h1 style="text-transform: uppercase; margin-top: 0px;" class="lad_homeslider">REGISTER</h1>
            </div>
        </div>
      
    </div>
  </section>
  <!-- End Contactus slider section -->

  <!-- start special quote -->
  <section id="contactusformsection" style="padding: 0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 wow fadeIn" data-wow-duration="1s">
          <div class="trustedby_area">
            <div class="team_title" style="margin-bottom: 3%;">
              <h2>REGISTER</h2>
              <hr class="title_hr">
            </div>
            <form id="contactusform" data-aos="fade-up">
              <div class="contactusform">
                <div class="smallerdiv">
                  <input type="text" name="firstname" tabindex="1" placeholder="Nama" class="login_email" required>
                  <input type="text" name="lastname" tabindex="2" placeholder="TTL" class="login_email" required>
                  <input type="email" name="email" tabindex="3" placeholder="Email" class="login_email" required>
                  <input type="text" name="company" tabindex="4" placeholder="Alamat" class="login_email">
                  <input type="text" name="phone" tabindex="3" placeholder="No. HP/WA" class="login_email" id="contactus_phone">
                  <input type="text" name="interestedin" tabindex="6" placeholder="Status Pelayanan" class="login_email">
                  <textarea type="text" name="message" tabindex="7" placeholder="Tujuan Mendaftar" class="login_email" rows = 4 required></textarea>
                </div>
                <div class="submitdiv">
                  <button type="submit" name="contact_button" tabindex="9" class="signinmodalbutton2 hvr-underline-from-center" id = 'contactusbutton'>Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End special quote -->

  <!-- start our knowledge partner area -->
  <section id="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area contactus wow fadeIn" data-wow-duration="1s">
            <div class="client_title connectwithustitle" style="margin-bottom: 3%;">
              <h2>CONNECT WITH US</h2>
              <hr class="title_hr">
            </div>
            <div class="connectwithusdiv" data-aos ="fade-right">
              <ul class="single_footer_top_sublist connectwithus">
                <li><a target="_blank" href="https://www.facebook.com/LAD-252603775224485/"><img src="{{ URL::to('/') }}/img/contactus/facebookblue-min.png" alt="img"></a></li>
                <li><a target="_blank" href="https://twitter.com/LADGlobal"><img src="{{ URL::to('/') }}/img/contactus/twitterblue-min.png" alt="img"></a></li>
                <li><a target = "_blank" href="https://www.youtube.com/channel/UC2UA5LXtiLRiveSY27BtP-g"><img src="{{ URL::to('/') }}/img/contactus/youtube-min.png" alt="img"></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/company-beta/13353442"><img src="{{ URL::to('/') }}/img/contactus/linkedinblue-min.png" alt="img"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our knowledge partner area -->  

  
