<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta name="description" content="LAD is an online global platform that enables and facilitates learning & development professionals and organisations to develop and grow into global enterprise.">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="LAD Global Development Team">

    <!-- Google Sign-in Client ID -->
    <meta name="google-signin-client_id" content="798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title)?$title:'LAD Global | Free Workplace Learning and Customized Training Platform' }}</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <!-- for fontawesome icon css file -->
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- superslides css -->
    <link rel="stylesheet" href="{{ URL::asset('css/superslides.css') }}">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">    
    <!-- slick slider css file -->
    <link href="{{ URL::asset('css/slick.css') }}" rel="stylesheet">        
    <!-- website theme color file -->   
    <link id="switcher" href="{{ URL::asset('css/themes/lad-theme.css') }}" rel="stylesheet">    
    <!-- main site css file -->    
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">    
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">    
    <link href="{{ URL::asset('css/modal.css') }}" rel="stylesheet">    
    <!-- google fonts  -->  
    <link href="{{ URL::asset('fonts/opensans.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ URL::asset('fonts/raleway.css') }}" rel="stylesheet" type="text/css">  
    <link href="{{ URL::asset('fonts/roboto.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/ladicon-min.png') }}" type="image/x-icon">  
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      var base_url = "{{ URL::to('/') }}";
      var s3_url = "https://lad-dev.s3.amazonaws.com/";
      var session_id = 0;
    </script>
  </head>

  <body>
    
    <!-- start forgot-password modal -->
    <div id="forgot-password-form-modal" class="modal" style="padding-top: 0px;">
      <div class="modal-content" style="display: flex;">
        <div class="modal-content-small forgotpassword" id="modal-content-small" style="margin: auto auto; padding-top: 10px; padding-bottom: 10px;">
          <div class="forgot-password-content" style="width: 80%;">
            <div class="icondiv">
              <img src="{{ URL::to('/') }}/img/ladicon-min.png" style="max-height: 70px;" alt="logo">
            </div>
            <div class="forgotpassword_title" id="forgotpassword_title" style="margin-bottom: 10px; margin-top: 20px;">
              Reset Password
            </div>
            <?php if (isset($validity) && ($validity['info'] == 'success')): ?>
              <input type="hidden" id="forgotpassword_form_id" name="forgotpassword_form_id" value="<?=(isset($validity['data-id']))?$validity['data-id']:''?>">
              <input type="hidden" id="forgotpassword_form_rid" name="forgotpassword_form_rid" value="<?=(isset($validity['data-rid']))?$validity['data-rid']:''?>">
              <input type="hidden" id="forgotpassword_form_time" name="forgotpassword_form_time" value="<?=(isset($validity['data-time']))?$validity['data-time']:''?>">
              <input type="hidden" id="forgotpassword_form_key1" name="forgotpassword_form_key1" value="<?=(isset($validity['data-key1']))?$validity['data-key1']:''?>">
              <input type="password" class="login_email forgotpassword" id="forgotpassword_form_password" placeholder="New Password" required="" style="margin-top: 20px;">
              <input type="password" class="login_email forgotpassword" id="forgotpassword_form_confirm_password" placeholder="Re-enter Password" required="">
              <div class="resetpasswordbuttondiv">
                <div class="resetpasswordbutton">
                  <button type="submit" name="reset_password_form_button" class="signinmodalbutton2" id="reset_password_form_button" style="padding: 0 20px;">
                    Reset My Password
                  </button>
                </div>
              </div>
            <?php else: ?>
              <div class="alert alert-danger fade in">
                <strong>Oops!</strong> <?=(isset($validity['message']))?$validity['message']:'This reset password link is invalid.'?>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End forgot-password modal -->

    <!-- jQuery Library -->
    <script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery-ui.min.js"></script>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('body').css('overflow','hidden');
        document.getElementById('forgot-password-form-modal').style.display = "block";
        
        // RESET PASSWORD ACTION
        $('#reset_password_form_button').click(function(event) {
          // Disable reset button
          $('#reset_password_form_button').prop("disabled",true);

          var _token = $('meta[name="csrf-token"]').attr('content');
          var forgotpassword_form_id = $('#forgotpassword_form_id').val();
          var forgotpassword_form_rid = $('#forgotpassword_form_rid').val();
          var forgotpassword_form_time = $('#forgotpassword_form_time').val();
          var forgotpassword_form_key1 = $('#forgotpassword_form_key1').val();

          var forgotpassword_form_password = $('#forgotpassword_form_password').val();
          var forgotpassword_form_confirm_password = $('#forgotpassword_form_confirm_password').val();

          if (forgotpassword_form_password == forgotpassword_form_confirm_password) 
          { 
            var reset = $.ajax(
                          {
                            url: base_url + '/reset_password_confirm',
                            type:'POST',
                            dataType : "json",
                            data: {forgotpassword_form_id:forgotpassword_form_id, 
                                    forgotpassword_form_rid:forgotpassword_form_rid, 
                                    forgotpassword_form_time:forgotpassword_form_time, 
                                    forgotpassword_form_key1:forgotpassword_form_key1, 
                                    forgotpassword_form_password:forgotpassword_form_password, 
                                    _token:_token},
                            success:function(data)
                            {
                              if (data['info'] == 'success') 
                              {   // Reset password OK
                                  window.location.replace(base_url);
                              }
                              else
                              {   // Reset password not OK
                                  alert(data.message);
                              
                                  // Re-enable reset button
                                  $('#reset_password_form_button').prop("disabled",false);
                              }
                            },
                            error:function(data)
                            {
                              alert("Unable to process your password reset request. Please try again later.");

                              // Re-enable reset button
                              $('#reset_password_form_button').prop("disabled",false);
                            }
                          });
          }
          else
          {
            alert("The password you type in do not match.");
          }
        });
      });
    </script>
  </body>
</html>