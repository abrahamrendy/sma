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

  <!-- start special quote -->
  <section id="contactusformsection" style="padding: 0px;margin-top: 5%;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 wow fadeIn" data-wow-duration="1s">
          <div class="trustedby_area">
            <div class="team_title" style="margin-bottom: 3%;">
                <?php if (!isset($output)) {?>
                  <h2>DOCUMENTS UPLOAD</h2>
                  <hr class="title_hr">
                <?php } else { ?>
                    <?php if ($output['code'] == '0') {?>
                        <h2>Terima kasih!</h2>
                        <h3>Anda telah berhasil menyelesaikan proses kelengkapan dokumen anda.</h3>
                        <h3>Jika anda belum menyelesaikan proses pembayaran, mohon untuk segera menyelesaikan proses pembayaran anda.</h3>
                    <?php } else { ?>
                        <?php if ($output['code'] == '2') {?>
                            <h2>Sorry an error occured!</h2>
                            <h3>You can re-submit <a href="{{ route ('upload_document')}}" style="font-weight: 500; color: #A37A2D">here</a>!</h3>
                        <?php } else { ?>
                          <?php if ($output['code'] == '3') {?>
                            <h2>Nama atau Email tidak terdaftar. Mohon mengisi dengan nama atau email yang sama seperti waktu mendaftar.</h2>
                            <h3>Re-submit <a href="{{ route ('upload_document')}}" style="font-weight: 500; color: #A37A2D">here</a>!</h3>
                          <?php }?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if (!isset($output)) {?>
            <form id="contactusform" data-aos="fade-up" action="{{ route('submit_upload_document') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="align-center">
                    <div class="align-center">
                      <h3 style="font-weight: 300">1. Foto copy Akte Baptisan.</h3>
                      <h3 style="font-weight: 300">2. Foto copy KTP.</h3>
                      <h3 style="font-weight: 300">3. Foto copy Ijazah terakhir.</h3>
                      <h3 style="font-weight: 300">4. Pas foto 3x4.</h3>
                    </div>
                  </div>

              <div class="contactusform">
                <div class="smallerdiv">
                  <input type="text" name="firstname" tabindex="1" placeholder="Nama" class="login_email" required>
                  <input type="email" name="email" tabindex="3" placeholder="Email" class="login_email" required>

                  <div class="upload-btn-container">
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Akte Baptis</button>
                            <input type="file" class='up' name="akte" onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload KTP</button>
                            <input type="file" class='up' name="ktp" onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Ijazah</button>
                            <input type="file" class='up' name="ijazah" onchange="readURL(this);" />
                            <span style="display: block; cursor: pointer;">No file selected (Max size 8 MB)</span>
                      </div>
                      <div class="upload-btn-wrapper">
                            <button class="btn">Upload Pas Foto</button>
                            <input type="file" class='up' name="pasfoto" onchange="readURL(this);" />
                            <span style="display: block;">No file selected (Max size 8 MB)</span>
                      </div>
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

  
