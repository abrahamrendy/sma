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
              Employee Invitation Sign Up
            </div>
            <?php if (isset($emp)): ?>
              <input type="hidden" name="emp" value="<?php echo $emp;?>">
              <input type="text" class="form-control util-margin-top-10" placeholder="Full Name" name="enroll_fullname" required></input>
              <input type="email" class="form-control util-margin-top-10" placeholder="Email" name="enroll_email" required></input>
              <input type="password" class="form-control util-margin-top-10" placeholder="Password" name="enroll_password" required></input>
              <input type="password" class="form-control util-margin-top-10" placeholder="Re-Enter Password" name="enroll_repassword" required></input>
              <select class="form-control enroll-select util-margin-top-10" name="enroll_country" required="" placeholder="Country">
                  <option value="" disabled="" selected="">Country</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia</option>
                  <option value="BA">Bosnia and Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="VG">British Virgin Islands</option>
                  <option value="BN">Brunei</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="CI">Côte d'Ivoire</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CK">Cook Islands</option>
                  <option value="CR">Costa Rica</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="CD">Democratic Republic of the Congo</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="TP">East Timor</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FO">Faeroe Islands</option>
                  <option value="FK">Falkland Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="MK">Former Yugoslav Republic of Macedonia</option>
                  <option value="FR">France</option>
                  <option value="FX">France, Metropolitan</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard and Mc Donald Islands</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Laos</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macau</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia</option>
                  <option value="MD">Moldova</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="ME">Montenegro</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="AN">Netherlands Antilles</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="KP">North Korea</option>
                  <option value="MP">Northern Marianas</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestine</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn Islands</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Reunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russia</option>
                  <option value="RW">Rwanda</option>
                  <option value="ST">São Tomé and Príncipe</option>
                  <option value="SH">Saint Helena</option>
                  <option value="PM">St. Pierre and Miquelon</option>
                  <option value="KN">Saint Kitts and Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="VC">Saint Vincent and the Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="RS">Serbia</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SK">Slovakia</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia and the South Sandwich Islands</option>
                  <option value="KR">South Korea</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard and Jan Mayen Islands</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syria</option>
                  <option value="TW">Taiwan</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania</option>
                  <option value="TH">Thailand</option>
                  <option value="BS">The Bahamas</option>
                  <option value="GM">The Gambia</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="VI">US Virgin Islands</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="GB">United Kingdom</option>
                  <option value="US">United States</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VA">Vatican City</option>
                  <option value="VE">Venezuela</option>
                  <option value="VN">Vietnam</option>
                  <option value="WF">Wallis and Futuna Islands</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
              </select>
              <select class="form-control enroll-select util-margin-top-10" name="enroll_industry" required placeholder="Industry">
                <option value="" disabled="" selected="">Industry</option>
                <?php if (isset($industries)) {?>
                    <?php foreach ($industries as $data) { ?>
                      <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                    <?php } ?>
                <?php } ?>
              </select>
              <select class="form-control enroll-select util-margin-top-10" name="enroll_interest" required placeholder="Interest">
                <option value="" disabled="" selected="">Interest</option>
                <?php if (isset($courses_categories)) {?>
                    <?php foreach ($courses_categories as $data) { ?>
                      <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                    <?php } ?>
                <?php } ?>
              </select>
              <select class="form-control enroll-select util-margin-top-10" name="enroll_occupation" required placeholder="Occupation">
                <option value="" disabled="" selected="">Occupation</option>
                <?php if (isset($occupations)) {?>
                    <?php foreach ($occupations as $data) { ?>
                      <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                    <?php } ?>
                <?php } ?>
              </select>
              <div class="resetpasswordbuttondiv">
                <div class="resetpasswordbutton">
                  <button type="submit" name="reset_password_form_button" class="signinmodalbutton2" id="reset_password_form_button" style="padding: 0 20px; margin: 30px 0px">
                    Sign Up
                  </button>
                </div>
              </div>
            <?php else: ?>
              <div class="alert alert-danger fade in">
                <strong>Oops!</strong> <?=(isset($validity['message']))?$validity['message']:'This invitation link is invalid.'?>
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
    <!-- Google map -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.ui.map.js"></script> -->

    <!-- custom js file include -->
    <script src="{{ URL::to('/') }}/js/custom.js"></script>  
    <script src="{{ URL::to('/') }}/js/modal.js"></script>  
    <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.js"></script> 
    <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.min.js"></script>  
    <script src="{{ URL::to('/') }}/js/bootstrap-datetimepicker.min.js"></script>  

    <!-- DATA TABLES -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

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

          var emp = $('input[name="emp"]').val();
          var fullname = $('input[name="enroll_fullname"]').val();
          var email = $('input[name="enroll_email"]').val();
          var password = $('input[name="enroll_password"]').val();
          var repassword = $('input[name="enroll_repassword"]').val();
          var country = $('select[name="enroll_country"]').val();
          var industry = $('select[name="enroll_industry"]').val();
          var interest = $('select[name="enroll_interest"]').val();
          var occupation = $('select[name="enroll_occupation"]').val();

          if (password == repassword) 
          { 
            var reset = $.ajax(
                          {
                            url: base_url + '/employee_invitation_sign_up',
                            type:'POST',
                            dataType : "json",
                            data: {emp:emp, 
                                    enroll_fullname:fullname, 
                                    enroll_email:email, 
                                    enroll_password:password, 
                                    enroll_country:country,
                                    enroll_industry:industry,
                                    enroll_interest:interest,
                                    enroll_occupation:occupation, 
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
                              alert("Unable to process your request. Please try again later.");

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