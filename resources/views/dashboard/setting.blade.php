
      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Settings
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs" style="width: 35%"> 
            <!-- image width must be 11% -->
              <a data-toggle="tab" href = '#personal-info'>
                <img src="{{ URL::to('/') }}/img/personal-icon-min.png" style="width: 11%">
                Personal Information
              </a>
            </div>
            <div id = "payment-history-tab" class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#link-account">
                <img src="{{ URL::to('/') }}/img/link-icon-min.png" style="width: 11%">
                Link Account
              </a>
            </div>
          </div>

          <!-- <?php
            if (isset ($update)) {
              print_r($update);
            }
          ?> -->

          <!-- <?php echo $users->photo;?> -->

          <div class="tab-content">
            <div id = 'personal-info' class = "tab-pane fade in active">
              @if (session('status'))
                @if (session('status') == '1')
                  <div class="alert alert-success alert-dismissable fade in" style="margin-top: 25px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Your personal info has been successfully changed.
                  </div>
                @else
                  <div class="alert alert-danger alert-dismissable fade in" style="margin-top: 25px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Error changing personal info.
                  </div>
                @endif
              @endif
              <form action="{{ URL::to('dashboard/settings/change')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12 billing-table top bottom left-border right-border">
                  <div class="bottom subtitle">Basic Information</div>
                  <div class="col-md-4">
                    <div style="padding: 18px 0px 18px 0px; margin-top: 15px">
                        <span class="alert alert-info" style="display: block; font-size: 8pt; padding: 5px">Recommended dimension is 400x400 pixels</span>
                      <img id="blah-settings" src="{{ env('S3_URL') }}<?=(Session::get('LAD_user_photo') != null)?Session::get('LAD_user_photo'):'images/default-avatar-min.jpg';?>" alt="your image" />
                    </div>
                    <label class="" style="text-align: center; display: block; color: #008efe">
                      <input type='file' name="profpic" class = "hide" onchange="readURLSetting(this);" />
                      Click to change
                      <br>
                    </label>
                  </div>
                  <div class="col-md-8" style="margin-top: 15px">
                    <fieldset class="settings-fieldset">
                    <?php if($users->type == 1 || $users->type == 3){ ?>
                        <legend class="settings-legend">Admin's Name</legend>
                    <?php }else{ ?>
                        <legend class="settings-legend">Full Name</legend>
                    <?php } ?>
                      <input class = "settings-input" type="text" name="name" id="name" value="<?php echo $users->name;?>" />
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Email</legend>
                      <input class = "settings-input" type="email" name="email" id="email" value="<?php echo $users->email;?>"/>
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Website</legend>
                      <input class = "settings-input" type="text" name="web_url" id="web_url" value="<?php echo $users->web_url;?>" />
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Phone</legend>
                      <input class = "settings-input" type="text" name="phone"  value="<?php echo $users->corporate_phone_number;?>" />
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Address</legend>
                      <input class = "settings-input" type="text" name="mailing_address[address]" value="<?php if (!empty($users->mailing_address)) { echo json_decode($users->mailing_address)->address; }?>" />
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Postal Code</legend>
                      <input class = "settings-input" type="number" name="mailing_address[postal]" value="<?php if (!empty($users->mailing_address)) { echo json_decode($users->mailing_address)->postal; } ?>" />
                    </fieldset>
                    <!-- <fieldset class="settings-fieldset">
                      <legend class="settings-legend">City</legend>
                      <input class = "settings-input" type="text" name="mailing_address[city]" value="<?php //if (!empty($users->mailing_address)) { echo json_decode($users->mailing_address)->city; }?>" />
                    </fieldset> -->
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Country</legend>
                      <!-- <input class = "settings-input" type="text" name="country" id="country" value="<?php echo $users->country;?>"/> -->
                      <select class="settings-input" name="country" id="country" placeholder="Country">
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

                      <script type="text/javascript">
                        var val = "<?php echo $users->country; ?>";
                        $(document).ready(function(){
                          $("select[name='country']").val(val);
                        });
                      </script>

                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Occupation</legend>
                      <select class="settings-input" name="occupation" id="occupation" placeholder="Occupation">
                        <?php if (isset($occupations)) {?>
                            <?php foreach ($occupations as $data) { ?>
                              <option value="<?php echo $data->id ?>" <?php if ($users->type != 1) {if ($users->occupation == $data->id) { echo "selected"; }} else {if ($users->corporate_admin_occupation == $data->id) { echo "selected"; }}?>><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                      </select>
                      <!-- <input class = "settings-input" type="text" name="occupation" id="occupation" value="<?php echo $users->occupation;?>"/> -->
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Organization</legend>
                      <input class = "settings-input" type="text" name="organization" id="organization" value="<?php echo $users->organization;?>"/>
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Industry</legend>
                      <select class="settings-input" name="industry" id="industry" placeholder="Industry">
                        <?php if (isset($industries)) {?>
                            <?php foreach ($industries as $data) { ?>
                              <option value="<?php echo $data->id ?>" <?php if ($users->industry == $data->id) { echo "selected"; }?>><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                      </select>
                    </fieldset>
                    <fieldset class="settings-fieldset">
                    <?php if($users->type == 1 || $users->type == 3){ ?>
                         <legend class="settings-legend">Specialization</legend>
                    <?php }else{ ?>
                        <legend class="settings-legend">Interest</legend>
                    <?php } ?>
                      <select class="settings-input" name="interest" id="interest" placeholder="Interest">
                        <?php if (isset($courses_categories)) {?>
                            <?php foreach ($courses_categories as $data) { ?>
                              <option value="<?php echo $data->id ?>" <?php if ($users->interest == $data->id) { echo "selected"; }?>><?php echo $data->name?></option>
                            <?php } ?>
                        <?php } ?>
                      </select>
                    </fieldset>
                    <fieldset class="settings-fieldset">
                      <legend class="settings-legend">Description</legend>
                      <textarea class = "settings-input" type="text" name="user_desc" id="user_desc"><?php echo $users->user_desc;?></textarea>
                    </fieldset>
                  </div>
                </div>

                <div class="col-md-12 billing-table top bottom left-border right-border">
                  <div class="bottom subtitle">Change Password</div>
                  <div style="margin-top: 15px">
                    <input class = "login_email" type="password" name="currentpassword" id="currentpassword" placeholder="Current Password" />
                    <input class = "login_email" type="password" name="newpassword" id="newpassword" placeholder="New Password" />
                    <input class = "login_email" type="password" name="verifypassword" id="verifypassword" placeholder="Verify Password" />
                  </div>
                </div>
              

                <div class="col-md-12" style="margin-top: 20px; padding-bottom: 20px; text-align: right;">
                  <div class="checkbox" style="display: inline-block; padding-top: 4px">
                    <input type="checkbox" name = 'newsletters' class= "billing-check" id="billing-check-1" <?=($users->newsletters != 0)?'checked':'';?> />
                    <label for="billing-check-1"><span></span></label>
                    <label id = "ladnewsletter" for="billing-check-1"><span>Receive LAD newsletters</span></label>
                  </div>
                  <button type="button" id= "delete-settings" class="btn btn-red btn-submit-settings" style="float: right;">Delete</button>
                  <input type="submit" id= "submit-settings" class="btn btn-blue btn-submit-settings" value="Save"></input>
                  <!-- <input type="button" id= "submit-settings" class="btn btn-blue btn-submit-settings" value="Save"></input> -->
                  <button type="button" id= "cancel-settings" class="btn btn-blue btn-blue-dark btn-submit-settings" disabled="true">Cancel</button>
                </div>
              </form>
            </div>

            <div id = 'link-account' class = "tab-pane fade in" style="padding-top: 15px;">
              <div class="col-md-12 linkaccounttable">
                <div class="col-md-1 no-padding">
                  <img src="{{ URL::to('/')}}/img/contactus/linkedin-min.png" style="max-width: 36px;">
                </div>
                <div class= "col-md-8 no-padding">
                  <div class="boxlabel">LinkedIn</div>
                </div>
                <div class="col-md-2 no-padding">
                  <div class="boxlabel linked" style="text-align: right;">Linked</div>
                </div>
                <div class="col-md-1 no-padding">
                  <div class="checkbox" style="margin-bottom: 0px">
                    <input type="checkbox" name = 'linkedinaccount' class= "billing-check" id="linkedinaccount" checked/>
                    <label for="linkedinaccount"><span></span></label>
                  </div>
                </div>
              </div>

              <div class="col-md-12 linkaccounttable">
                <div class="col-md-1 no-padding">
                  <img src="{{ URL::to('/')}}/img/contactus/googleplus-min.png" style="max-width: 36px;">
                </div>
                <div class= "col-md-8 no-padding">
                  <div class="boxlabel">Google+</div>
                </div>
                <div class="col-md-2 no-padding">
                  <div class="boxlabel" style="text-align: right;">Not Linked</div>
                </div>
                <div class="col-md-1 no-padding">
                  <div class="checkbox" style="margin-bottom: 0px">
                    <input type="checkbox" name = 'googleplusaccount' class= "billing-check" id="googleplusaccount"/>
                    <label for="googleplusaccount"><span></span></label>
                  </div>
                </div>
              </div>

              <div class="col-md-12 linkaccounttable">
                <div class="col-md-1 no-padding">
                  <img src="{{ URL::to('/')}}/img/contactus/fb-min.png" style="max-width: 36px;">
                </div>
                <div class= "col-md-8 no-padding">
                  <div class="boxlabel">Facebook</div>
                </div>
                <div class="col-md-2 no-padding">
                  <div class="boxlabel" style="text-align: right;">Not Linked</div>
                </div>
                <div class="col-md-1 no-padding">
                  <div class="checkbox" style="margin-bottom: 0px">
                    <input type="checkbox" name = 'fbaccount' class= "billing-check" id="fbaccount"/>
                    <label for="fbaccount"><span></span></label>
                  </div>
                </div>
              </div>

              <div class="col-md-12 linkaccounttable">
                <div class="col-md-1 no-padding">
                  <img src="{{ URL::to('/')}}/img/contactus/twitter-min.png" style="max-width: 36px;">
                </div>
                <div class= "col-md-8 no-padding">
                  <div class="boxlabel">Twitter</div>
                </div>
                <div class="col-md-2 no-padding">
                  <div class="boxlabel" style="text-align: right;">Not Linked</div>
                </div>
                <div class="col-md-1 no-padding">
                  <div class="checkbox" style="margin-bottom: 0px">
                    <input type="checkbox" name = 'twitteraccount' class= "billing-check" id="twitteraccount"/>
                    <label for="twitteraccount"><span></span></label>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>