// Get the modal
var signinmodal = document.getElementById('login-modal');
var accountmodal = document.getElementById('account-modal');
var tellusmodal = document.getElementById('tellus-modal');
var addonlinecoursemodal = document.getElementById('add-online-course-modal');
var addofflinecoursemodal = document.getElementById('add-offline-course-modal');
var employeeconfirmationmodal = document.getElementById('employeeconfirmation-modal');
var viewproposalmodal = document.getElementById('customized-standard-modal');
var customizedstandardmodal = document.getElementById('customized-standard-modal');
var contactusconfirmationmodal = document.getElementById("contactus-confirmation-modal");
var forgotpasswordmodal = document.getElementById("forgot-password-modal");
var addproposalmodal = document.getElementById('add-proposal-modal');
var networkfriendmodal = document.getElementById('network-friend-modal');
var disclaimermodal = document.getElementById('disclaimer-modal');
var enrolledusersmodal = document.getElementById('enrolled-users-modal');
var inputemailmodal = document.getElementById('input-email-modal');

// Get the buttons that open the sign-in modal
var signinbtn = document.getElementById("signinbutton");
var signinbtnmodal = document.getElementById("signinmodalheader");

// Get the buttons that open the sign-up modal
var signupbtn = document.getElementById("signupbutton");
var signupbtnmodal = document.getElementById("signupmodalheader");
var signuplinkmodal = document.getElementById("signupindividual");
var signupcorporate = document.getElementById("signupcorporate");
var accountinfo_signup_individual = document.getElementById("accountinfo_signup_individual");
var accountinfo_signup_corporate = document.getElementById("accountinfo_signup_corporate");

// Get the buttons that open the tell-us modal
var tellusbutton = document.getElementById("tellusbutton");

// Get the button that open the online add-course modal
var addonlinecoursebtn = document.getElementById("add-course-online");
var addofflinecoursebtn = document.getElementById("add-course-offline");
var disclaimeracceptbtn = document.getElementById("accept-disclaimer");

// Get the button that open the online view proposal modal
var addcustomizedcoursebtn = document.getElementById("add-my-request-btn");
var viewproposalbtn = document.getElementsByClassName("view-proposal");
var viewfeedbackbtn = document.getElementsByClassName("view-feedback");
var editrequestbtn = document.getElementsByClassName("edit-request");
var readmoreproposalbtn = document.getElementsByClassName("read-more-proposal");
var proposalapprovedbtn = document.getElementsByClassName("proposal-approved-btn");
var setappointmentbtn = document.getElementsByClassName("set-appointment");
var readmoreotherbtn = document.getElementsByClassName("read-more-other");
var submitproposalbtn = document.getElementById('submit-proposal');

// Get the button that open the employee confirmation modal
var employeeactionbutton = document.getElementsByClassName("employeeactionbutton");

// Get the buttons that open the networkdetails modal
var network_viewprofile = document.getElementsByClassName("content_viewprofile");

// Get submit button in contact us
var contactusbutton = document.getElementById("contactusbutton");

// Other variables
var previousbuttondiv = document.getElementById("previousbuttondiv");

// Get the element that closes the modal
var closetellus = document.getElementById("closetellus");
// When the user clicks on it, close the modal
if (closetellus != null) {
    closetellus.onclick = function() {
        // tellusmodal.style.display = "none";
        $("#tellus-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300);        
    }
}

// Get the buttons that close the networkdetails modal
var network_close_modal = document.getElementById('network_close_modal');
var closenetworkdetails = document.getElementById("closenetworkdetails");
// When the user clicks on it, close the modal
if (network_close_modal != null) {
    network_close_modal.onclick = function() {
        $("#network-friend-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300);        
    }
}
if (closenetworkdetails != null) {
    closenetworkdetails.onclick = function() {
        $("#network-friend-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300);        
    }
}


// When the user clicks on the sign-in buttons, open the sign-in modal 
if (signinbtn != null) {
    signinbtn.onclick = function() {
        show_signin_modal();
    }
}
if (signinbtnmodal != null) {
    signinbtnmodal.onclick = function() {
        // hide choose account type modal
        document.getElementById("account-modal").style.display = "none";

        show_signin_modal();
    }
}

// When the user clicks on the sign-up buttons, open the sign-up modal 
if (signupbtn != null) {
    signupbtn.onclick = function() {
        // hide choose account type modal
        document.getElementById("login-modal").style.display = "none";

        show_account_modal();
    }
}
if (signupbtnmodal != null) {
    signupbtnmodal.onclick = function() {
        // hide choose account type modal
        document.getElementById("login-modal").style.display = "none";

        show_account_modal();
    }
}
if (signuplinkmodal != null) {
    signuplinkmodal.onclick = function() {
        // hide choose account type modal
        document.getElementById("account-modal").style.display = "none";

        // Reset signup_type
        $("#signup_type").val(0);

        show_signup_modal(false);
        empty_signup_values();
    }
}
if (signupcorporate != null) {
    signupcorporate.onclick = function() {
        // hide choose account type modal
        document.getElementById("account-modal").style.display = "none";

        // Reset signup_type
        $("#signup_type").val(1);

        show_signup_modal(true);
        empty_signup_values();
    }
}
if (accountinfo_signup_individual != null) {
    accountinfo_signup_individual.onclick = function() {
        // hide choose account type modal
        document.getElementById("account-modal").style.display = "none";

        // Reset signup_type
        $("#signup_type").val(0);

        show_signup_modal(false);
        empty_signup_values();
    }
}
if (accountinfo_signup_corporate != null) {
    accountinfo_signup_corporate.onclick = function() {
        // hide choose account type modal
        document.getElementById("account-modal").style.display = "none";

        // Reset signup_type
        $("#signup_type").val(1);

        show_signup_modal(true);
        empty_signup_values();
    }
}

// When the user clicks on the tell-us buttons, open the tell-us modal 
if (tellusbutton != null) {
    tellusbutton.onclick = function() {
        $('#request-course-form input[name="isupdate"]').val('0');
        show_tellus_modal();
    }
}

if (addcustomizedcoursebtn != null) {
    addcustomizedcoursebtn.onclick = function() {
        $('#request-course-form input[name="isupdate"]').val('0');
        show_tellus_modal();
    }
}

// When submit in contact us clicked
// if (contactusbutton != null) {
//     contactusbutton.onclick = function(event) {
//         // event.preventDefault();
//         if ($('#contactusform')[0].checkValidity()) {
//             event.preventDefault();
//             var firstname = $('#contactusform input[name="firstname"]').val();
//             var lastname = $('#contactusform input[name="lastname"]').val();
//             var email = $('#contactusform input[name="email"]').val();
//             var company = $('#contactusform input[name="company"]').val();
//             var country = $('#contactusform select[name="country"]').val();
//             var phone = $('#contactusform input[name="phone"]').val();
//             var interested_in = $('#contactusform input[name="interestedin"]').val();
//             var message = $('#contactusform input[name="message"]').val();

//             var _token = $('meta[name="csrf-token"]').attr('content');

//             if (firstname != '' && lastname != '' && email != '' && message != '') {
//                 // disable button
//                 $("#contactusbutton").prop('disabled', true);

//                 var contact = $.ajax(
//                                 {
//                                     url: base_url + '/contactus_submit',
//                                     type:'POST', //data type
//                                     dataType : "json",
//                                     headers: {
//                                         'X-CSRF-TOKEN': _token
//                                     },
//                                     data: {cu_firstname:firstname, 
//                                             cu_lastname:lastname, 
//                                             cu_email:email, 
//                                             cu_company:company,
//                                             cu_country:country,
//                                             cu_phone:phone,
//                                             cu_interested_in:interested_in,
//                                             cu_message:message,
//                                             _token:_token},
//                                     success:function(data)
//                                     {
//                                         if (data.info == "success") 
//                                         {   // Contact successful 
//                                             show_contactusconfirmation_modal();
//                                             // empty contactus fields after confirmation shows
//                                             setTimeout(
//                                                         function() 
//                                                         {
                                                            
//                                                             $('#contactusform input[name="firstname"]').val('');
//                                                             $('#contactusform input[name="lastname"]').val('');
//                                                             $('#contactusform input[name="email"]').val('');
//                                                             $('#contactusform input[name="company"]').val('');
//                                                             $('#contactusform select[name="country"]').val('');
//                                                             $('#contactusform input[name="phone"]').val('');
//                                                             $('#contactusform input[name="interestedin"]').val('');
//                                                             $('#contactusform input[name="message"]').val('');
//                                                         }, 300);  
//                                         }
//                                         else
//                                         {   // Contact error
//                                             alert(data.message);
//                                         }
//                                         // Re-enable button
//                                         $("#contactusbutton").prop('disabled', false);
//                                     },
//                                     error:function(data)
//                                     {
//                                         alert("Failed to contact us. Please try again later.");

//                                         // Re-enable button
//                                         $("#contactusbutton").prop('disabled', false);
//                                     }
//                                 });
//             } else {
//                 alert("You haven't input all of the required fields.");
//             }
//         }
//     }
// }

// When the user clicks on the add-course-online buttons, open the add-course-online modal 
if (addonlinecoursebtn != null) {
    addonlinecoursebtn.onclick = function() {
        show_addonlinecourse_modal();
    }
}

if (addofflinecoursebtn != null) {
    addofflinecoursebtn.onclick = function() {
        if (session_id == 55 || session_id == 71 || parseInt(count_courses) < parseInt(course_credits)) {
            show_disclaimer_modal();
            // show_addofflinecourse_modal();
        } else {
            alert('You reached your limit of posting '+ course_credits +' courses. Contact us to post more.');
            window.location = base_url + "/contactus#contactusformsection";
        }
    }
}

if (disclaimeracceptbtn != null) {
    disclaimeracceptbtn.onclick = function() {
        if (session_id == 55 || session_id == 71 || parseInt(count_courses) < parseInt(course_credits)) {
            $("#disclaimer-modal").fadeOut(150);
            show_addofflinecourse_modal();
        } else {
            alert('You reached your limit of posting '+ course_credits +' courses. Contact us to post more.');
            window.location = base_url + "/contactus#contactusformsection";
        }
    }
}

// When the user clicks on the view proposal buttons, open the view proposal modal 
if (viewproposalbtn != null) {
    [].forEach.call(viewproposalbtn, function(button) {
      button.onclick = function() {
        // $('.view-proposal-dropdown').fadeIn();
        show_viewproposal_modal(button.innerHTML);
      }
    })
}

// When the user clicks on the view proposal buttons, open the view proposal modal 
if (viewfeedbackbtn != null) {
    [].forEach.call(viewfeedbackbtn, function(button) {
      button.onclick = function() {
        // $('.view-proposal-dropdown').fadeIn();
        var feedback = $(this).attr('data-feedback');
        $('#rejected-feedback').find('.feedback-content').text('');
        if (feedback != '') {
            $('#rejected-feedback').find('.feedback-content').text(feedback);
        }
        show_viewfeedback_modal(button.innerHTML);
      }
    })
}

// READ MORE FROM MY REQUESTS POP UP
if (readmoreproposalbtn != null) {
    [].forEach.call(readmoreproposalbtn, function(button) {
      button.onclick = function() {
        $('.view-proposal-dropdown').parent().removeClass('open');
        // $('.view-proposal-dropdown').fadeOut('slow');
        var title = $(this).attr('data-title');
        var desc = $(this).attr('data-desc');
        var organization = $(this).attr('data-organization');
        var pdf = $(this).attr('data-pdf');
        var pid = $(this).attr('data-pid');
        var country = getCountryName($(this).attr('data-country'));
        var status = $(this).attr('data-status');

        var pdf_div = $('#read-more-proposal').find('.pdfproposal');
        pdf_div.html('');
        if (pdf != '') {
            var splitted_pdf = pdf.split(',');   
            if (splitted_pdf.length > 0) {
                var elem = '';
                for (var i = 0; i < splitted_pdf.length; i++) {
                    elem += '<div class="col-md-3 no-padding pdffiles"><a href = "'+ s3_url + splitted_pdf[i] +'"><img src="'+ base_url +'/img/pdficon-min.png" alt="your image" align="middle" />';
                    var pdf_name = splitted_pdf[i].split('/');
                    elem += '<span class="pdfitemname">'+ pdf_name[3] + '</span></a></div>';
                }
                pdf_div.append(elem);
            }
        }

        $('#read-more-proposal').find('#rmp-title').text(title);
        $('#read-more-proposal').find('#rmp-desc').text(desc);
        $('#read-more-proposal').find('#rmp-organization').text(organization);
        $('#read-more-proposal').find('#rmp-location').text(country);
        $('#read-more-proposal').find('.standard-modal-button').attr('data-pid',pid);
        if (status == 0) {
            // $('#readmore_status').append('<button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" disabled>jhk</button>');
            $('#read-more-proposal').find('#rmp-status').html('').append('<button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" style="width:26% !important" disabled>PENDING REVIEW</button>');
        }
        if (status == 1) {
            $('#read-more-proposal').find('#accept-proposal-my-requests').attr('disabled',true);
            // $('#readmore_status').append('<button type="button" class="btn btn-blue view-proposal-btn btn-blue-dark" disabled>jhk</button>');
            $('#read-more-proposal').find('#rmp-status').html('').append('<button type="button" class="btn btn-blue view-proposal-btn" style="width:26% !important" disabled ><img class="checklist-btn-icon" src="'+base_url+'/img/ceklis-copy-min.png" />ACCEPTED</button>');
        } else {
            $('#read-more-proposal').find('#accept-proposal-my-requests').attr('disabled',false);
        }
        if (status == 2) {
            $('#read-more-proposal').find('#reject-proposal-my-requests').attr('disabled',true);
            $('#read-more-proposal').find('#rmp-status').html('').append('<button type="button" class="btn rejected-btn" style="width:26% !important" disabled><img class="checklist-btn-icon" src="'+base_url+'/img/xicon-min.png" />REJECTED</button>');
        } else {
            $('#read-more-proposal').find('#reject-proposal-my-requests').attr('disabled',false);
        }


        show_readmoreproposal_modal(button.innerHTML);
      }
    })
}

if (network_viewprofile != null) {
    [].forEach.call(network_viewprofile, function(anchor) {
      anchor.onclick = function() {
        // Capture data
        var user_id = anchor.getAttribute('data-id');
        var user_type = anchor.getAttribute('data-type');
        var user_name = anchor.getAttribute('data-name');
        var user_position = anchor.getAttribute('data-position');
        var user_organization = anchor.getAttribute('data-organization');
        var user_interest = anchor.getAttribute('data-interest');
        var user_country = anchor.getAttribute('data-country');
        var user_photo = anchor.getAttribute('data-photo');
        var user_description = anchor.getAttribute('data-description');
        if (user_description == "") {
            user_description = "No description provided yet.";
            document.getElementById("networkdetailsdescription").innerHTML = "\""+user_description+"\"";
        } else {
            document.getElementById("networkdetailsdescription").innerHTML = "\""+user_description+"\"";
        }
        var user_reputation = anchor.getAttribute('data-reputation');
        var url = anchor.getAttribute('data-url');
        var user_url = "<a target='_blank' href = 'http://"+anchor.getAttribute('data-url')+"'>"+anchor.getAttribute('data-url')+"</a>";
        if (url.indexOf('http://') != -1 || url.indexOf('https://') != -1) {
            user_url = "<a target='_blank' href = '"+url+"'>"+url+"</a>";
        } else {
            user_url = "<a target='_blank' href = 'http://"+url+"'>"+url+"</a>";
        }

        checkScrollBars(true);
        $('body').css('overflow','hidden');

        // fill data
        document.getElementById("networkdetailsname").innerHTML = user_name;
        document.getElementById("networkdetailscountry").innerHTML = ": "+user_country;
        document.getElementById("networkdetailsposition").innerHTML = ": "+user_position;
        document.getElementById("networkdetailsorganization").innerHTML = ": "+user_organization;
        document.getElementById("networkdetailsinterest").innerHTML = ": "+user_interest;
        document.getElementById("networkdetailsurl").innerHTML = ": "+user_url;
        
        if (user_photo == '' || user_photo == null) 
        {
            document.getElementById("networkdetailsphoto").src = s3_url+'images/default-avatar-min.jpg';   
        }
        else
        {   
            document.getElementById("networkdetailsphoto").src = s3_url+user_photo;    
        }
        if (user_reputation == 2) 
        {   // Advanced
            document.getElementById("networkdetailsreputationtext").innerHTML = 'Advanced';
        } else if (user_reputation == 3) 
        {   // Expert
            document.getElementById("networkdetailsreputationtext").innerHTML = 'Expert';
        } else 
        {   // Beginner
            document.getElementById("networkdetailsreputationtext").innerHTML = 'Beginner';
        }

        if (user_type == 'request') 
        {   // connections
            document.getElementById("networkdetailsbutton").innerHTML = 'Accept Request';
        } else {
            document.getElementById("networkdetailsbutton").innerHTML = 'Add Friend';
        }

        networkfriendmodal.style.display = "block";
      }
    })
}

if (proposalapprovedbtn != null) {
    [].forEach.call(proposalapprovedbtn, function(button) {
      button.onclick = function() {
        var location = $(this).attr('data-location');
        var time = $(this).attr('data-time');
        var clock = $(this).attr('data-clock');
        var pid = $(this).attr('data-pid');

        $('#mp-time').text(time);
        $('#mp-clock').text(clock);
        $('#mp-location').text(location);
        $('#approved-schedule-reschedule-btn').attr('data-pid',pid);
        
        show_proposalapproved_modal(button.innerHTML);
      }
    })
}

if (editrequestbtn != null) {
    [].forEach.call(editrequestbtn, function(button) {
      button.onclick = function() {
        $('.deletecustomized').removeClass('hide');
        $('#request-course-form input[name="isupdate"]').val('1');
        var desc = $(this).attr('data-desc');
        var budget = $(this).attr('data-budget');
        var participants = $(this).attr('data-participant');
        var confidentiality = $(this).attr('data-confidentiality');
        var area = $(this).attr('data-area');
        var startdate = $(this).attr('data-start_date');
        var enddate = $(this).attr('data-end_date');
        var add_info = $(this).attr('data-addinfo');
        var pdf = $(this).attr('data-pdf');
        var crid = $(this).attr('data-id');
        var currency = $(this).attr('data-currency');

        $('#tellus-modal').find('#requestcustomized_description').val(desc);
        $('#tellus-modal').find('#requestcustomized_budget').val(budget);
        $('#tellus-modal').find('#requestcustomized_participants').val(participants);
        if (confidentiality == 1) {
            $('#tellus-modal').find('#checkboxconfidential').prop("checked",true);
        } else {
            $('#tellus-modal').find('#checkboxconfidential').prop("checked",false);
        }

        var split_area = area.split(',');
        for (var i = 0; i < split_area.length; i++) {
            $('#tellus-modal').find('input[name=requestcustomized_areaoftraining_radio][value='+split_area[i]+']').prop("checked",true);
        }
        $('#tellus-modal').find('#requestcustomized_startdate').val(startdate);
        $('#tellus-modal').find('#requestcustomized_enddate').val(enddate);

        $('#tellus-modal').find('#requestcustomized_additional').val(add_info);
        if (currency != '') {
            $('#tellus-modal').find('#requestcustomized_currency').val(currency);
        } else {
            $('#tellus-modal').find('#requestcustomized_currency').val("1");
        }
        // $('#tellus-modal').find('#requestcustomized_pdf').val(pdf);
        $('#tellus-modal').find('#nextbutton').prop("disabled",false);
        $('#tellus-modal').find('.deletecustomized').attr("data-id",crid);
        // $('#tellus-modal').find('#requestcustomizedcoursespdf').attr('src',base_url + '/img/pdficon-min.png');
        show_tellus_modal();
      }
    })
}

if (setappointmentbtn != null) {
    [].forEach.call(setappointmentbtn, function(button) {
      button.onclick = function() {
        var pid = $(this).attr('data-pid');

        $('#schedule-appointment-form input[name="pid"]').val(pid);
        show_setappointment_modal(button.innerHTML);
      }
    })
}

if (submitproposalbtn != null) {
    submitproposalbtn.onclick = function() {
        var ccid = $('#submit-proposal').attr('data-cc');
        show_addproposal_modal(ccid);
    }
}

// When the user clicks on the employeeactionbutton buttons, open the employee confirmation modal 
if (employeeactionbutton != null) {
    [].forEach.call(employeeactionbutton, function(button) {
      button.onclick = function() {
        var user_id = button.getAttribute('data-user-id');
        show_employeeconfirmationmodal_modal(button.innerHTML, user_id);
      }
    })
}

// When the user clicks on the password field, display all contents
var signup_password = document.getElementById("signup_password");
if (signup_password != null) {
    signup_password.onkeyup = function() {
        // document.getElementById("signin_hidden").style.display = "block";
        $("#signin_hidden").fadeIn("slow");
    }
}

// When the user clicks on the google sign-in buttons, up the flag
var customgooglesigninbutton = document.getElementById("customgooglesigninbutton");
if (customgooglesigninbutton != null) {
    customgooglesigninbutton.onclick = function() {
        // Reset flag to 1
        $("#googleflag").val('1');
    }
}

// When the user clicks on the forgotpasswordbutton button, show forgot-password modal
var forgotpasswordbutton = document.getElementById("forgotpasswordbutton");
if (forgotpasswordbutton != null) {
    forgotpasswordbutton.onclick = function() {
        // hide login modal
        document.getElementById("login-modal").style.display = "none";
        
        // show forgot-password-modal
        checkScrollBars(true);
        $('body').css('overflow','hidden');
        forgotpasswordmodal.style.display = "block";
    }
}

// When the user clicks on the requestcustomized_startbutton button, show corporate signup modal and hide requestmodal
var requestcustomized_startbutton = document.getElementById("requestcustomized_startbutton");
if (requestcustomized_startbutton != null) {
    requestcustomized_startbutton.onclick = function() {
        // hide tellus modal
        document.getElementById("tellus-modal").style.display = "none";
        
        // show corporate signup modal
        show_signup_modal(true);
    }
}

var enrollsignup = document.getElementById("enrollsignup");
if (enrollsignup != null) {
    enrollsignup.onclick = function() {
        // show corporate signup modal
        show_signin_modal(true);
    }
}

// When the user clicks on the requestcustomized_closebutton button, show login modal and hide requestmodal
var requestcustomized_closebutton = document.getElementById("requestcustomized_closebutton");
if (requestcustomized_closebutton != null) {
    requestcustomized_closebutton.onclick = function() {
        // hide tellus modal
        // document.getElementById("tellus-modal").style.display = "none";
        $("#tellus-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300);  
    }
}

// When the user clicks on OK button, close forgotpassword modal
var reset_password_ok = document.getElementById("reset_password_ok");
if (reset_password_ok != null) {
    reset_password_ok.onclick = function() {
        // hide forgotpassword modal
        $("#forgot-password-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        clear_reset_password();
                        $('body').css('overflow','auto');
                    }, 300);  
    }
}

// Request customized popup: when required fields are not filled, disable next button
$('#requestcustomized_description, #requestcustomized_participants').bind('keyup', function() {
    if(allFilled()) {
        $('#nextbutton').removeAttr('disabled');
    } else {
        $('#nextbutton').prop('disabled', true);
    }
});
$('#request-course-form input:radio[name=requestcustomized_areaoftraining_radio]').change(function() {
    if(allFilled()) {
        $('#nextbutton').removeAttr('disabled');
    } else {
        $('#nextbutton').prop('disabled', true);
    }
});
var datect = 0;
$('#requestcustomized_enddate').change(function(){
    $('#nextbutton').prop('disabled', true);
    var enddate = $('#requestcustomized_enddate').val();
    var startdate = $('#requestcustomized_startdate').val();

    var d1 = new Date(startdate);
    var d2 = new Date(enddate);

    if (d2 >= d1) {
        $('#nextbutton').prop('disabled', false);
        datect = 0;
    } else {
        datect++;
        if (datect == 3) {
            datect = 0;
            alert('Your end date precede start date. Please input different end date.');
        }
    }
});
function allFilled() {
    var filled = true;
    // check input text
    $('#requestcustomized_description, #requestcustomized_participants').each(function() {
        if($(this).val() == '') filled = false;
    });
    // check radio button
    if (!$("#request-course-form input:radio[name=requestcustomized_areaoftraining_radio]").is(":checked")) {
        filled = false;
    }
    return filled;
}

function checkScrollBars (flag) {
    if (flag) {
        // modal is visible
        $('body').addClass('modal-open');

        var b = $('body');
        var normalw = 0;
        var scrollw = 0;
        if(b.prop('scrollHeight')>b.height()){
            normalw = window.innerWidth;
            scrollw = normalw - b.width();
            $('body').css('padding-right',scrollw+'px');
            $('body').css('background-color', 'transparent');
            $('.navbar').css('padding-right',scrollw+'px');
            $('body').css('position', 'absolute');
        }
    } else {
        $('body').removeClass('modal-open');
        $('body').css('padding-right',0+'px');
        $('.navbar').css('padding-right',0+'px');
        $('body').css('position', 'relative');
    }
}

function show_signin_modal() 
{   // Show Sign-in form 
    checkScrollBars(true);
    $('body').css('overflow','hidden');
    signinmodal.style.display = "block";


    // Show Google and Facebook Sign-in, and 'or'
    document.getElementById("googlefbdiv").style.display = "table"; // googlefbdiv
    document.getElementById("ordiv").style.display = "block"; // ordiv
    // Remove spacing above signup_fullname
    $('#signup_fullname').css('margin-top',0);

    // Hide sign-up fields
    document.getElementById("signup_fullname").style.display = "none";
    document.getElementById("signup_email").style.display = "none";
    document.getElementById("signup_password").style.display = "none";
    document.getElementById("signup_address").style.display = "none";
    document.getElementById("signup_postal").style.display = "none";
    // document.getElementById("signup_city").style.display = "none";
    document.getElementById("signup_country").style.display = "none";
    document.getElementById("signup_industry").style.display = "none";
    document.getElementById("signup_interest").style.display = "none";
    document.getElementById("signup_occupation").style.display = "none";
    document.getElementById("signup_organization").style.display = "none";

    document.getElementById("signup_corporate_company_name").style.display = "none";
    document.getElementById("signup_corporate_company_email").style.display = "none";
    document.getElementById("signup_corporate_company_phone_number").style.display = "none";
    document.getElementById("signup_corporate_admin_occupation").style.display = "none";


    // Show Login fields
    document.getElementById("login_email").style.display = "inline";
    document.getElementById("login_password").style.display = "inline";

    // Show remember-me field
    document.getElementById("remembermediv").style.display = "block";
    // Show forgot-password field
    document.getElementById("forgotpassworddiv").style.display = "block";

    // Rename button field
    document.getElementById("sign_button").innerHTML = "Sign In";

    // Focus to email
    document.getElementById("login_email").focus();

    // Sign In with Google account
    $("#googletype").val("in");
}
function show_signup_modal(type) 
{   // Show Sign-up form 
    checkScrollBars(true);
    $('body').css('overflow','hidden');
    signinmodal.style.display = "block";

    if (type) 
    {   // Corporate
        // Hide Google and Facebook Sign-in, and 'or'
        document.getElementById("googlefbdiv").style.display = "none"; // googlefbdiv
        document.getElementById("ordiv").style.display = "none"; // ordiv

        // Give spacing above signup_fullname
        $('#signup_fullname').css('margin-top','20px');
    }
    else
    {   // Individual
        // Show Google and Facebook Sign-in, and 'or'
        document.getElementById("googlefbdiv").style.display = "table"; // googlefbdiv
        document.getElementById("ordiv").style.display = "block"; // ordiv

        // Remove spacing above signup_fullname
        $('#signup_fullname').css('margin-top',0);
    }
    

    // Switch caret display
    var signincaret = document.getElementById("signincaret");
    signincaret.style.display = "none";
    var signupcaret = document.getElementById("signupcaret");
    signupcaret.style.display = "block";

    // Show sign-up fields
    document.getElementById("signup_fullname").style.display = "inline";
    document.getElementById("signup_email").style.display = "inline";
    document.getElementById("signup_password").style.display = "inline";
    document.getElementById("signup_address").style.display = "inline";
    document.getElementById("signup_postal").style.display = "inline";
    // document.getElementById("signup_city").style.display = "inline";
    document.getElementById("signup_country").style.display = "inline";
    document.getElementById("signup_industry").style.display = "inline";
    document.getElementById("signup_interest").style.display = "inline";
    document.getElementById("signup_corporate_company_phone_number").style.display = "inline";
    if (type) 
    {   // Corporate
        document.getElementById("signup_corporate_company_name").style.display = "inline";
        document.getElementById("signup_corporate_company_email").style.display = "inline";
        document.getElementById("signup_occupation").style.display = "none";
        document.getElementById("signup_organization").style.display = "none";
        document.getElementById("signup_corporate_admin_occupation").style.display = "inline";
        $("#signup_opt_interest").text("Specialization");
        $("#signup_fullname").attr('placeholder', "Admin's Name");
    }
    else
    {   // Individual
        document.getElementById("signup_corporate_company_name").style.display = "none";
        document.getElementById("signup_corporate_company_email").style.display = "none";
        document.getElementById("signup_occupation").style.display = "inline";
        document.getElementById("signup_organization").style.display = "inline";
        document.getElementById("signup_corporate_admin_occupation").style.display = "none";
        $("#signup_opt_interest").text("Interest");
        $("#signup_fullname").attr('placeholder', "Full Name");
    }
    

    // Hide Login fields
    document.getElementById("login_email").style.display = "none";
    document.getElementById("login_password").style.display = "none";

    // Hide remember-me field
    document.getElementById("remembermediv").style.display = "none";
    // Hide forgot-password field
    document.getElementById("forgotpassworddiv").style.display = "none";

    // Rename button field
    document.getElementById("sign_button").innerHTML = "Sign Up";

    // Sign Up with Google account
    $("#googletype").val("up");
}
function show_account_modal() 
{   // Show account-options modal 
    accountmodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}
function empty_signup_values() 
{   // Empty sign up values when close the modal 
    document.getElementById("signup_fullname").value = "";
    document.getElementById("signup_email").value = "";
    document.getElementById("signup_password").value = "";
    document.getElementById("signup_country").value = "";
    document.getElementById("signup_interest").value = "";
    document.getElementById("signup_industry").value = "";
    document.getElementById("signup_occupation").value = "";
    document.getElementById("signup_organization").value = "";

    document.getElementById("signup_corporate_company_name").value = "";
    document.getElementById("signup_corporate_company_email").value = "";
    document.getElementById("signup_corporate_company_phone_number").value = "";
    document.getElementById("signup_corporate_admin_occupation").value = "";
}
function show_tellus_modal() 
{  // Show tell-us form 
    tellusmodal.style.display = "flex";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
    clean_modal(false);
}

function show_contactusconfirmation_modal() 
{   // Show contact-us-confirmation-modal 
    // contactusconfirmationmodal.style.display = "block";
    $("#contactus-confirmation-modal").fadeIn(300);

    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_addonlinecourse_modal() 
{   // Show add online course modal 
    addonlinecoursemodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_addofflinecourse_modal() 
{   // Show add online course modal 
    addofflinecoursemodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_disclaimer_modal()
{   // Show disclaimer before post course modal show up
    disclaimermodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_viewproposal_modal() 
{   // Show add online course modal 
    viewproposalmodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_addproposal_modal(ccid) 
{   // Show submit proposal modal 
    customizedstandardmodal.style.display = "none";
    checkScrollBars(false);
    $('body').css('overflow','auto');
    if (!(customizedstandardmodal > $("#read-more-other-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#read-more-other-proposal").addClass("hide");
    }
    $('#add-proposal-modal').find('input[name="ccid"]').val(ccid);
    addproposalmodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_viewfeedback_modal(){
    // Show feedback modal 
    customizedstandardmodal.style.display = "block";
    checkScrollBars(false);
    $('body').css('overflow','auto');
    customizedstandardmodal > $("#rejected-feedback").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_readmoreproposal_modal() 
{   // Show read more proposal modal 
    customizedstandardmodal.style.display = "block";
    customizedstandardmodal > $("#read-more-proposal").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_readmoreother_modal() 
{   // Show read more other requests proposal modal 
    customizedstandardmodal.style.display = "block";
    customizedstandardmodal > $("#read-more-other-proposal").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_proposalapproved_modal() 
{   // Show approved reschedule proposal modal 
    customizedstandardmodal.style.display = "block";
    customizedstandardmodal > $("#approved-reschedule-proposal").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_setappointment_modal() 
{   // Show set appointment proposal modal 
    customizedstandardmodal.style.display = "block";
    customizedstandardmodal > $("#accepted-request").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_submitfeedback_modal() 
{   // Show submit feedback proposal modal 
    customizedstandardmodal.style.display = "block";
    customizedstandardmodal > $("#rejected-request").removeClass("hide");
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

function show_employeeconfirmationmodal_modal(command,user_id) 
{   // Show employeeconfirmationmodal modal 
    employeeconfirmationmodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');

    // Refill popup contents
    if (command.toLowerCase() == "make admin") {   // Make admin
        document.getElementById("popuptitle").innerHTML = "Are you sure you want to make this employee as admin?";
        $('.buttonyes').attr('data-user-id',user_id);
        $('.buttonyes').attr('data-functionality','promote');
    } else if(command.toLowerCase() == "remove") {  // remove user
        document.getElementById("popuptitle").innerHTML = "Are you sure you want to remove this user from the employee list?";
        $('.buttonyes').attr('data-user-id',user_id);
        $('.buttonyes').attr('data-functionality','remove');
    } else if(command.toLowerCase() == "not admin") {   // not admin
        document.getElementById("popuptitle").innerHTML = "Are you sure you want to remove this employee as admin?";
        $('.buttonyes').attr('data-user-id',user_id);
        $('.buttonyes').attr('data-functionality','demote');
    }
}

function show_enrolledusers_modal(uids, cid,ids,users,emails,organizations, countries,phones,occupations, force='false') 
{   // Show enrolled users modal 
    $('#enrolled-users-modal').css ('display',"block");
    checkScrollBars(true);
    $('body').css('overflow','hidden');

    arrUsers = users.split(';');
    arrUsersId = uids.split(';');
    arrEmails = emails.split(';');
    arrPhones = phones.split(';');
    arrOrganizations = organizations.split(';');
    arrOccupations = occupations.split(';');
    arrCountries = countries.split(';');
    arrIds = ids.split(';');


    var table = $('#enrolled-users-table').DataTable();
    table.clear().draw();
    var counter = 1;
    for (var i = 0; i < arrIds.length; i++) {
        var added = $.ajax(
                    {
                        url: base_url + '/dashboard/gettransactionstatus/' + arrUsersId[i] + '/' + cid,
                        type:'GET',
                        dataType : "json",
                        async: false,
                        data: {},
                        success:function(data)
                        {
                            status = '-';
                            if (data) {
                                if (data.status != null) {
                                    if (data.status == 0) {
                                        status = "Awaiting Payment";
                                    } else if (data.status == 1) {
                                        status = "Paid";
                                    } else if (data.status == 2) {
                                        status = "Cancelled";
                                    }
                                }
                            }
                        },
                        error:function(data)
                        {
                            alert("Error. Please try again later.");
                        }
                    });
        if (user_type == 3 || force) {
            elem = '<i class="fa fa-times remove-enrollment" aria-hidden="true" data-cid = "'+cid+'"data-id = "'+ arrIds[i] +'"></i> ';
        } else {
            elem = '-';
        }
        table.row.add( [
            (i+1),
            arrUsers[i],
            arrEmails[i],
            arrPhones[i],
            arrOrganizations[i],
            arrOccupations[i],
            arrCountries[i],
            status,
            elem
        ] ).draw();
    }

    return false;
}
function show_inputemail_modal() 
{   // Show account-options modal 
    inputemailmodal.style.display = "block";
    checkScrollBars(true);
    $('body').css('overflow','hidden');
}

// REMOVE ENROLLMENT FROM ENROLLED USERS MODAL CLICKED
$(document).on('click','.remove-enrollment', function(event){
    event.stopPropagation();
    event.preventDefault();
    
    var conf = window.confirm("Are you really sure want to remove this user from enrollment?");
    if (conf) {
        id = $(this).attr('data-id');
        cid = $(this).attr('data-cid');
        var added = $.ajax(
                    {
                        url: base_url + '/dashboard/removeuserenrollment/' + id +'/' + cid,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          location.reload();
                        },
                        error:function(data)
                        {
                            alert("Error removing user. Please try again later.");
                        }
                    });
    }
});
// END

// When the user clicks anywhere outside of the modal, close it
document.onclick = function(event) 
{
    if (event.target.parentElement == signinmodal) {
        // signinmodal.style.display = "none";
        $("#login-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
        
        // User cancel login via google. Reset flag to 0
        $("#googleflag").val('0');
    } else if (event.target.parentElement == accountmodal) {
        // accountmodal.style.display = "none";
        $("#account-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
        
        // User cancel login via google. Reset flag to 0
        $("#googleflag").val('0');
    } else if ((event.target.parentElement == tellusmodal) || (event.target.parentElement == document.getElementsByTagName("BODY")[0])) {
        // tellusmodal.style.display = "none";
        if (! $('.deletecustomized').hasClass('hide')) {
            $('.deletecustomized').addClass('hide');
        }
        $(tellusmodal).find('form').trigger('reset');
        $('#requestcustomized_pdf_names').css('display','none');
        $('#requestcustomized_pdf_names').html('');
        $('#tellus-modal').find('#nextbutton').prop("disabled",true);
        
        $("#tellus-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == forgotpasswordmodal) {
        // forgotpasswordmodal.style.display = "none";
        $("#forgot-password-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        clear_reset_password();
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == addonlinecoursemodal) {
        // addonlinecoursemodal.style.display = "none";
        $(addonlinecoursemodal).find('form').trigger('reset');
        $("#add-online-course-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == addofflinecoursemodal) {
        // addofflinecoursemodal.style.display = "none";
        $(addofflinecoursemodal).find('form').trigger('reset');

        $("#add-offline-course-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == disclaimermodal) {
        // addofflinecoursemodal.style.display = "none";
        $("#disclaimer-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == employeeconfirmationmodal) {
        // employeeconfirmationmodal.style.display = "none";
        $("#employeeconfirmation-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == contactusconfirmationmodal) {
        // contactusconfirmationmodal.style.display = "none";
        $("#contactus-confirmation-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == enrolledusersmodal) {
        // contactusconfirmationmodal.style.display = "none";
        $("#enrolled-users-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        $('#enrolled-users .rounded-list').html('');
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == addproposalmodal) {
        // addproposalmodal.style.display = "none";
        $("#add-proposal-modal").fadeOut(300);
        $('#add-proposal-form').trigger('reset');
        $('#submitproposal_pdf_names').css('display','none');
        $('#submitproposal_pdf_names').html('');
        $('.delete-proposal-pdf').css('display','none');
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300);
    } else if (event.target.parentElement == customizedstandardmodal) {
        // customizedstandardmodal.style.display = "none";
        $("#customized-standard-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 

        if (!(customizedstandardmodal > $("#read-more-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#read-more-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#approved-reschedule-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#approved-reschedule-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#accepted-request").hasClass("hide"))) {
            customizedstandardmodal > $("#accepted-request").addClass("hide");
            $('#schedule-appointment-form').trigger('reset');
        }
        if (!(customizedstandardmodal > $("#rejected-request").hasClass("hide"))) {
            customizedstandardmodal > $("#rejected-request").addClass("hide");
            $('#rejected-request-form').trigger('reset');
        }
        if (!(customizedstandardmodal > $("#read-more-other-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#read-more-other-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#rejected-feedback").hasClass("hide"))) {
            customizedstandardmodal > $("#rejected-feedback").addClass("hide");
        }
    } else if (event.target.parentElement == networkfriendmodal) {
        // networkfriendmodal.style.display = "none";
        $("#network-friend-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    } else if (event.target.parentElement == inputemailmodal) {
        // networkfriendmodal.style.display = "none";
        $("#input-email-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
    }
}

$('#employeeconfirmation-modal .buttonno').click(function() {
    // employeeconfirmationmodal.style.display = "none";
    $("#employeeconfirmation-modal").fadeOut(300);
        setTimeout(
                    function() 
                    {
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                    }, 300); 
});

$('#contactusconfirmationclose').click(function() {
    $("#contactus-confirmation-modal").fadeOut(300);
    setTimeout(
                function() 
                {
                    checkScrollBars(false);
                    $('body').css('overflow','auto');
                }, 300);    
});

//ACCEPT BUTTON ON APPROVED SCHEDULE POP-UP
$(document).on('click', '#approved-schedule-accept-btn', function(){
    $("#customized-standard-modal").fadeOut(300);
    setTimeout(
                function() 
                {
                    checkScrollBars(false);
                    $('body').css('overflow','auto');
                }, 300);
    customizedstandardmodal > $("#approved-reschedule-proposal").addClass("hide");
});

//CLOSE BUTTON ON FEEDBACK POP-UP
$(document).on('click', '#rejected-feedback-close-btn', function(){
    $("#customized-standard-modal").fadeOut(300);
    setTimeout(
                function() 
                {
                    checkScrollBars(false);
                    $('body').css('overflow','auto');
                }, 300);
    customizedstandardmodal > $("#rejected-feedback").addClass("hide");
});

//RESCHEDULE BUTTON ON APPROVED SCHEDULE POP-UP
$('#approved-schedule-reschedule-btn').click(function(){
    customizedstandardmodal.style.display = "none";
    checkScrollBars(false);
    $('body').css('overflow','auto');
    if (!(customizedstandardmodal > $("#approved-reschedule-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#approved-reschedule-proposal").addClass("hide");
    }
    var pid = $(this).attr('data-pid');
    $('#schedule-appointment-form input[name="pid"]').val(pid);
    show_setappointment_modal();
});

//READ MORE IN BROWSE OTHER REQUESTS CLICKED
$(document).on('click', '.read-more-other', function(){
    var desc = $(this).attr('data-title');
    var cc = $(this).attr('data-cc');
    var budget = $(this).attr('data-budget');
    var currency = $(this).attr('data-currency');
    if (currency == '') {
        currency = 'US$';
    }
    var participants = $(this).attr('data-participants');
    var confidentiality = $(this).attr('data-confidentiality');
    var organization = $(this).attr('data-organization');
    var location = $(this).attr('data-location');
    var startdate = $(this).attr('data-start_date');
    if (startdate != '') {
        startdate = startdate.split('-');
    }
    var enddate = $(this).attr('data-end_date');
    if (enddate != '') {
        enddate = enddate.split('-');
    }
    var add_info = $(this).attr('data-add_info');
    var pdf = $(this).attr('data-pdf');
    var pdf_div = $('#read-more-other-proposal').find('.pdfproposal');
    pdf_div.html('');
    if (pdf != '') {
        var splitted_pdf = pdf.split(',');   
        if (splitted_pdf.length > 0) {
            var elem = '';
            for (var i = 0; i < splitted_pdf.length; i++) {
                elem += '<div class="col-md-3 no-padding pdffiles"><a href = "'+ s3_url + splitted_pdf[i] +'"><img src="'+ base_url +'/img/pdficon-min.png" alt="your image" align="middle" />';
                var pdf_name = splitted_pdf[i].split('/');
                elem += '<span class="pdfitemname">'+ pdf_name[4] + '</span></a></div>';
            }
            pdf_div.append(elem);
        }
    }

    $('#read-more-other-proposal').find('#bor_title').text(desc);
    $('#read-more-other-proposal').find('#bor_organization').text(organization);
    $('#read-more-other-proposal').find('#bor_location span').text(location);
    $('#read-more-other-proposal').find('#bor_desc').text(add_info);
    if (startdate != '' && enddate != '') {
        if (startdate[1] == enddate[1]) {
            if (startdate[0] == enddate[0]) {
                $('#read-more-other-proposal').find('#bor_date span').text(startdate[0] + " " + startdate[1] + ", " + startdate[2]);
            } else {
                $('#read-more-other-proposal').find('#bor_date span').text(startdate[0] + '-' + enddate[0] + " " + enddate[1] + ", " + enddate[2]);
            }
        } else {
            $('#read-more-other-proposal').find('#bor_date span').text(startdate[0] + ' ' + startdate[1] + '-' + enddate[0] + " " + enddate[1] + ", " + enddate[2]);
        }
    } else {
        if (startdate != '') {
            $('#read-more-other-proposal').find('#bor_date span').text(startdate[0] + ' ' + startdate[1] + ' ' + startdate[2]);
        } else {
            if (enddate != '') {
                $('#read-more-other-proposal').find('#bor_date span').text(enddate[0] + ' ' + enddate[1] + ' ' + enddate[2]);
            } else {
                $('#read-more-other-proposal').find('#bor_date span').text('-');
            }
        }
    }
    $('#read-more-other-proposal').find('#bor_participants span').text(participants + ' persons');
    $('#read-more-other-proposal').find('#bor_budget span').text(currency + budget);
    $('#read-more-other-proposal').find('#submit-proposal').attr('data-cc', cc);

    show_readmoreother_modal();
});
//END

//TRASH CLICKED
$('.deletecustomized').click(function(){
    var val = confirm('Are you sure want to delete this course?');
    var crid = $(this).attr('data-id');
    if (val == 1) {
        var request = $.ajax(
                    {
                        url: base_url + '/dashboard/deletecustomizedcourse/' + crid,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          if (data.info == 'success') {
                            location.reload();
                          } else {
                            alert(data.message);
                          }
                        },
                        error:function(data)
                        {
                            alert("Error removing proposal. Please try again later.");
                        }
                    });   
    }
});
//END

// DELETE PDF CLICKED
$('.delete-pdf').click(function(e){
    e.preventDefault();
    var val = confirm('Are you sure want to delete the attachment(s)?');
    if (val) {
        $('#requestcustomized_pdf').val('');
        $('#requestcustomized_pdf_names').css('display','none');
        $("#requestcustomized_pdf_names").html('');
        $(this).css('display','none');
    }
});
$('.delete-proposal-pdf').click(function(e){
    e.preventDefault();
    var val = confirm('Are you sure want to delete the attachment(s)?');
    if (val) {
        $('#submitproposal_pdf').val('');
        $('#submitproposal_pdf_names').css('display','none');
        $("#submitproposal_pdf_names").html('');
        $(this).css('display','none');
    }
});

/**/

jQuery( document ).ready(function() 
{   // jquery for tell us div 
    var back =jQuery("#request-course-form .prev");
    var next = jQuery("#request-course-form .next");
    var steps = jQuery("#request-course-form .step");
    var telluspage = document.getElementsByClassName("step current");
        
    next.bind("click", function() { 
        var submit_flag = 0;
        jQuery.each( steps, function( i ) {
            if (!jQuery(steps[i]).hasClass('current') && !jQuery(steps[i]).hasClass('done')) {
                jQuery(steps[i]).addClass('current');
                jQuery(steps[i - 1]).removeClass('current').addClass('done');
                refresh_custom_course_page($('.step.current').data('value'));
                return false;
            }
            else if ($('.step.current').data('value') == "third")
            {   // Finish, redirect to fourth page.
                var isupdate = $('#request-course-form input[name="isupdate"]').val();
                if (isupdate == 0) {
                    // Check flag first
                    if (submit_flag == 0 && session_id != '') 
                    {   // Submit request
                        // Disable button
                        $("#nextbutton").prop('disabled', true);

                        var formData = new FormData($('#request-course-form')[0]);

                        // Append token
                        var _token = $('meta[name="csrf-token"]').attr('content');
                        formData.append('_token', _token);

                        var request = $.ajax(
                                    {
                                        url: base_url + '/requestcustomizedcourse',
                                        type:'POST', //data type
                                        dataType : "json",
                                        headers: {
                                            'X-CSRF-TOKEN': _token
                                        },
                                        data: formData,
                                        // cache: false,
                                        processData: false,
                                        contentType: false,
                                        success:function(data)
                                        {
                                            if (data.info == "success") 
                                            {   // Request successful 
                                                var url = window.location.href;
                                                var postcourseflag = 0;
                                                var temp = url.search("/customizedcourse");
                                                if (temp != -1) {
                                                  postcourseflag = 1;
                                                }
                                                if (postcourseflag == 1) {
                                                    $('#page-loading-ajax').removeClass('hide');
                                                    location.reload();
                                                } else {
                                                    refresh_custom_course_page("finish");
                                                    // Reset form
                                                    $('#request-course-form').trigger('reset');
                                                    $('#requestcustomized_pdf_names').css('display','none');
                                                    $("#requestcustomized_pdf_names").html('');
                                                    $('.delete-pdf').css('display','none');
                                                }
                                            }
                                            else
                                            {   // Request error
                                                alert(data.message);
                                            }
                                            // Re-enable button
                                            $("#nextbutton").prop('disabled', false);
                                        },
                                        error:function(data)
                                        {
                                            alert("Failed to request customized course. Please try again later.");

                                            // Re-enable button
                                            $("#nextbutton").prop('disabled', false);
                                        }
                                    });
                    } else {
                        // $(tellusmodal).find('form').trigger('reset');
                        // $('#requestcustomized_pdf_names').css('display','none');
                        // $('#requestcustomized_pdf_names').html('');
                        // $('#tellus-modal').find('#nextbutton').prop("disabled",true);
                        
                        $("#tellus-modal").css('display','none');
                        $('#fromtellus').text('1');
                        checkScrollBars(false);
                        $('body').css('overflow','auto');
                        show_signin_modal();
                    }
                    return false;
                } else {
                    //update request
                    var id = $('#request-course-form').find('.deletecustomized').attr('data-id');
                    $('#request-course-form input[name="isupdate"]').val(id);

                    if (submit_flag == 0) 
                    {   // Update request
                        // Disable button
                        $("#nextbutton").prop('disabled', true);

                        var formData = new FormData($('#request-course-form')[0]);

                        // Append token
                        var _token = $('meta[name="csrf-token"]').attr('content');
                        formData.append('_token', _token);

                        var request = $.ajax(
                                    {
                                        url: base_url + '/updatecustomizedcourse',
                                        type:'POST', //data type
                                        dataType : "json",
                                        headers: {
                                            'X-CSRF-TOKEN': _token
                                        },
                                        data: formData,
                                        // cache: false,
                                        processData: false,
                                        contentType: false,
                                        success:function(data)
                                        {
                                            if (data.info == "success") 
                                            {   // Request successful 
                                                refresh_custom_course_page("finish");
                                                // Reset form
                                                $('#request-course-form').trigger('reset');
                                                $('#requestcustomized_pdf_names').css('display','none');
                                                $("#requestcustomized_pdf_names").html('');

                                                $('#closetellus').click(function(){
                                                    location.reload();
                                                });

                                                setTimeout(function(){
                                                    location.reload();
                                                },500);
                                            }
                                            else
                                            {   // Request error
                                                alert(data.message);
                                            }
                                            // Re-enable button
                                            $("#nextbutton").prop('disabled', false);
                                        },
                                        error:function(data)
                                        {
                                            alert("Failed to request customized course. Please try again later.");

                                            // Re-enable button
                                            $("#nextbutton").prop('disabled', false);
                                        }
                                    });
                    }
                    return false;
                }
            }
        })      
    });
    back.bind("click", function() { 
        jQuery.each( steps, function( i ) {
            if (jQuery(steps[i]).hasClass('done') && jQuery(steps[i + 1]).hasClass('current')) {
                jQuery(steps[i + 1]).removeClass('current');
                jQuery(steps[i]).removeClass('done').addClass('current');
                refresh_custom_course_page($('.step.current').data('value'));
                return false;
            }
        })      
    });

    // // custom datepicker
    // var nowTemp = new Date();
    // var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    // var checkin = $('#startdate').datepicker({
    //                   onRender: function(date) {
    //                     return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //                   }
    //                 }).on('changeDate', function(ev) {
    //                   if (ev.date.valueOf() > checkout.date.valueOf()) {
    //                     var newDate = new Date(ev.date)
    //                     newDate.setDate(newDate.getDate() + 1);
    //                     checkout.setValue(newDate);
    //                   }
    //                   checkin.hide();
    //                   $('#dpd2')[0].focus();
    //                 }).data('datepicker');
    // var checkout = $('#dpd2').datepicker({
    //                   onRender: function(date) {
    //                     return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    //                   }
    //                 }).on('changeDate', function(ev) {
    //                   checkout.hide();
    //                 }).data('datepicker');

    // datepicker
    var currentdate = new Date();
    currentdate.setDate(currentdate.getDate());

    var startdate_input=$('#requestcustomized_startdate'); 
    var enddate_input=$('#requestcustomized_enddate'); 
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
        format: 'DD, MM dd, yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        orientation: "top",
        startDate: currentdate
    };
    startdate_input.datepicker(options);
    enddate_input.datepicker(options);

    var optionsWithDayShortened = {
        format: 'D, MM dd, yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        orientation: "top",
        startDate: currentdate
    };

    var optionsDMY = {
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        orientation: "top",
        startDate: currentdate
    }

    $('.modaldatepicker').datepicker(optionsWithDayShortened);
    $('.modaldatepickeradm').datepicker(optionsDMY);


    // body width
    var scrollw = 0;
    if($('body').prop('scrollHeight')>$('body').height()){
        normalw = window.innerWidth;
        scrollw = normalw - $('body').width();
    }

    if (scrollw > 0) {
        $('body').css('width','calc(100% + ' + scrollw + 'px)');
        $('.homepagenavbar').css('width','calc(100% + ' + scrollw + 'px)');
        $('body').css('position', 'relative');
    }

     // ACCEPT PROPOSAL FROM MY REQUESTS
     $('#accept-proposal-my-requests').click(function(){
        var pid = $(this).attr('data-pid');
        $('#schedule-appointment-form input[name="pid"]').val(pid);
        show_setappointment_modal();

        if (!(customizedstandardmodal > $("#read-more-proposal").hasClass("hide"))) {
                customizedstandardmodal > $("#read-more-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#approved-reschedule-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#approved-reschedule-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#read-more-other-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#read-more-other-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#rejected-request").hasClass("hide"))) {
            customizedstandardmodal > $("#rejected-request").addClass("hide");
            $('#rejected-request-form').trigger('reset');
        }
     });
     // ADD APPOINTMENT FROM MY REQUESTS
     $('#submit-appointment').click(function(){

        var formData = new FormData($('#schedule-appointment-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);

        var request = $.ajax(
                            {
                                url: base_url + '/dashboard/scheduleappointment',
                                type:'POST', //data type
                                dataType : "json",
                                headers: {
                                    'X-CSRF-TOKEN': _token
                                },
                                data: formData,
                                // cache: false,
                                processData: false,
                                contentType: false,
                                beforeSend: function(){
                                    $('#page-loading-ajax').removeClass('hide');
                                },
                                success:function(data)
                                {
                                    if (data.info == "success") 
                                    {   // Request successful 
                                        location.reload();
                                    }
                                    else
                                    {   // Request error
                                        $('#schedule-appointment-form').trigger('reset');
                                        $('#page-loading-ajax').addClass('hide');
                                        alert(data.message);
                                    }
                                },
                                error:function(data)
                                {
                                    $('#page-loading-ajax').addClass('hide');
                                    $('#schedule-appointment-form').trigger('reset');
                                    alert("Failed to approve proposal. Please try again later.");
                                }
                            });
     });
     //END

     // REJECT PROPOSAL FROM MY REQUESTS
     $('#reject-proposal-my-requests').click(function(){
        var pid = $(this).attr('data-pid');

        $('#rejected-request-form input[name="pid"]').val(pid);
        show_submitfeedback_modal();

        if (!(customizedstandardmodal > $("#read-more-proposal").hasClass("hide"))) {
                customizedstandardmodal > $("#read-more-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#approved-reschedule-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#approved-reschedule-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#read-more-other-proposal").hasClass("hide"))) {
            customizedstandardmodal > $("#read-more-other-proposal").addClass("hide");
        }
        if (!(customizedstandardmodal > $("#accepted-request").hasClass("hide"))) {
            customizedstandardmodal > $("#accepted-request").addClass("hide");
            $('#schedule-appointment-form').trigger('reset');
        }
     });

     $('#submit-feedback').click(function(){

        var formData = new FormData($('#rejected-request-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);

        var request = $.ajax(
                        {
                            url: base_url + '/dashboard/rejectproposal',
                            type:'POST', //data type
                            dataType : "json",
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            data: formData,
                            // cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#rejected-request-form').trigger('reset');
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                $('#rejected-request-form').trigger('reset');
                                alert("Failed to reject proposal. Please try again later.");
                            }
                        });

     });
     //END

    //SUBMIT PROPOSAL BROWSE OTHER REQUESTS
    $('#add-proposal-form').submit(function(e){
        e.preventDefault();
        var formData = new FormData($('#add-proposal-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);
        if (parseInt(user_proposal) >= parseInt(proposal_credits)) {
            alert("You've reached maximum limit of submitting proposal. Contact us for premium user access.");
            window.location = base_url + "/contactus#contactusformsection";
        } else {
            var request = $.ajax(
                    {
                        url: base_url + '/dashboard/submitproposal',
                        type:'POST', //data type
                        dataType : "json",
                        headers: {
                            'X-CSRF-TOKEN': _token
                        },
                        data: formData,
                        // cache: false,
                        processData: false,
                        contentType: false,
                        beforeSend: function (){
                          //show loading
                          $('#confirm-form-proposal').prop('disabled',true);
                          $('#page-loading-ajax').removeClass('hide');
                        },
                        success:function(data)
                        {
                            if (data.info == "success") 
                            {   // Request successful 
                                // alert(data.message);
                                location.reload();
                                // Reset form
                                $('#add-proposal-form').trigger('reset');
                                $('#submitproposal_pdf_names').css('display','none');
                                $('#submitproposal_pdf_names').html('');
                            }
                            else
                            {   // Request error
                                $('#page-loading-ajax').addClass('hide');
                                alert(data.message);
                                $('#confirm-form-proposal').prop('disabled',false);
                            }
                        },
                        error:function(data)
                        {
                            $('#page-loading-ajax').addClass('hide');
                            alert("Failed to submit proposal. Please try again later.");
                            $('#confirm-form-proposal').prop('disabled',false);
                        }
                    });
        }
    });
    // END

    // ADMINISTRATOR USER EDIT STATUS
    $(document).on('click', '.change-status-adm', function(){
        var uid = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var email = $(this).attr('data-email');
        var status = $(this).attr('data-status');
        var credits = $(this).attr('data-credits');
        var web_url = $(this).attr('data-web-url');
        var user_desc = $(this).attr('data-user-desc');
        var type = $(this).attr('data-type');
        var proposal_credits = $(this).attr('data-proposal');

        $('#edit-status-user-form input[name="id"]').val(uid);
        $('#edit-status-user-form input[name="adm-name"]').val(name);
        $('#edit-status-user-form input[name="adm-email"]').val(email);
        $('#edit-status-user-form input[name="adm-web-url"]').val(web_url);
        $('#edit-status-user-form select[name="adm-status"]').val(status);
        if (type == 1) {
            $('.coursecredits').removeClass('hide');
            $('.proposalcredits').removeClass('hide');
            $('#edit-status-user-form input[name="adm-course-credits"]').val(credits);
            $('#edit-status-user-form input[name="adm-course-credits"]').attr('min', credits);
            $('#edit-status-user-form input[name="adm-proposal-credits"]').val(proposal_credits);
            $('#edit-status-user-form input[name="adm-proposal-credits"]').attr('min', proposal_credits);
        } else {
            $('.coursecredits').addClass('hide');
            $('.proposalcredits').addClass('hide');
        }
        $('#edit-status-user-form textarea[name="adm-user-desc"]').val(user_desc);

        var course_owned = $('#course-owned');
        course_owned.html('');
        var request = $.ajax(
                        {
                            url: base_url + '/dashboard/getcurrentcourses/' + uid,
                            type:'GET', //data type
                            success:function(data)
                            {
                                var elem = '';
                                jQuery.each(data, function(index, item) {
                                    elem += "<li class='list-group-item' style = 'color : #333'>" + item.title + "</li>";
                                });
                                course_owned.append(elem);
                            },
                            error:function(data)
                            {
                                alert("Failed to fetch courses. Please try again later.");
                            }
                        });

        $('#customized-standard-modal').show();
        checkScrollBars(true);
        $('body').css('overflow','hidden');
        return false;
    });
    $('#submit-edit-user-status').click(function(){

        var formData = new FormData($('#edit-status-user-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);

        var request = $.ajax(
                        {
                            url: base_url + '/dashboard/edituserstatus',
                            type:'POST', //data type
                            dataType : "json",
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            data: formData,
                            // cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                alert("Failed to edit status. Please try again later.");
                            }
                        });
        return false;

     });
    //END

    // ADMINISTRATOR COURSE EDIT MODAL
    $(document).on('click', '.administrator-course-edit', function(){
        var cid = $(this).attr('data-cid');
        var code = $(this).attr('data-code');
        var title = $(this).attr('data-title');
        var lecturer = $(this).attr('data-lecturer');
        var price = $(this).attr('data-price');
        var currency = $(this).attr('data-currency');
        var type = $(this).attr('data-type');
        var status = $(this).attr('data-status');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        // var overview = $(this).attr('data-overview');
        var cover = $(this).attr('data-cover');
        var category = $(this).attr('data-cat');
        // var info = $(this).attr('data-info');
        var split_cat = category.split(',');
        var cat = split_cat[0];
        if (split_cat[0] == 1) {
            cat = split_cat[1];
        }
        var isfeatured = $(this).attr('data-isfeatured');
        var issfc = $(this).attr('data-issfc');

        var request = $.ajax(
                    {
                        url: base_url + '/dashboard/courseoverview/' + code,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                            $('#edit-course-form textarea[name="adm-overview"]').val(data[0].overview);
                            $('#edit-course-form textarea[name="adm-info"]').val(data[0].info);
                        },
                        error:function(data)
                        {
                            alert("Error fetching courses. Please try again later.");
                        }
                    });

        $('#edit-course-form input[name="cid"]').val(cid);
        $('#edit-course-form input[name="adm-title"]').val(title);
        $('#edit-course-form input[name="adm-code"]').val(code);
        $('#edit-course-form input[name="adm-lecturer"]').val(lecturer);
        $('#edit-course-form input[name="adm-price"]').val(price);
        if (type == 1) {
            $('.manager-date').addClass('hide');
        } else {
            $('.manager-date').removeClass('hide');
        }
        $('#edit-course-form input[name="adm-start"]').val(start);
        $('#edit-course-form input[name="adm-end"]').val(end);
        $('#edit-course-form select[name="adm-type"]').val(type);
        $('#edit-course-form select[name="adm-status"]').val(status);
        // $('#edit-course-form textarea[name="adm-overview"]').val(overview);
        // $('#edit-course-form textarea[name="adm-info"]').val(info);
        $('#edit-course-form select[name="adm-currency"]').val(currency);
        $('#edit-course-form select[name="adm-category"]').val(cat);
        if (cover != '' && cover.charAt(0) != '/') {
            $('#edit-course-form #blah-settings').attr('src',s3_url + cover);
        }
        if (isfeatured == 1) 
        {
            $('#checkboxfeatured').prop('checked', true);
        }
        else
        {
            $('#checkboxfeatured').prop('checked', false);
        }

        if (issfc == 1) 
        {
            $('#checkboxsfc').prop('checked', true);
        }
        else
        {
            $('#checkboxsfc').prop('checked', false);
        }
        if (type == 0) {
            $('#topic-part').removeClass('hide');
            // get modules AJAX
            var request = $.ajax(
                            {
                                url: base_url + '/dashboard/getmodules/'+cid,
                                type:'GET', //data type
                                dataType : "json",
                                success:function(data)
                                {
                                    $('#edit-course-form textarea[name="adm-topics"]').val(data[0].module_title);
                                },
                                error:function(data)
                                {
                                    alert("Error occured. Please try again later.");
                                }
                            });
            // end
        } else {
            if (!$('#topic-part').hasClass('hide')) {
                $('#topic-part').addClass('hide');
            }
        }
        $('#customized-standard-modal').show();
        checkScrollBars(true);
        $('body').css('overflow','hidden');

    });
    $('#submit-edit-courses').click(function(){

        var formData = new FormData($('#edit-course-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);
        formData.append('adm-lecturer', $('#edit-course-form input[name="adm-lecturer"]').val());

        var request = $.ajax(
                        {
                            url: base_url + '/dashboard/editcourse',
                            type:'POST', //data type
                            dataType : "json",
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            data: formData,
                            // cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                    console.log(data.trace);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                alert("Failed to edit course. Please try again later.");
                            }
                        });

     });
    // END

    // ADMINISTRATOR DELETE
    $('#delete-edit-courses').click(function(){

        var conf = window.confirm("Are you sure want to delete this course?");
        var formData = new FormData($('#edit-course-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);
        if (conf) {
            var request = $.ajax(
                        {
                            url: base_url + '/dashboard/deletecourse',
                            type:'POST', //data type
                            dataType : "json",
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            data: formData,
                            // cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                alert("Failed to delete course. Please try again later.");
                            }
                        });
        }
    });

    // ADMINISTRATOR DELETE COURSE REQUEST
    $(document).on('click','.administrator-course-request-delete', function(){
        var conf = window.confirm("Are you sure want to delete this course request? You won't be able to get it back.");
        var cid = $(this).attr('data-cid');
        var title = $(this).attr('data-title');
        if (conf) {
            var request = $.ajax(
                        {
                            url: base_url + '/dashboard/deletecourserequest/'+ cid +'/' + title,
                            type:'GET', //data type
                            dataType : "json",
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                alert("Failed to delete course. Please try again later.");
                            }
                        });
        }
    });

    // ADMINISTRATOR EDIT TRANSACTION
    $(document).on('click', '.change-status-transaction-adm', function(){
        var uid = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var email = $(this).attr('data-email');
        var email2 = $(this).attr('data-email2');
        var status = $(this).attr('data-status');
        var credits = $(this).attr('data-credits');

        $('#edit-status-user-form input[name="id"]').val(uid);
        $('#edit-status-user-form input[name="adm-invoice"]').val(name);
        $('#edit-status-user-form input[name="adm-name"]').val(email);
        $('#edit-status-user-form input[name="adm-email"]').val(email2);
        $('#edit-status-user-form select[name="adm-status"]').val(status);

        $('#customized-standard-modal').show();
        checkScrollBars(true);
        $('body').css('overflow','hidden');
        return false;
    });
    $('#submit-edit-transaction-status').click(function(){

        var formData = new FormData($('#edit-status-user-form')[0]);

        // Append token
        var _token = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', _token);

        var request = $.ajax(
                        {
                            url: base_url + '/dashboard/edittransactionstatus',
                            type:'POST', //data type
                            dataType : "json",
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            data: formData,
                            // cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                $('#page-loading-ajax').removeClass('hide');
                            },
                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Request successful 
                                    location.reload();
                                }
                                else
                                {   // Request error
                                    $('#page-loading-ajax').addClass('hide');
                                    alert(data.message);
                                }
                            },
                            error:function(data)
                            {
                                $('#page-loading-ajax').addClass('hide');
                                alert("Failed to edit status. Please try again later.");
                            }
                        });
        return false;

     });
    // END
});

function clean_modal(clean) 
{   // clean the request customized course modal contents when the modal is closed 
    var steps = jQuery(".step");

    // update progress bar
    jQuery(steps[0]).addClass('current');
    jQuery(steps[0]).removeClass('done');
    jQuery(steps[1]).removeClass('current');
    jQuery(steps[1]).removeClass('done');
    jQuery(steps[2]).removeClass('current');
    jQuery(steps[2]).removeClass('done');

    refresh_custom_course_page("first");

    if (clean) 
    {
        // Empty fields
        $("#requestcustomized_description").val('');
        $("#requestcustomized_budget").val('');
        $("#requestcustomized_participants").val('');
        $('#checkboxconfidential').removeAttr('checked');
        $("#request-course-form input:radio[name=requestcustomized_areaoftraining_radio]").attr('checked', false);

        $("#requestcustomized_startdate").val('');
        $("#requestcustomized_enddate").val('');

        $("#requestcustomized_additional").val('');

        $('#requestcustomized_pdf_names').css('display','none');
        $("#requestcustomized_pdf_names").html('');
    }
    

    // Show next button
    $("#nextbuttondiv").css('display','table');

    // Show * text
    $("#tellustext").css('display','block');   

    // Clean upload image
    $('#requestcustomizedcoursespdf').attr('src', base_url + "/img/pdficon-min.png"); 
}

function refresh_custom_course_page(page) 
{   // refresh request customized course content 
    // page is first/second/third/finish
    if (page == "first") 
    {   // First page selected
        // Show telluscontentbody
        $('#telluscontentbody').css('display', "block");
        $('#tellusfinishbody').css('display', "none");

        // Update contents
        $('#tellusdiv').css('display', "block");
        $('#tellus2div').css('display', "none");
        $('#tellus3div').css('display', "none");
        $('#tellus4div').css('display', "none");

        // Show progressbar
        $("#progresbar").css('display','block');
        
        // hide previous button
        $("#previousbuttondiv").css('display','none');
        // $("#previousbuttondiv").fadeOut();
        // $("#previousbuttondiv").fadeOut("slow");
        // $("#previousbuttondiv").fadeOut(500);

        // update next button value
        $("#nextbutton").html("Next");

        // Show * text
        $("#tellustext").css('display','block');  
    } 
    else if(page == "third")
    {   // Third page selected
        // Show telluscontentbody
        $('#telluscontentbody').css('display', "block");
        $('#tellusfinishbody').css('display', "none");

        // Update contents
        $('#tellusdiv').css('display', "none");
        $('#tellus2div').css('display', "none");
        $('#tellus3div').css('display', "block");
        $('#tellus4div').css('display', "none");

        // Show progressbar
        $("#progresbar").css('display','block');
        
        // show previous button
        $("#previousbuttondiv").fadeIn();
        $("#previousbuttondiv").fadeIn("slow");
        $("#previousbuttondiv").fadeIn(500);

        // update next button value
        $("#nextbutton").html("Submit");

        // Hide * text
        $("#tellustext").css('display','none');  
    }
    else if(page == "finish")
    {   // finish page selected
        // Show telluscontentbody
        $('#telluscontentbody').css('display', "none");
        $('#tellusfinishbody').css('display', "block");

        // Update contents
        $('#tellusdiv').css('display', "none");
        $('#tellus2div').css('display', "none");
        $('#tellus3div').css('display', "none");
        $('#tellus4div').css('display', "block");

        // Hide progressbar
        $("#progresbar").css('display','none');
        
        // hide all buttons
        $("#previousbuttondiv").css('display','none');
        $("#nextbuttondiv").css('display','none');

        // update next button value
        $("#nextbutton").html("Finish");

        // Hide * text
        $("#tellustext").css('display','none');  
    }
    else 
    {   // middle page
        // Show telluscontentbody
        $('#telluscontentbody').css('display', "block");
        $('#tellusfinishbody').css('display', "none");

        // Update contents
        $('#tellusdiv').css('display', "none");
        $('#tellus2div').css('display', "block");
        $('#tellus3div').css('display', "none");
        $('#tellus4div').css('display', "none");

        // Show progressbar
        $("#progresbar").css('display','block');

        // show previous button
        $("#previousbuttondiv").fadeIn();
        $("#previousbuttondiv").fadeIn("slow");
        $("#previousbuttondiv").fadeIn(500);
        $('#previousbuttondiv').css('display', "table");

        // update next button value
        $("#nextbutton").html("Next");

        // Hide * text
        $("#tellustext").css('display','none');  
    }
}

function readURL(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function readURLOffline(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahOffline')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function readPDF(input) 
{
    $('#requestcustomized_pdf_names').html('');
    $('#requestcustomized_pdf_names').css('display','none');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#requestcustomizedcoursespdf')
                .attr('src', base_url + "/img/pdficon-min.png");
            // Show file names
            if (input.files.length > 1) {
                var file_names = input.files.length+" file(s) selected";
                $('#requestcustomized_pdf_names').html('').append( file_names );
            } else {
                var file_names = input.files[0].name;
                $('#requestcustomized_pdf_names').html('').append( file_names );
            }
            $('#requestcustomized_pdf_names').css('display','inline-block');
            $('.delete-pdf').css('display','inline-block');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readPDFProposal(input) 
{
    $('#submitproposal_pdf_names').html('');
    $('#submitproposal_pdf_names').css('display','none');

    if (input.files && input.files[0] && input.files[0].type.match('application/pdf')) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#requestcustomizedcoursespdf')
            //     .attr('src', base_url + "/img/pdficon-min.png");
            // Show file names
            if (input.files.length > 1) {
                var file_names = input.files.length+" file(s) selected";
                $('#submitproposal_pdf_names').html('').append( file_names );
            } else {
                var file_names = input.files[0].name;
                $('#submitproposal_pdf_names').html('').append( file_names );
            }
            $('#submitproposal_pdf_names').css('display','inline-block');
            $('.delete-proposal-pdf').css('display','inline-block');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLSetting(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah-settings')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('click','.btn-add', function(){
    var count = parseInt($('.upload-content-no:last').text());
    var uploadContent = $(this).parent().parent().parent().clone();
    count++;
    $(uploadContent).find('.upload-content-no').text(count);
    $('.upload-content:last').after(uploadContent);
});

$(document).ready(function(){
    // AJAX CALLS: Login/Logout
    $("#login_email").on('keyup', function (event) {
        if (event.keyCode == 13) {
            // Enter key pressed
            attempt(event);
        }
    });
    $("#login_password").on('keyup', function (event) {
        if (event.keyCode == 13) {
            // Enter key pressed
            attempt(event);
        }
    });
    $("#forgotpassword_email").on('keyup', function (event) {
        if (event.keyCode == 13) {
            // Enter key pressed
            reset_password_attempt(event);
        }
    });
    $("#networkpage_search_field").on('keyup', function (event) {
        if (event.keyCode == 13) {
            // Enter key pressed
            $("#networkpage_search_form").submit();
        }
    });
    $("#sign_button").click(function(event)
    {   // sign-in or sign-up actions 
        attempt(event);
    });

    function attempt(event)
    {
        event.preventDefault();

        var method = $("#sign_button").text();

        if (method.toLowerCase() == "sign in") 
        {   // Sign In 
            console.log('asdf');
            $("#sign_button").prop('disabled', true);

            var login_email = $('#login_email').val();
            var login_password = $('#login_password').val();
            console.log(login_email);
            console.log(login_password);
            var login_rememberme = $('#login_rememberme').prop("checked");
            var _token = $('meta[name="csrf-token"]').attr('content');

            var login = $.ajax(
                        {
                            url: base_url + '/login_user',
                            type:'POST', //data type
                            dataType : "json",
                            data: {method:1, login_email:login_email, login_password:login_password, login_rememberme:login_rememberme, _token:_token},

                            success:function(data)
                            {
                                if (data.info == "success") 
                                {   // Login successful
                                    window.location.replace(base_url+"/dashboard");
                                    // location.reload();

                                }
                                else
                                {   // Login error
                                    alert(data.message);
                                    $("#sign_button").prop('disabled', false);
                                }
                            },
                            error:function(data)
                            {
                                alert("Login error. Please try again later.");
                                $("#sign_button").prop('disabled', false);
                            }
                        });
        }
        else if(method.toLowerCase() == "sign up")
        {   // Sign Up 
            $("#sign_button").prop('disabled', true);

            var _token = $('meta[name="csrf-token"]').attr('content');
            var signup_type = $('#signup_type').val();
            if (signup_type == 1) 
            {   // Corporate
                var signup_fullname = $('#signup_fullname').val();
                var signup_email = $('#signup_email').val();
                var signup_password = $('#signup_password').val();
                var signup_corporate_company_name = $('#signup_corporate_company_name').val();
                var signup_corporate_company_email = $('#signup_corporate_company_email').val();
                var signup_corporate_company_phone_number = $('#signup_corporate_company_phone_number').val();
                var signup_address = $('#signup_address').val();
                var signup_postal = $('#signup_postal').val();
                // var signup_city = $('#signup_city').val();
                var signup_country = $('#signup_country').val();
                var signup_interest = $('#signup_interest').val();
                var signup_industry = $('#signup_industry').val();
                var signup_corporate_admin_occupation = $('#signup_corporate_admin_occupation').val();
                
                var signup = $.ajax(
                            {
                                url: base_url + '/register',
                                type:'POST', //data type
                                dataType : "json",
                                data: {method:1, signup_type:signup_type, 
                                        signup_fullname:signup_fullname, 
                                        signup_email:signup_email, 
                                        signup_password:signup_password, 
                                        signup_corporate_company_name:signup_corporate_company_name, 
                                        signup_corporate_company_email:signup_corporate_company_email, 
                                        signup_corporate_company_phone_number:signup_corporate_company_phone_number, 
                                        'signup_address[address]': signup_address,
                                        'signup_address[postal]': signup_postal,
                                        // 'signup_address[city]': signup_city,
                                        signup_country:signup_country, 
                                        signup_interest:signup_interest, 
                                        signup_industry:signup_industry, 
                                        signup_corporate_admin_occupation:signup_corporate_admin_occupation, 
                                        _token:_token},
                                success:function(data)
                                {
                                    if (data.info == "success") 
                                    {   // Signup successful
                                        
                                        // window.location.replace(base_url+"/dashboard");

                                        // CHECK IF SIGN IN FROM TELL US MODAL
                                        if ($('#fromtellus').text() == '1' && (data.user_type != null && data.user_type == '1')) {
                                            // SUBMIT CUSTOMIZED COURSE
                                            $("#nextbutton").prop('disabled', true);

                                            var formData = new FormData($('#request-course-form')[0]);

                                            // Append token
                                            var _token = $('meta[name="csrf-token"]').attr('content');
                                            formData.append('_token', _token);

                                            var request = $.ajax(
                                                        {
                                                            url: base_url + '/requestcustomizedcourse',
                                                            type:'POST', //data type
                                                            dataType : "json",
                                                            headers: {
                                                                'X-CSRF-TOKEN': _token
                                                            },
                                                            data: formData,
                                                            // cache: false,
                                                            processData: false,
                                                            contentType: false,
                                                            success:function(data)
                                                            {
                                                                if (data.info == "success") 
                                                                {   // Request successful 
                                                                    var url = window.location.href;
                                                                    var postcourseflag = 0;
                                                                    var temp = url.search("/customizedcourse");
                                                                    if (temp != -1) {
                                                                      postcourseflag = 1;
                                                                    }
                                                                    if (postcourseflag == 1) {
                                                                        $('#page-loading-ajax').removeClass('hide');
                                                                        location.reload();
                                                                    } else {
                                                                        checkScrollBars(false);
                                                                        signinmodal.style.display = "none";
                                                                        show_tellus_modal();
                                                                        refresh_custom_course_page("finish");
                                                                        // Reset form
                                                                        $('#request-course-form').trigger('reset');
                                                                        $('#requestcustomized_pdf_names').css('display','none');
                                                                        $("#requestcustomized_pdf_names").html('');
                                                                        $('.delete-pdf').css('display','none');
                                                                    }
                                                                }
                                                                else
                                                                {   // Request error
                                                                    location.reload();
                                                                }
                                                                // Re-enable button
                                                                $("#nextbutton").prop('disabled', false);
                                                            },
                                                            error:function(data)
                                                            {
                                                                alert("Failed to request customized course. Please try again later.");

                                                                // Re-enable button
                                                                $("#nextbutton").prop('disabled', false);
                                                            }
                                                        });
                                        } else {
                                            location.reload();
                                        }
                                    }
                                    else
                                    {   // Signup error
                                        alert(data.message);
                                    }
                                    $("#sign_button").prop('disabled', false);
                                },
                                error:function(data)
                                {
                                    alert("Account registration error. Please try again later.");
                                    $("#sign_button").prop('disabled', false);
                                }
                            });
            }
            else
            {   // Individual
                var signup_fullname = $('#signup_fullname').val();
                var signup_email = $('#signup_email').val();
                var signup_password = $('#signup_password').val();
                var signup_corporate_company_phone_number = $('#signup_corporate_company_phone_number').val();
                var signup_address = $('#signup_address').val();
                var signup_postal = $('#signup_postal').val();
                // var signup_city = $('#signup_city').val();
                var signup_country = $('#signup_country').val();
                var signup_interest = $('#signup_interest').val();
                var signup_industry = $('#signup_industry').val();
                var signup_occupation = $('#signup_occupation').val();
                var signup_organization = $('#signup_organization').val();
                
                var signup = $.ajax(
                            {
                                url: base_url + '/register',
                                type:'POST', //data type
                                dataType : "json",
                                data: {method:1, 
                                        signup_type:signup_type,
                                        signup_fullname:signup_fullname, 
                                        signup_email:signup_email, 
                                        signup_password:signup_password, 
                                        signup_corporate_company_phone_number: signup_corporate_company_phone_number,
                                        'signup_address[address]': signup_address,
                                        'signup_address[postal]': signup_postal,
                                        // 'signup_address[city]': signup_city,
                                        signup_country:signup_country, 
                                        signup_interest:signup_interest, 
                                        signup_industry:signup_industry, 
                                        signup_occupation:signup_occupation, 
                                        signup_organization:signup_organization, 
                                        _token:_token},

                                success:function(data)
                                {
                                    if (data.info == "success") 
                                    {   // Signup successful

                                        // window.location.replace(base_url+"/dashboard");
                                        location.reload();
                                    }
                                    else
                                    {   // Signup error
                                        alert(data.message);
                                    }
                                    $("#sign_button").prop('disabled', false);
                                },
                                error:function(data)
                                {
                                    alert("Account registration error. Please try again later.");
                                    $("#sign_button").prop('disabled', false);
                                }
                            });
            }
            
        }
    }

    // Scroll animations and switch anchor active state
    var topMenu = $("#animatedanchors");
    var indexTrustedBy = $("#lad_index_a3");
    if (topMenu!= null) 
    {   // Menu captured
        // https://stackoverflow.com/questions/9979827/change-active-menu-item-on-page-scroll
        // Cache selectors
        var lastId,
            topMenuHeight = topMenu.outerHeight()-110,
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function(){
              var item = $($(this).attr("href"));
              if (item.length) { return item; }
            });

        // Bind click handler to menu items
        // so we can get a fancy scroll animation
        menuItems.click(function(e){
          var href = $(this).attr("href"),
              // offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
              offsetTop = href === "#" ? 0 : $(href).offset().top - 100;

          $('html, body').stop().animate({ 
              scrollTop: offsetTop
          }, 300);
          e.preventDefault();
        });

        // Bind to scroll
        $(window).scroll(function(){
           // Get container scroll position
           var fromTop = $(this).scrollTop()+topMenuHeight;
           
           // Get id of current scroll item
           var cur = scrollItems.map(function(){
             if ($(this).offset().top < fromTop)
               return this;
           });
           // Get the id of the current element
           cur = cur[cur.length-1];
           var id = cur && cur.length ? cur[0].id : "";
           
           if (lastId !== id) {
               lastId = id;
               // Set/remove active class
               menuItems
                 .parent().removeClass("active")
                 .end().filter("[href='#"+id+"']").parent().addClass("active");
           }                   
        });
    }    
    if (indexTrustedBy != null) 
    {   // Index page scrolled anchor
        // Cache selectors
        var topMenuHeight = topMenu.outerHeight()+100,
            // Anchors corresponding to menu items
            scrollItems = indexTrustedBy.map(function(){
              var item = $($(this).attr("href"));
              if (item.length) { return item; }
            });

        // Bind click handler to menu items
        // so we can get a fancy scroll animation
        indexTrustedBy.click(function(e){
          var href = $(this).attr("href"),
              offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
          $('html, body').stop().animate({ 
              scrollTop: offsetTop
          }, 300);
          e.preventDefault();
        });

        // Bind to scroll
        $(window).scroll(function(){
           // Get container scroll position
           var fromTop = $(this).scrollTop()+topMenuHeight;
           
           // Get id of current scroll item
           var cur = scrollItems.map(function(){
             if ($(this).offset().top < fromTop)
               return this;
           });
           // Get the id of the current element
           cur = cur[cur.length-1];
           var id = cur && cur.length ? cur[0].id : "";              
        });
    }

    // EMPLOYEE LIST CONFIRMATION MODAL BUTTON YES CLICKED
    $('#employeeconfirmation-modal .buttonyes').click(function(){
        var user_id = $(this).attr('data-user-id');
        var functionality = $(this).attr('data-functionality'); 
        var added = $.ajax(
                    {
                        url: base_url + '/dashboard/employeelist/' + functionality + "/" + user_id,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                            if (data != '') {
                                location.reload();
                            }
                        },
                        error:function(data)
                        {
                            alert("Error modifying employee list.");
                        }
                    });
    });
    // END OF BUTTON YES CLICKED

    // RESET PASSWORD ACTION
    $('#reset_password_button').click(function(event) {
        reset_password_attempt(event);
    });

    function reset_password_attempt(event) 
    {   // Reset password
        // Disable reset button
        $('#reset_password_button').prop("disabled",true);

        var _token = $('meta[name="csrf-token"]').attr('content');
        var forgotpassword_email = $('#forgotpassword_email').val();

        var reset = $.ajax(
                    {
                        url: base_url + '/resetpassword',
                        type:'POST',
                        dataType : "json",
                        data: {forgotpassword_email:forgotpassword_email, _token:_token},
                        success:function(data)
                        {
                            if (data['info'] == 'success') 
                            {   // Reset password OK

                                // Show success message
                                $('#forgotpassword_quote').html("Please check your email and follow the instructions to reset the password.");
                                $('#forgotpassword_quote').css('padding', '0 10px');
                                
                                // Edit title message
                                $('#forgotpassword_title').html("Password has been reset");

                                // Hide field and button
                                $('#forgotpassword_email').css('display', 'none');
                                $('#reset_password_button').css('display', 'none');

                                // Switch reset and OK button
                                $('#reset_password_button').css('display', 'none');
                                $('#reset_password_ok').css('display', 'block');

                                $('#reset_password_button').prop("disabled",false);                       
                            }
                            else
                            {   // Reset password not OK
                                if (data['code'] == 2) 
                                {   // invalid email address

                                    // Edit message
                                    $('#forgotpassword_quote').html(data.message);
                                    $('#forgotpassword_quote').css('padding', '0 10px');
                                }
                                else
                                {   // Other errors
                                    alert(data.message);
                                }
                                // Re-enable reset button
                                $('#reset_password_button').prop("disabled",false);
                            }
                        },
                        error:function(data)
                        {
                            alert("Unable to process your password reset request. Please try again later.");

                            // Re-enable reset button
                            $('#reset_password_button').prop("disabled",false);
                        }
                    });
    }
});

function clear_reset_password() {
    // Reset the modal
    $('#forgotpassword_quote').html("if you have forgotten your password, you can reset it here.");
    $('#forgotpassword_quote').css('padding', '0');

    $('#forgotpassword_title').html("Forgot Password?");

    $('#forgotpassword_email').css('display', 'block');
    $('#reset_password_button').css('display', 'inline-block');

    // Empty email field
    $('#forgotpassword_email').val('');

    // Switch reset and OK button
    $('#reset_password_button').css('display', 'block');
    $('#reset_password_ok').css('display', 'none');
}

// Google Sign-in Custom Scripts
function googleSign(googleUser) {
    var flag = $("#googleflag").val();
    if (flag == 0) 
    {   // Initial load, dont AJAX.
    }
    else
    {   // AJAX.
        var _token = $('meta[name="csrf-token"]').attr('content');
        var googletype = $("#googletype").val();
        var profile = googleUser.getBasicProfile();

        if (googletype == 'in') 
        {   // Sign-in with Google            
            var email = profile.getEmail();
            var id_token = googleUser.getAuthResponse().id_token;
            // Log in via AJAX
            var google_signin = $.ajax(
                                    {
                                        url: base_url + '/login',
                                        type:'POST', //data type
                                        dataType : "json",
                                        data: { method: 2,
                                                email: email,
                                                id_token: id_token,
                                                _token: _token},

                                        success:function(data)
                                        {
                                            if (data.info == "success") 
                                            {   // Login successful
                                                // window.location.replace(base_url+"/dashboard");
                                                location.reload();
                                            }
                                            else
                                            {   // Login error
                                                alert(data.message);
                                            }
                                        },
                                        error:function(data)
                                        {
                                            alert("Login error. Please try again later.");
                                        }
                                  });
        }
        else if(googletype == 'up')
        {   // Sign-up with Google
            var fullname = profile.getName();
            var email = profile.getEmail();
            var id_token = googleUser.getAuthResponse().id_token;
            // Sign up via AJAX
            var google_signup = $.ajax(
                                    {
                                        url: base_url + '/register',
                                        type:'POST', //data type
                                        dataType : "json",
                                        data: {method:2, fullname:fullname, email:email, id_token:id_token, _token:_token},

                                        success:function(data)
                                        {
                                            if (data.info == "success") 
                                            {   // Login successful
                                                // alert("New individual account registered successfully.");
                                                // window.location.replace(base_url+"/dashboard");
                                                location.reload();
                                            }
                                            else
                                            {   // Login error
                                                alert(data.message);
                                            }
                                        },
                                        error:function(data)
                                        {
                                            console.log(data);
                                            alert("Account registration error. Please try again later.");
                                        }
                                    });
        }        
    }      
};

// Prevent "e", "=", "-" to input number (Request Customized Course)
var requestcustomized_budget = document.getElementById("requestcustomized_budget");
if (requestcustomized_budget != null) 
{
    requestcustomized_budget.addEventListener("keydown", function(e) {
      // prevent: "e", "=", "-", "."
      if ([69, 187, 189].includes(e.keyCode)) {
        e.preventDefault();
      }
    })
}
var requestcustomized_participants = document.getElementById("requestcustomized_participants");
if (requestcustomized_participants != null) 
{
    requestcustomized_participants.addEventListener("keydown", function(e) {
      // prevent: "e", "=", ",", "-", "."
      if ([69, 187, 188, 189, 190].includes(e.keyCode)) {
        e.preventDefault();
      }
    })
}

// Only allow numbers in signup_corporate_company_phone_number and contactus_phone
if (document.getElementById("signup_corporate_company_phone_number") != null) {
    document.getElementById("signup_corporate_company_phone_number").addEventListener("keypress", function (evt) {
        if ((evt.which != 43) && (evt.which < 48 || evt.which > 57))
        {
            evt.preventDefault();
        }
    });
}

if (document.getElementById("contactus_phone") != null) {
    document.getElementById("contactus_phone").addEventListener("keypress", function (evt) {
        if ((evt.which != 43) && (evt.which < 48 || evt.which > 57))
        {
            evt.preventDefault();
        }
    });    
}
