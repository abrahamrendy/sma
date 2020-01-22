<style type="text/css">
    .form-check-inline {
        display: inline-block;
    }
    .contactusform > .smallerdiv > input[tabindex='1'] {
        width: 32%;
    }
    .info-box {
      height: auto;
      padding: 0%; 
      margin-top: 0%; 
    }
    .info-box h3 {
      font-weight: 300 !important;
    }
    @media(max-width: 767px) {
        .contactusform > .smallerdiv > input[tabindex='1'] {
            width: 100%;
        }
    }

    .switch-field-container {
      background-color: #FFFFFF;
      border: 1px solid #D5D5D5;
      border-radius: 3px;
      padding: 20px;
      margin: 20px auto;
      width: 82%;
    }

    .switch-field {
      overflow: hidden;
      text-align: center;
    }

    .switch-field input {
      position: absolute !important;
      clip: rect(0, 0, 0, 0);
      height: 1px;
      width: 1px;
      border: 0;
      overflow: hidden;
    }

    .switch-field label {
      background-color: #e4e4e4;
      color: rgba(0, 0, 0, 0.6);
      font-size: 14px;
      line-height: 1;
      text-align: center;
      padding: 8px 16px;
      margin-right: -1px;
      border: 1px solid rgba(0, 0, 0, 0.2);
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
      transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
      cursor: pointer;
    }

    .switch-field input:checked + label {
      background-color: #A37A2D;
      color: white;
      box-shadow: none;
    }

    .switch-field label:first-of-type {
      border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
      border-radius: 0 4px 4px 0;
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
<?php if (!isset($output)) {?>
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

  <!-- Start Trusted By area -->
  <section id="trustedby">
    <div class="container wow fadeIn" data-wow-duration="1s">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="trustedby_area">
 
          <div class="team_title">
            <h2>SYARAT DAN KETENTUAN</h2>
            <hr class="title_hr">
          </div>
          <div class="align-center" data-aos = "flip-up">
            <div class="info-box">
              <div class="align-center">
                <h3>1. Lahir baru (lampirkan riwayat pertobatan).</h3>
                <h3>2. Minimal lulus SLTA atau setara.</h3>
                <h3>3. Lampirkan riwayat pelayanan (bagi yang sudah melayani).</h3>
              </div>
            </div>

          <div class="trustedby_area">
            <div class="team_title">
            <h2>KELENGKAPAN ADMINISTRASI</h2>
            <hr class="title_hr">
          </div>
          <div class="align-center" data-aos = "flip-up">
            <div class="info-box">
              <div class="align-center">
                <h3>1. Foto copy Akte Baptisan.</h3>
                <h3>2. Foto copy KTP.</h3>
                <h3>3. Foto copy Ijazah terakhir.</h3>
                <h3>4. Pas foto 3x4 sebanyak 2 lembar.</h3>
                <br>
                <h2>TUITION FEE</h2>
                <h3>Rp 1.000.000,-</h3>
                <p class= "additional-info" style="font-weight: 300; font-size: 18pt">(Belum termasuk biaya wisuda Rp 250.000,-)</p>
                <br>
                <h2>PENDAFTARAN</h2>
                <h3>20 JANUARI 2020 - 14 FEBRUARI 2020</h3>
                <p class= "additional-info" style="font-weight: 300; font-size: 18pt">KELAS DIMULAI TANGGAL 17 FEBRUARI 2020</p>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
  <!-- End Trusted By area -->

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
                      <br>
                      <br>
                      <br>
                        <h2>Thank you!</h2>
                        <h3>You've completed your registration proccess.</h3>
                        <h3>You can complete your payment <a href="{{ route ('confirm_payment')}}" style="font-weight: 500; color: #A37A2D">here</a> or click the button below.</h3>

                        <a class="slider_btn hvr-icon-up" href="{{ url('/confirmation') }}" style="margin-top: 50px; font-size: 20px;">Payment Confirmation<i class="fa fa-check-circle hvr-icon" style="margin-left: 15px;"></i></a> 

                    <?php } else { ?>
                        <?php if ($output['code'] == '2') {?>
                            <br>
                            <br>
                            <br>
                            <h2>Sorry!</h2>
                            <h3><?php echo $output['message']; ?></h3>
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

                  <div class="switch-field-container">
                    <p style="font-style: normal; font: inherit;">Apakah bersedia praktek pelayanan di gereja cabang GBI Sukawarna Bandung (selama 1 hari)?</p>
                    <div class="switch-field">
                      <input type="radio" id="radio-one" name="praktek" value="1" checked/>
                      <label for="radio-one">Ya</label>
                      <input type="radio" id="radio-two" name="praktek" value="0" />
                      <label for="radio-two">Tidak</label>
                    </div>
                  </div>

                  <div class="upload-btn-container">
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Akte Baptis</button>
                            <input type="file" class='up' name="akte" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload KTP</button>
                            <input type="file" class='up' name="ktp" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Ijazah</button>
                            <input type="file" class='up' name="ijazah" required onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Pas Foto</button>
                            <input type="file" class='up' name="pasfoto" required onchange="readURL(this);" />
                            <span style="display: block;">No file selected (Max size 8 MB)</span>
                      </div>
                  </div>
                  
                </div>
                <div class="submitdiv">
                  <button type="submit" name="contact_button" tabindex="9" class="signinmodalbutton2 hvr-underline-from-center" id = 'contactusbutton'>Submit</button>
                </div>

                <a class="slider_btn hvr-icon-up" href="{{ url('/confirmation') }}" style="margin-top: 50px; font-size: 20px;">Payment Confirmation<i class="fa fa-check-circle hvr-icon" style="margin-left: 15px;"></i></a> 
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
  <section id="testimonial" class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="testimonial_area contactus wow fadeIn" data-wow-duration="1s">
            <div class="client_title connectwithustitle" style="margin-bottom: 3%;">
              <h2>CONNECT WITH US</h2>
              <hr class="title_hr">
            </div>
            <div class="align-center learn-more-container" data-aos="fade-right">
              <div class="slider_btn hvr-bounce-to-bottom">Pdp. Yogie Tazir : 0857-0237-4347</div>
            </div>

            <div class="align-center learn-more-container" data-aos="fade-left">
              <div class="slider_btn hvr-bounce-to-bottom">Pdp. Adi Darta : 0818-0930-6000</div>
            </div>
            <div class="connectwithusdiv hidden" data-aos ="fade-right">
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

  
