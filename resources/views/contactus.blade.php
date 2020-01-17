<style type="text/css">
    .form-check-inline {
        display: inline-block;
    }
    .contactusform > .smallerdiv > input[tabindex='1'] {
        width: 32%;
    }
    @media(max-width: 767px) {
        .contactusform > .smallerdiv > input[tabindex='1'] {
            width: 100%;
        }
    }
</style>

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
        <img class="slideimage" src="{{ URL::to('/') }}/img/register.png" alt="contactus-img">
        <div class="slider_caption" style="display: flex; height: 100%; max-height: 600px;">
            <div style="margin: auto;">
              <!-- <h1 style="text-transform: uppercase; margin-top: 0px;" class="lad_homeslider">REGISTER</h1> -->
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
                <?php if (!isset($output)) {?>
                  <h2>REGISTER</h2>
                  <hr class="title_hr">
                <?php } else { ?>
                    <?php if ($output['code'] == '0') {?>
                        <h2>Thank you!</h2>
                        <h3>You've completed your registration proccess.</h3>
                        <h3>You can complete your payment <a href="{{ route ('confirm_payment')}}" style="font-weight: 500; color: #A37A2D">here</a></h3>
                    <?php } else { ?>
                        <?php if ($output['code'] == '2') {?>
                            <h2>Sorry an error occured!</h2>
                            <h3>You can re-register <a href="{{ route ('register')}}" style="font-weight: 500; color: #A37A2D">here</a>!</h3>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if (!isset($output)) {?>
            <form id="contactusform" data-aos="fade-up" action="{{ route('register_submit') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="contactusform">
                <div class="smallerdiv">
                  <input type="text" name="firstname" tabindex="1" placeholder="Nama" class="login_email" required>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                      <label class="form-check-label" for="inlineRadio1">(L)</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                      <label class="form-check-label" for="inlineRadio2">(P)</label>
                    </div>
                  <input type="text" name="ttl" tabindex="2" placeholder="TTL" class="login_email datepicker-normal" required>
                  <input type="email" name="email" tabindex="3" placeholder="Email" class="login_email" required>
                  <input type="text" name="alamat" tabindex="4" placeholder="Alamat" class="login_email">
                  <input type="text" name="phone" tabindex="3" placeholder="No. HP/WA" class="login_email" id="contactus_phone">
                  <input type="text" name="statuspelayanan" tabindex="6" placeholder="Status Pelayanan" class="login_email">
                  <textarea type="text" name="message" tabindex="7" placeholder="Tujuan Mendaftar" class="login_email" rows = 4 required></textarea>

                  <div class="upload-btn-container">
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Akte Baptis</button>
                            <input type="file" class='up' name="akte" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload KTP</button>
                            <input type="file" class='up' name="ktp" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Ijazah</button>
                            <input type="file" class='up' name="ijazah" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Pas Foto</button>
                            <input type="file" class='up' name="pasfoto" required onchange="readURL(this);" />
                            <span style="display: block;">No file selected</span>
                      </div>
                  </div>
                  
                </div>
                <div class="submitdiv">
                  <button type="submit" name="contact_button" tabindex="9" class="signinmodalbutton2 hvr-underline-from-center" id = 'contactusbutton'>Submit</button>
                </div>
              </div>
            </form>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End special quote -->

  <!-- start our knowledge partner area -->
  <section id="testimonial" class="hidden">
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

  <script type="text/javascript">
      $(document).on('change','.up', function(){
        console.log('asdf');
            var names = [];
            var length = $(this).get(0).files.length;
            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                names.push($(this).get(0).files[i].name);
            }
            // $("input[name=file]").val(names);
            if(length>2){
              var fileName = names.join(', ');
              $(this).closest('.upload-btn-wrapper').find('span').text(length+" files selected");
            }
            else{
                $(this).closest('.upload-btn-wrapper').find('span').text(names);
            }
       });
  </script>

  
