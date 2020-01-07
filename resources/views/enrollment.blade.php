  @include('header')

  <!-- start add email modal -->
  <div id="input-email-modal" class="modal" style="padding-top: 0px;">
    <div class="tellus-modal-content" style="display: flex;">      
        <div class="tellus-modal-content-small unauthorized">
          <div class="modal-body" style="height: 100%;">
            <div class="add-online-course-modal-content-title">
              Please Provide Email Address Here
            </div>
            <form id = "input-email-form">
                <span class="getaccessquote">
                  <input type="email" name="addemail" class="subscribe-field" placeholder="Email Address" required>
                </span>
                <div class="col-md-12" style="margin-top: 30px; padding-bottom: 20px">
                    <button type="submit" id = "input-email-submit" class="btn btn-default btn-blue">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End add email modal -->

  <!-- Start Trusted By area -->
  <section id="service" class="homepagequotes" style="margin-top: 80px">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="lad_service_area util-text-align-center enroll_content">
          <div>
            <h1><?php echo $course->title ?></h1>
          </div>
          <?php if (isset($user)) { ?>
                <span id='type' class="hide"><?php echo $user->type?></span>
                <span id='email' class="hide"><?php echo $user->email?></span>
                <span id='enroll-location' class="hide"><?php echo $user->country?></span>
          <?php } ?>
          <span id='enroll-sfc' class="hide"><?php echo $course->sfc?></span>
          <span id='enroll-price' class="hide"><?php echo $course->price?></span>
          <div id = 'sgcorporate_content' data-total_step = '5'>
            <form id = 'corporate_form'>
                <input type="hidden" name = 'code' value="<?php echo $course->coursecode ?>"></input>
                <input type="hidden" name = 'type' value="0"></input>
                <div class = "enroll-form-container" data-step='1'>
                    <h2>Select Which Employee to Enroll for the Program</h2>
                    <select class="form-control enroll-input" required name="enroll_employee">
                        <?php if (isset($corporateuser)) {?>
                            <?php $arrcourseenrolled = explode(',', $corporateuser[0]->courseenrolled);?>
                            <?php if ($corporateuser[0]->courseenrolled == null || !(in_array($course->id, $arrcourseenrolled))) {?>
                                <option value="<?php echo $corporateuser[0]->id ?>"><?php echo $corporateuser[0]->name?></option>
                            <?php } ?>
                        <?php } ?>
                        <?php if (isset($employee_list)) {?>
                            <?php foreach ($employee_list as $data) { ?>
                              <?php $arrcourseenrolled = explode(',', $data->courseenrolled);?>
                              <?php if ($data->courseenrolled == null || !(in_array($course->id, $arrcourseenrolled))) {?>
                                    <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                              <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <option value="other">Other Employee</option>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='2'>
                    <h2>Fill up particulars of the registrant for the course</h2>
                    <input type="text" class="form-control enroll-input" placeholder="Full Name" name="enroll_fullname"></input>
                    <input type="email" class="form-control enroll-input" placeholder="Email" name="enroll_email"></input>
                    <select class="form-control enroll-input enroll-select" name="enroll_country" required placeholder="Country">
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
                    <select class="form-control enroll-input enroll-select" name="enroll_industry" required placeholder="Industry">
                        <option value="" disabled="" selected="">Industry</option>
                        <?php if (isset($industries)) {?>
                            <?php foreach ($industries as $data) { ?>
                              <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <select class="form-control enroll-input enroll-select" name="enroll_interest" required placeholder="Interest">
                        <option value="" disabled="" selected="">Interest</option>
                        <?php if (isset($courses_categories)) {?>
                            <?php foreach ($courses_categories as $data) { ?>
                              <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <select class="form-control enroll-input enroll-select" name="enroll_occupation" required placeholder="Occupation">
                        <option value="" disabled="" selected="">Occupation</option>
                        <?php if (isset($occupations)) {?>
                            <?php foreach ($occupations as $data) { ?>
                              <option value="<?php echo $data->id ?>"><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='3'>
                    <h2>Will you be using SkillsFuture Credit for this course?</h2>
                    <select class="form-control enroll-input" required name="enroll_futurecredit">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='4'>
                    <h2>Select payment method</h2>
                    <select class="form-control enroll-input" required name="enroll_paymentmethod">
                      <option value="credit">Credit Card</option>
                      <option value="wired">Wire Transfer</option>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='5'>
                    <h2>Your Registration is Successful!</h2>
                </div>
            </form>
          </div>

          <div id = 'normalindividual_content' data-total_step = '3'>
            <form id = 'individual_form'>
                <input type="hidden" name = 'code' value="<?php echo $course->coursecode ?>"></input>
                <input type="hidden" name = 'type' value="1"></input>
                <div class = "enroll-form-container" data-step='1'>
                    <h2>Will you be using SkillsFuture Credit for this course?</h2>
                    <select class="form-control enroll-input" required name="enroll_futurecredit">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='2'>
                    <h2>Select payment method</h2>
                    <select class="form-control enroll-input" required name="enroll_paymentmethod">
                      <option value="credit">Credit Card</option>
                      <option value="wired">Wire Transfer</option>
                    </select>
                </div>
                <div class = "enroll-form-container" data-step='3'>
                    <h2>Your Registration is Successful!</h2>
                </div>
            </form>
          </div>


          <div class="enroll-button">
            <button class="btn btn-blue btn-submit-settings next" type="button" id =''>Next</button>
            <br>
            <a href="{{URL::to('/')}}/enroll/<?php echo $course->coursecode?>" class = 'hide' id = 'enroll-again'><button class="btn btn-blue btn-submit-settings" type="button">Enroll Again</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <img style="max-width: 100%; max-height: 100%;" src="{{ URL::to('/') }}/img/separator-min.png" align="left">
      </div>
    </div>
  </section>
  <!-- End Trusted By area -->

  <script type="text/javascript">
      $(document).ready(function(){
        var location = '<?php if (isset($user->country)){echo $user->country;}?>';
        var sfc = '<?php echo $course->sfc?>';
        var price = parseFloat($('#enroll-price').text());
        $('.enroll-form-container').hide();
        if ($('#type').text() == 1) {
            $('#sgcorporate_content').show();
            $('#sgcorporate_content').find('.enroll-form-container[data-step = 1]').show();
            $('#sgcorporate_content').find('.enroll-form-container[data-step = 1]').addClass('current');
            $('#normalindividual_content').hide();
        } else {
            $('#normalindividual_content').show();
            if (price > 0) {
                if (location == 'SG' && sfc == '1') {
                    $('#normalindividual_content').find('.enroll-form-container[data-step = 1]').show();
                    $('#normalindividual_content').find('.enroll-form-container[data-step = 1]').addClass('current');
                } else {
                    $('#normalindividual_content').find('.enroll-form-container[data-step = 2]').show();
                    $('#normalindividual_content').find('.enroll-form-container[data-step = 2]').addClass('current');
                }
            } else {
                $('#normalindividual_content').find('.enroll-form-container[data-step = 3]').show();
                $('#normalindividual_content').find('.enroll-form-container[data-step = 3]').addClass('current');
                $('#normalindividual_content').find('select[name="enroll_paymentmethod"]').val('wired');
                var email = $('#email').text();
                var flagEmail = true;
                if (email == '') {
                    // if email empty
                    flagEmail = false;
                }
                container = $('#normalindividual_content');
                formData = new FormData($('#individual_form')[0]);
                // Append token
                var _token = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', _token);
                if (flagEmail) {
                    var request = $.ajax(
                            {
                                url: base_url + '/submit_enrollment',
                                type:'POST', //data type
                                dataType : "json",
                                headers: {
                                    'X-CSRF-TOKEN': _token
                                },
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function(){
                                },
                                success:function(data)
                                {
                                    if (data.info == "success") 
                                    {   // Request successful 
                                        var totalstep = parseInt(container.attr('data-total_step'));
                                        container.find('.current').hide();
                                        container.find('.current').removeClass('current');
                                        container.find('.enroll-form-container[data-step='+totalstep+']').show();
                                        container.find('.enroll-form-container[data-step='+totalstep+']').addClass('current');
                                        $('.enroll-button .next').text('Okay');
                                        $('.enroll-button .next').attr('id','okay-enroll');
                                        if (type == 1) {
                                          $('#enroll-again').removeClass('hide');
                                        }
                                        $('.enroll-button .next').removeClass('next');
                                    }
                                    else
                                    {   // Request error
                                        alert(data.message);
                                    }
                                },
                                error:function(data)
                                {
                                    alert("Failed to enroll. Please try again later.");
                                }
                            });
                } else {
                  show_inputemail_modal();
                }
            }

            $('#sgcorporate_content').hide();
        }
      });
  </script>

  @include('footer')