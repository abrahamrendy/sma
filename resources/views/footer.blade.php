  <!-- start footer -->
  <footer id="footer" style="width: 100%; display: block;">
    <div class="container">
      <div class="row lad_footer">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="footer_top">
            <div class="footer_container">
              <div class="col-lg-23 col-md-23 col-sm-23 footer_left">
                <div class="single_footer_top">
                  <ul class="footer_small">
                    <li style="margin-top: 0px;"><img class="ladicon" src="{{ URL::to('/') }}/img/KATARTIZO LOGO-01.png" alt="img"></li>
                    <li>
                      <ul class="single_footer_top_sublist">
                        <li><a target="_blank" href="https://www.facebook.com/LAD-252603775224485/"><img src="{{ URL::to('/') }}/img/footer/facebook-min.png" alt="img"></a></li>
                        <li><a target="_blank" href="https://twitter.com/LADGlobal"><img src="{{ URL::to('/') }}/img/footer/twitter-min.png" alt="img"></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/channel/UC2UA5LXtiLRiveSY27BtP-g"><img src="{{ URL::to('/') }}/img/footer/youtubewhite-min.png" alt="img"></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/company-beta/13353442"><img src="{{ URL::to('/') }}/img/footer/linkedin-min.png" alt="img"></a></li>
                      </ul>
                    </li>
                    <li class="copyright">Copyright &#9400; <?php echo date("Y");?> GBI Sukawarna. All Rights Reserved.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </footer>
  <footer id="mobile_footer" style="width: 100%; display: none; text-align: center">
    <div class="container">
      <div class="row lad_footer" style="margin-left: -60px; margin-right: -60px;">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="footer_top">
            <div class="footer_container">

              <div class="col-lg-4 col-md-4 col-sm-4 footer_left">
                <div class="single_footer_top">
                  <ul class="footer_small mobile">
                    <li style="margin-top: 0px; margin-bottom: 20px;"><img class="ladicon" src="{{ URL::to('/') }}/img/KATARTIZO LOGO-01.png" alt="img"></li>
                    <li>
                      <ul class="single_footer_top_sublist">
                        <li><a target="_blank" href="https://www.facebook.com/LAD-252603775224485/"><img src="{{ URL::to('/') }}/img/footer/facebook-min.png" alt="img"></a></li>
                        <li><a target="_blank" href="https://twitter.com/LADGlobal"><img src="{{ URL::to('/') }}/img/footer/twitter-min.png" alt="img"></a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/img/footer/instagram-min.png" alt="img"></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/company-beta/13353442"><img src="{{ URL::to('/') }}/img/footer/linkedin-min.png" alt="img"></a></li>
                      </ul>
                    </li>
                    <li class="copyright">Copyright &#9400; <?php echo date("Y");?> GBI Sukawarna. All Rights Reserved.</li>            
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </footer>

  <!-- End footer -->
  
  <!-- jQuery Library -->
  <!-- Moment.js Library -->
  <script src="{{ URL::to('/') }}/js/moment.js"></script>
  <!-- For content animatin  -->
  <script src="{{ URL::to('/') }}/js/wow.min.js"></script>
  <!-- bootstrap js file -->
  <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script> 
  <!-- superslides slider -->
  <script src="{{ URL::to('/') }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ URL::to('/') }}/js/jquery.animate-enhanced.min.js"></script>
  <script src="{{ URL::to('/') }}/js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>
  <!-- slick slider js file -->
  <script src="{{ URL::to('/') }}/js/slick.min.js"></script>
  <!-- DATA TABLES -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  
  <!-- Google map -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="{{ URL::to('/') }}/js/jquery.ui.map.js"></script> -->

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- custom js file include -->
  <script src="{{ URL::to('/') }}/js/custom.js"></script>  
  <script src="{{ URL::to('/') }}/js/modal.js"></script>  

  <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.js"></script> 
  <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.min.js"></script>  
  <script src="{{ URL::to('/') }}/js/bootstrap-datetimepicker.min.js"></script>  

  <!-- Google Sign-in Platform Library -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <!-- <script src="https://apis.google.com/js/api:client.js"></script> -->

  <!-- Google Sign-in Custom Scripts -->
  <!-- <script type="text/javascript">
    var googleUser = {};
    var startApp = function() {
      gapi.load('auth2', function(){
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
          client_id: '798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com',
          cookiepolicy: 'single_host_origin',
          // Request scopes in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('customgooglesigninbutton'));
      });
    };

    function attachSignin(element) {
      // console.log(element.id);
      auth2.attachClickHandler(element, {},
          function(googleUser) {
            document.getElementById('googleusername').innerText = googleUser.getBasicProfile().getName();
          }, function(error) {
            alert(JSON.stringify(error, undefined, 2));
          });
    }
    
  </script>
  <script type="text/javascript">
    startApp();
  </script> -->
  </body>
</html>