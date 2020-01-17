
 /**  
  * WpF BGness 
  * Template Scripts
  * Created by WpFreeware Team
  *Author Uri : http://www.wpfreeware.com/

  Custom JS
  
  1. Dropdown Menu
  2. Superslides Slider
  3. Slick Slider
  4. Google Map
  5. ScrollTop
  6. Wow animation
  7. Preloader   
  
**/

 jQuery(function($){

  AOS.init({
    once: false,
  });

  $('.datepicker, .datepicker-normal').datepicker();

  /* ----------------------------------------------------------- */
  /*  1. Dropdown Menu
  /* ----------------------------------------------------------- */

  // for click dropdown menu
  $('ul.nav li.dropdown').click(function() {
    if ($(this).find('.dropdown-menu').is(":visible")) 
    {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    }
    else
    {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }
  });

  // custom dropdown menu (network/chat/notif)
  $('#notifheader_users').click(function() {
    $("#chatdiv").css("display","block");
    $('#chatdiv').stop(true, true).delay(200).fadeIn(200);
    $("#notifdiv").css("display","none");
    $('#notifdiv').stop(true, true).delay(200).fadeOut(200);

    $("#notifheader_users").addClass("active");
    $("#notifheader_alerts").removeClass("active");

    open_notif_dropdown()
  });
  $('#headerchata').click(function() {
    $("#chatdiv").css("display","block");
    $('#chatdiv').stop(true, true).delay(200).fadeIn(200);
    $("#notifdiv").css("display","none");
    $('#notifdiv').stop(true, true).delay(200).fadeOut(200);

    $("#notifheader_users").addClass("active");
    $("#notifheader_alerts").removeClass("active");
    open_notif_dropdown()
  });
  $('#headernotifa, #notifheader_alerts').click(function() {
    $("#chatdiv").css("display","none");
    $('#chatdiv').stop(true, true).delay(200).fadeOut(200);
    $("#notifdiv").css("display","block");
    $('#notifdiv').stop(true, true).delay(200).fadeIn(200);

    $("#notifheader_users").removeClass("active");
    $("#notifheader_alerts").addClass("active");
    open_notif_dropdown()
  });
  function open_notif_dropdown() {
    // Open notif dropdown
    if ($('#headernotif').find('.dropdown-menu').is(":visible")) 
    {
      // $('#headernotif').find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    }
    else
    {
      $('#headernotif').find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }
  }

  /* ----------------------------------------------------------- */
  /*  2. Superslides Slider
  /* ----------------------------------------------------------- */

   $('#slides').superslides({
      animation: 'fade'
    });
  
  /* ----------------------------------------------------------- */
  /*  3. Slick Slider
  /* ----------------------------------------------------------- */
  // For Works slider

  $('.slick_slider').slick({
    dots: true,
    infinite: true,      
    speed: 800,
    arrows:false,      
    slidesToShow: 1,
    slide: 'div',
    autoplay: true,
    fade: true,
    autoplaySpeed: 5000,
    cssEase: 'linear'
  }); 

// team slider call

$('.team_nav').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  arrows:false,  
  slidesToScroll: 4,
  slide: 'li',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

//Clients Slider Call

  $('.clb_nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  slide: 'li',
  dots: false,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,        
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

/* ----------------------------------------------------------- */
/*  4. Google Map
/* ----------------------------------------------------------- */

// var zoom= $('#map_canvas').gmap('option', 'zoom');
  
// $('#map_canvas').gmap().bind('init', function(ev, map) {
//   $('#map_canvas').gmap('addMarker', {'position': '57.7973433,12.0502107', 'bounds': true});
//   $('#map_canvas').gmap('option', 'zoom', 13);
// });


});

/* ----------------------------------------------------------- */
/*  5. ScrollTop
/* ----------------------------------------------------------- */

//Check to see if the window is top if not then display button

$(window).scroll(function(){
  if ($(this).scrollTop() > 300) {
    $('.scrollToTop').fadeIn();
  } else {
    $('.scrollToTop').fadeOut();
  }
});
 
//Click event to scroll to top

$('.scrollToTop').click(function(){
  $('html, body').animate({scrollTop : 0},800);
  return false;
});


/* ----------------------------------------------------------- */
/*  6. WOW animation
/* ----------------------------------------------------------- */
wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100
  }
);
wow.init();
// document.getElementById('moar').onclick = function() {
//   var section = document.createElement('section');
//   section.className = 'section--purple wow fadeInDown';
//   this.parentNode.insertBefore(section, this);
// };


/* ----------------------------------------------------------- */
/*  7. Preloader
/* ----------------------------------------------------------- */

//<![CDATA[
  jQuery(window).load(function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
    // $('body').delay(100).css({'overflow':'visible'});
  })
//]]>


/* ----------------------------------------------------------- */
/*  8. Additional JS
/* ----------------------------------------------------------- */

//LIMIT MAXIMUM INPUT FOR PARTICIPANT
function maxLengthCheck(object, usage) {
    if (usage == '') {
      usage = false;
    }
    if (object.value.length > object.max.length) {
      if (!usage) 
      { // Appointment
        object.value = object.value.slice(0, object.max.length);
      }
      else
      { // Request Customized Course
        // object.value = object.value.slice(0, object.max.length);
        object.value = 999;
      }      
    }
  }
function maxValueCheck(object) {
    if (parseFloat(object.value) > parseFloat(object.max)) {
      object.value = 99999.99;
    }
  }
function checkWordCount(id){
    s = document.getElementById(id).value;
    s = s.replace(/(^\s*)|(\s*$)/gi,"");
    s = s.replace(/[ ]{2,}/gi," ");
    s = s.replace(/\n /,"\n");
    if (s.split(' ').length < 100) {
        alert("You must enter minimum 100 words, now you only have " + s.split(' ').length + ' word(s).');
        return false;
    }
}

function getCountryName (countryCode) {
    var isoCountries = 
    {
        'AF' : 'Afghanistan',
        'AX' : 'Aland Islands',
        'AL' : 'Albania',
        'DZ' : 'Algeria',
        'AS' : 'American Samoa',
        'AD' : 'Andorra',
        'AO' : 'Angola',
        'AI' : 'Anguilla',
        'AQ' : 'Antarctica',
        'AG' : 'Antigua And Barbuda',
        'AR' : 'Argentina',
        'AM' : 'Armenia',
        'AW' : 'Aruba',
        'AU' : 'Australia',
        'AT' : 'Austria',
        'AZ' : 'Azerbaijan',
        'BS' : 'Bahamas',
        'BH' : 'Bahrain',
        'BD' : 'Bangladesh',
        'BB' : 'Barbados',
        'BY' : 'Belarus',
        'BE' : 'Belgium',
        'BZ' : 'Belize',
        'BJ' : 'Benin',
        'BM' : 'Bermuda',
        'BT' : 'Bhutan',
        'BO' : 'Bolivia',
        'BA' : 'Bosnia And Herzegovina',
        'BW' : 'Botswana',
        'BV' : 'Bouvet Island',
        'BR' : 'Brazil',
        'IO' : 'British Indian Ocean Territory',
        'BN' : 'Brunei Darussalam',
        'BG' : 'Bulgaria',
        'BF' : 'Burkina Faso',
        'BI' : 'Burundi',
        'KH' : 'Cambodia',
        'CM' : 'Cameroon',
        'CA' : 'Canada',
        'CV' : 'Cape Verde',
        'KY' : 'Cayman Islands',
        'CF' : 'Central African Republic',
        'TD' : 'Chad',
        'CL' : 'Chile',
        'CN' : 'China',
        'CX' : 'Christmas Island',
        'CC' : 'Cocos (Keeling) Islands',
        'CO' : 'Colombia',
        'KM' : 'Comoros',
        'CG' : 'Congo',
        'CD' : 'Congo, Democratic Republic',
        'CK' : 'Cook Islands',
        'CR' : 'Costa Rica',
        'CI' : 'Cote D\'Ivoire',
        'HR' : 'Croatia',
        'CU' : 'Cuba',
        'CY' : 'Cyprus',
        'CZ' : 'Czech Republic',
        'DK' : 'Denmark',
        'DJ' : 'Djibouti',
        'DM' : 'Dominica',
        'DO' : 'Dominican Republic',
        'EC' : 'Ecuador',
        'EG' : 'Egypt',
        'SV' : 'El Salvador',
        'GQ' : 'Equatorial Guinea',
        'ER' : 'Eritrea',
        'EE' : 'Estonia',
        'ET' : 'Ethiopia',
        'FK' : 'Falkland Islands (Malvinas)',
        'FO' : 'Faroe Islands',
        'FJ' : 'Fiji',
        'FI' : 'Finland',
        'FR' : 'France',
        'GF' : 'French Guiana',
        'PF' : 'French Polynesia',
        'TF' : 'French Southern Territories',
        'GA' : 'Gabon',
        'GM' : 'Gambia',
        'GE' : 'Georgia',
        'DE' : 'Germany',
        'GH' : 'Ghana',
        'GI' : 'Gibraltar',
        'GR' : 'Greece',
        'GL' : 'Greenland',
        'GD' : 'Grenada',
        'GP' : 'Guadeloupe',
        'GU' : 'Guam',
        'GT' : 'Guatemala',
        'GG' : 'Guernsey',
        'GN' : 'Guinea',
        'GW' : 'Guinea-Bissau',
        'GY' : 'Guyana',
        'HT' : 'Haiti',
        'HM' : 'Heard Island & Mcdonald Islands',
        'VA' : 'Holy See (Vatican City State)',
        'HN' : 'Honduras',
        'HK' : 'Hong Kong',
        'HU' : 'Hungary',
        'IS' : 'Iceland',
        'IN' : 'India',
        'ID' : 'Indonesia',
        'IR' : 'Iran, Islamic Republic Of',
        'IQ' : 'Iraq',
        'IE' : 'Ireland',
        'IM' : 'Isle Of Man',
        'IL' : 'Israel',
        'IT' : 'Italy',
        'JM' : 'Jamaica',
        'JP' : 'Japan',
        'JE' : 'Jersey',
        'JO' : 'Jordan',
        'KZ' : 'Kazakhstan',
        'KE' : 'Kenya',
        'KI' : 'Kiribati',
        'KR' : 'Korea',
        'KW' : 'Kuwait',
        'KG' : 'Kyrgyzstan',
        'LA' : 'Lao People\'s Democratic Republic',
        'LV' : 'Latvia',
        'LB' : 'Lebanon',
        'LS' : 'Lesotho',
        'LR' : 'Liberia',
        'LY' : 'Libyan Arab Jamahiriya',
        'LI' : 'Liechtenstein',
        'LT' : 'Lithuania',
        'LU' : 'Luxembourg',
        'MO' : 'Macao',
        'MK' : 'Macedonia',
        'MG' : 'Madagascar',
        'MW' : 'Malawi',
        'MY' : 'Malaysia',
        'MV' : 'Maldives',
        'ML' : 'Mali',
        'MT' : 'Malta',
        'MH' : 'Marshall Islands',
        'MQ' : 'Martinique',
        'MR' : 'Mauritania',
        'MU' : 'Mauritius',
        'YT' : 'Mayotte',
        'MX' : 'Mexico',
        'FM' : 'Micronesia, Federated States Of',
        'MD' : 'Moldova',
        'MC' : 'Monaco',
        'MN' : 'Mongolia',
        'ME' : 'Montenegro',
        'MS' : 'Montserrat',
        'MA' : 'Morocco',
        'MZ' : 'Mozambique',
        'MM' : 'Myanmar',
        'NA' : 'Namibia',
        'NR' : 'Nauru',
        'NP' : 'Nepal',
        'NL' : 'Netherlands',
        'AN' : 'Netherlands Antilles',
        'NC' : 'New Caledonia',
        'NZ' : 'New Zealand',
        'NI' : 'Nicaragua',
        'NE' : 'Niger',
        'NG' : 'Nigeria',
        'NU' : 'Niue',
        'NF' : 'Norfolk Island',
        'MP' : 'Northern Mariana Islands',
        'NO' : 'Norway',
        'OM' : 'Oman',
        'PK' : 'Pakistan',
        'PW' : 'Palau',
        'PS' : 'Palestinian Territory, Occupied',
        'PA' : 'Panama',
        'PG' : 'Papua New Guinea',
        'PY' : 'Paraguay',
        'PE' : 'Peru',
        'PH' : 'Philippines',
        'PN' : 'Pitcairn',
        'PL' : 'Poland',
        'PT' : 'Portugal',
        'PR' : 'Puerto Rico',
        'QA' : 'Qatar',
        'RE' : 'Reunion',
        'RO' : 'Romania',
        'RU' : 'Russian Federation',
        'RW' : 'Rwanda',
        'BL' : 'Saint Barthelemy',
        'SH' : 'Saint Helena',
        'KN' : 'Saint Kitts And Nevis',
        'LC' : 'Saint Lucia',
        'MF' : 'Saint Martin',
        'PM' : 'Saint Pierre And Miquelon',
        'VC' : 'Saint Vincent And Grenadines',
        'WS' : 'Samoa',
        'SM' : 'San Marino',
        'ST' : 'Sao Tome And Principe',
        'SA' : 'Saudi Arabia',
        'SN' : 'Senegal',
        'RS' : 'Serbia',
        'SC' : 'Seychelles',
        'SL' : 'Sierra Leone',
        'SG' : 'Singapore',
        'SK' : 'Slovakia',
        'SI' : 'Slovenia',
        'SB' : 'Solomon Islands',
        'SO' : 'Somalia',
        'ZA' : 'South Africa',
        'GS' : 'South Georgia And Sandwich Isl.',
        'ES' : 'Spain',
        'LK' : 'Sri Lanka',
        'SD' : 'Sudan',
        'SR' : 'Suriname',
        'SJ' : 'Svalbard And Jan Mayen',
        'SZ' : 'Swaziland',
        'SE' : 'Sweden',
        'CH' : 'Switzerland',
        'SY' : 'Syrian Arab Republic',
        'TW' : 'Taiwan',
        'TJ' : 'Tajikistan',
        'TZ' : 'Tanzania',
        'TH' : 'Thailand',
        'TL' : 'Timor-Leste',
        'TG' : 'Togo',
        'TK' : 'Tokelau',
        'TO' : 'Tonga',
        'TT' : 'Trinidad And Tobago',
        'TN' : 'Tunisia',
        'TR' : 'Turkey',
        'TM' : 'Turkmenistan',
        'TC' : 'Turks And Caicos Islands',
        'TV' : 'Tuvalu',
        'UG' : 'Uganda',
        'UA' : 'Ukraine',
        'AE' : 'United Arab Emirates',
        'GB' : 'United Kingdom',
        'US' : 'United States',
        'UM' : 'United States Outlying Islands',
        'UY' : 'Uruguay',
        'UZ' : 'Uzbekistan',
        'VU' : 'Vanuatu',
        'VE' : 'Venezuela',
        'VN' : 'Viet Nam',
        'VG' : 'Virgin Islands, British',
        'VI' : 'Virgin Islands, U.S.',
        'WF' : 'Wallis And Futuna',
        'EH' : 'Western Sahara',
        'YE' : 'Yemen',
        'ZM' : 'Zambia',
        'ZW' : 'Zimbabwe'
    };

    if (isoCountries.hasOwnProperty(countryCode)) {
        return isoCountries[countryCode];
    } else {
        return countryCode;
    }
}

$(document).ready(function() {

  // var courselecturer = $('.courselecturer');
  // var coursetitle =document.getElementsByClassName("courselecturer");
  // $('.coursetitle').each(function( index ) {
  //   $clamp(index, {clamp: 2});
  // });
  // var p1 = $('.coursetitle').get(0);
  // $clamp(p1, {clamp: 1});

  // PREVENT DROPDOWN PROPOSAL DISMISSED ON CLICK INSIDE CONTAINER
  $(document).on('click', '.view-proposal-dropdown', function (e) {
    e.stopPropagation();
  });
  // END

  // AUTOMATICALLY OPEN TELL US MODAL
  var url = window.location.href;
  var temp = url.search("#tellus-modal");
  if (temp != -1) {
    show_tellus_modal();
  }
  // END

  //FULL SCREEN VIDEO
  function check() {
    if (!window.screenTop && !window.screenY) {
       // NOT FULLSCREEN
       $('.homepagenavbar').removeClass('hide');
       $('.coursedetailbottom').removeClass('hide');
       $('.footer_top').removeClass('hide');
    } else {
         // FULLSCREEN
         $('.homepagenavbar').addClass('hide');
         $('.coursedetailbottom').addClass('hide');
         $('.footer_top').addClass('hide');
    }
  }

  $(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e)
  {
      check();
  });
  // END

  //make progress bar move
  move();

  //make progress bar move
  function move() {
    var totalcourses = parseInt($('#totalcourses').text());
    for (var i = 1; i <= totalcourses; i += 1) {
      (function(i) {
        var width = 1;
        var labelWidth = 8;
        var bar = $('#mycourse-progress-bar-' + i);
        var barValue = bar.attr('aria-valuenow');
        var iteration = ($('.progress').width()/(100/barValue))/barValue;
        var barLabel = $('#mycourse-progress-label-' + i);
        var lessonLabel = $('#mycourse-progress-lesson-label-' + i);
        var id = setInterval(function() {
          if (width >= barValue) {
            clearInterval(id);
          } else {
            width++; 
            labelWidth += iteration;
            barLabel.css("left", labelWidth + 'px');
            lessonLabel.css("left", (labelWidth+8) + 'px');
            bar.css('width', width + '%');
            
          }
        }, 0);
      })(i);
    }
  }

  //ADD HOVER COURSES BEHAVIOUR ON FEED TAB
  $(document).on('mouseover', '#dashboard-popular li', function(){
    $(this).find('.bookmark-icon').removeClass('hide');
  });
  $(document).on('mouseout', '#dashboard-popular li', function(){
    if (!$(this).find('.bookmark-icon').hasClass('bookmarked')) {
      $(this).find('.bookmark-icon').addClass('hide');
    }
  });

  //ADD COURSES TO WISHLIST ON FEED TAB
  $(document).on('click', '#dashboard-popular li .bookmark-icon', function (){
    if ($(this).hasClass('bookmarked')) {
      var user_id = $("#see-more-wishlist").attr("data-user_id");
      var course_id = $(this).attr("data-course_id");
      var _token = $('input[name=_token]').val();
      var insertwishlist = $.ajax(
                              {
                                url: base_url + '/removewishlist',
                                type:'POST',
                                dataType : "json",
                                data: {course_id:course_id, user_id:user_id, _token:_token},
                                success:function(data)
                                {
                                  // alert("Course has been removed from wishlist");
                                  location.reload();
                                },
                                error:function(xhr,status,error)
                                {
                                    alert("Error removing wishlisted course. Please try again later.");
                                    // var err = eval("(" + xhr.responseText + ")");
                                    // alert(err.Message);
                                }
                              });
      $(this).attr("src",'img/add-icon-min.png');
      $(this).removeClass('bookmarked');
    } else {
      var user_id = $("#see-more-wishlist").attr("data-user_id");
      var course_id = $(this).attr("data-course_id");
      var _token = $('input[name=_token]').val();
      var insertwishlist = $.ajax(
                              {
                                url: base_url + '/addwishlist',
                                type:'POST',
                                dataType : "json",
                                data: {course_id:course_id, user_id:user_id, _token:_token},
                                success:function(data)
                                {
                                  // alert("Course has been added to wishlist");
                                  location.reload();
                                },
                                error:function(xhr,status,error)
                                {
                                    alert("Error adding wishlisted course. Please try again later.");
                                    // var err = eval("(" + xhr.responseText + ")");
                                    // alert(err.Message);
                                }
                              });
      $(this).attr("src",'img/bookmark-min.png');
      $(this).removeClass('hide');
      $(this).addClass('bookmarked');
    }
    return false;
  });

  //ADD COURSES TO WISHLIST ON COURSE TAB
  $(document).on('click', '.add-wishlist', function (){
    if ($(this).hasClass('bookmarked')) {
      var user_id = session_id;
      var course_id = $(this).attr("data-course_id");
      var _token = $('input[name=_token]').val();
      var insertwishlist = $.ajax(
                              {
                                url: base_url + '/removewishlist',
                                type:'POST',
                                dataType : "json",
                                data: {course_id:course_id, user_id:user_id, _token:_token},
                                success:function(data)
                                {
                                  // alert("Course has been removed from wishlist");
                                  $('.add-wishlist').text('add to wishlist');
                                  $('.add-wishlist').css('background-color','#1d619a');
                                  $('.add-wishlist').removeClass('bookmarked');
                                },
                                error:function(xhr,status,error)
                                {
                                    alert("Error removing wishlisted course. Please try again later.");
                                    // var err = eval("(" + xhr.responseText + ")");
                                    // alert(err.Message);
                                }
                              });
    } else {
      var user_id = session_id;
      var course_id = $(this).attr("data-course_id");
      var _token = $('input[name=_token]').val();
      var insertwishlist = $.ajax(
                              {
                                url: base_url + '/addwishlist',
                                type:'POST',
                                dataType : "json",
                                data: {course_id:course_id, user_id:user_id, _token:_token},
                                success:function(data)
                                {
                                  // alert("Course has been added to wishlist");
                                  // location.reload();
                                  $('.add-wishlist').text('remove from wishlist');
                                  $('.add-wishlist').css('background-color','#525252');
                                  $('.add-wishlist').addClass('bookmarked');
                                },
                                error:function(xhr,status,error)
                                {
                                    alert("Error adding wishlisted course. Please try again later.");
                                    // var err = eval("(" + xhr.responseText + ")");
                                    // alert(err.Message);
                                }
                              });
    }
    return false;
  });

  //DASHBOARD SUBHEADER CLICK
  $('.dashboard-tabs a').click(function(){
    $(this).parent().siblings().removeClass('dashboard-active');
    $(this).parent().addClass('dashboard-active');
  });
  //Toggle video bar in homepage
  $('.toggle_video_button a').click(function(){
      check = $('.toggle_video_button').attr('aria-expanded');
      if (check == 'false') {
        $('.toggle_video_button').attr('aria-expanded',true);
        height = $('#videocontent').height();
        height = 469;
        total_height = height + 79;
        $('#seehowitworkslabel').text('CLOSE VIDEO');
        $('#seehowitworkslabel').css('margin-left','109px');
        $('#videocontent').animate({height: height+'px'},180); 
        setTimeout(function(){
          $('#videocontent h2').css('display','block'); 
          $('#videocontent div').css('display','block'); 
        },130);
        $('body').css('overflow','hidden');
        $('.toggle_video_button').animate({top: total_height+'px'},180);
      } else {
        $('.toggle_video_button').attr('aria-expanded',false);
        total_height =  80;
        $('#videocontent').animate({height: '0px'},180);
        $('#videocontent h2').css('display','none'); 
        $('#videocontent div').css('display','none'); 
        $('.toggle_video_button').animate({top: total_height+'px'},180);
        $('body').css('overflow','visible');
        $('#seehowitworkslabel').text('SEE HOW IT WORKS');
        $('#seehowitworkslabel').css('margin-left','85px');
      }
    });
  //BILLING CHECKBOX CLICKED
  var invoicenumber;
  var arrinvoice =[];
  $('.billing-check').click(function(){
    var tempPrice = $(this).parent().parent().siblings('.recommended-price-tag').find('.billing-price').text();
    var currentPrice = parseInt(tempPrice.replace(/,/g,""));
    var currentTotal = parseInt(($('#billing-price-total').text()).replace(/,/g,""));

      invoicenumber = $(this).parent().parent().siblings('.invoice-number').text();
    if($(this).is(":checked")) {

      arrinvoice.push(invoicenumber);
      $('#submit-billing').prop('disabled',false);
      var updatedTotal = currentTotal + currentPrice;

    } else {
      
      arrinvoice.splice( $.inArray(invoicenumber,arrinvoice) ,1 );
      $('#submit-billing').prop('disabled',true);
      var updatedTotal = currentTotal - currentPrice;
    
    }
    //create number format for money
    updatedTotal = updatedTotal.toFixed(0).replace(/./g, function(c, i, a) {
      return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
    $('#billing-price-total').text(updatedTotal);
  });
  //BILLING DOWNLOAD INVOICE CLICKED
    $('#submit-billing').click(function(){
      $('input[name="invoicebutton"]').val(arrinvoice);
    });


  //PAYMENT HISTORY CHANGE MONTH OR YEAR
  $('#payment-history select').change(function(){
    var user_id = $('#user_id').text();
    var year = $('#payment-history select[name="ph_year"]').val();
    var month_from = $('#payment-history select[name="ph_month_from"]').val();
    var date_from = $('#payment-history select[name="ph_date_from"]').val();
    var month_to = $('#payment-history select[name="ph_month_to"]').val();
    var date_to = $('#payment-history select[name="ph_date_to"]').val();

    var from = year + '-' + month_from + '-' + date_from;
    var to = year + '-' + month_to + '-' + date_to;

    var table_content = $('#paymenthistory-table-content');

    var added = $.ajax(
                    {
                        url: base_url + '/dashboard/getpaymenthistory/' + user_id + "/" + from + "/" + to,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          var elem = "";
                          if (data.length != 0) {
                            jQuery.each(data, function(index, item) {
                                elem += "<tr>";

                                var t = item.time_added.split(/[- :]/);
                                var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
                                var temp_date = d.getDate();
                                var temp_month = d.getMonth()+1;
                                var temp_year = d.getFullYear();
                                elem += "<td>"+ temp_month + '/' + temp_date + '/' + temp_year +"</td>";

                                if (item.payout_status == 1) {
                                  elem += "<td>"+ "Paid" +"</td>";
                                } else {
                                  elem += "<td>"+ "New" +"</td>";
                                }

                                elem += "<td>"+ item.title +" course</td>";
                                elem += '<td class="recommended-price-tag">$<span class="billing-price">'+ formatCurrency('',parseInt(item.total_amount)) +"</td>";
                                elem += "</tr>";
                            });
                          } else {
                            elem += '<tr><td colspan = 6 class="no-border" align="center"><b>No Payment History</b></td></tr>';
                          }
                          table_content.html('');
                          var rows = $(elem);
                          rows.hide();
                          table_content.append(rows);
                          rows.fadeIn("500");
                        },
                        error:function(data)
                        {
                            alert("Error fetching courses. Please try again later.");
                        }
                    });
  });

  //BROWSE OTHER REQUEST FILTER
  $('#browseotherrequest select').change(function(){
    var user_id = $('#user_id').text();
    var area = $('#browseotherrequest select[name="bor_area"]').val();
    var country = $('#browseotherrequest select[name="bor_country"]').val();
    var content = $('#other-request-content');

    if (country == null || country == '') {
      country = -1;
    }

    if (area == null || area == '') {
      area = -1;
    }

    var added = $.ajax(
                    {
                        url: base_url + '/dashboard/getotherrequest/' + user_id + '/' + 0 + '/' + 9 + '/' + area + '/' + country,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          var elem = "";
                          if (data.length != 0) {
                            jQuery.each(data, function(index, item) {
                                elem += '<div class="col-md-12 completed-table top bottom left-border right-border">';
                                elem += '<div class="completed-content col-md-12 no-padding">';
                                elem += '<div class="text-part col-md-12 no-padding bottom" style="padding-bottom: 10px">';                            

                                var desc = item.description;
                                var organization = item.organization;
                                if (organization == null) {
                                  organization = '';
                                }
                                var add_info = item.additional_info;
                                if (add_info == null) {
                                  add_info = ''
                                }

                                var country = getCountryName(item.country);
                                var budget = formatCurrency ('',parseInt(item.budget));
                                var cat = item.category_names.split(',');
                                var participants = item.participants;
                                var pdf = '';
                                if (item.pdf == null) {
                                  pdf = '';
                                } else {
                                  pdf = item.pdf;
                                }
                                var start_date = '';
                                if (item.start_date != null) {
                                  var t = item.start_date.split(/[- :]/);
                                  var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
                                  var temp_date = d.getDate();
                                  var temp_month = getMonthName(d.getMonth());
                                  var temp_year = d.getFullYear();
                                  var start_date = temp_date + '-' + temp_month + '-' + temp_year;
                                }
                                var end_date = '';
                                if (item.end_date != null) {
                                  var t = item.end_date.split(/[- :]/);
                                  var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
                                  var temp_date = d.getDate();
                                  var temp_month = getMonthName(d.getMonth());
                                  var temp_year = d.getFullYear();
                                  var end_date = temp_date + '-' + temp_month + '-' + temp_year;
                                }

                                elem += '<div class="subtitle" style="padding-bottom: 0px;">'+ desc + '</div>';
                                elem += '<div class="subtitle util-font-size-11 util-font-weight-normal">'+ organization +'</div>';
                                elem += '<div class="description col-md-8 no-padding">'+ add_info;
                                elem +=  '</div><div class="col-md-2"></div>';
                                elem += '<div class="col-md-2 no-padding" style="padding-left: 15px">';
                                elem += '<button type="button" class="read-more-other btn btn-blue view-proposal-btn" data-title = "'+ desc +'" data-add_info = "'+ add_info +'" data-participants = "'+ participants +'" data-start_date = "'+ start_date +'" data-end_date = "'+ end_date +'" data-cc = "'+ item.ccid +'" data-budget = "'+ budget +'" data-location = "'+ country +'" data-organization = "'+ organization +'" data-pdf = "' + pdf +'">Read More</button>';
                                elem += '</div></div>';
                                elem += '<div class="icon-part col-md-12 no-padding" style="padding-top: 15px; text-align: left">';
                                elem += '<div class="col-md-2">';
                                elem += '<img src="'+base_url+'/img/spot-icon-min.png" style="width: 20%">';
                                elem += '<span>'+ country +'</span>';
                                elem += '</div>';
                                elem += '<div class="col-md-2">';
                                elem += '<img src="'+base_url+'/img/money-bag-min.png">';
                                elem += '<span>S$'+ budget + '</span>';
                                elem += '</div>';
                                elem += '<div class="col-md-4" style="padding-right: 0px;">';
                                elem += '<img src="'+base_url+'/img/book-icon-min.png" style="width: 7%">';
                                elem += '<span>'+ cat[0] +'</span>';
                                elem += '<br>';
                                if (cat.length > 1) {
                                  elem += '<span style="font-size: 0.8em; margin-left: 30%">and'+ (cat.length - 1) +'more</span>';
                                }
                                elem += '</div></div></div></div>';
                            });
                          } else {
                            elem += '<div id="no-other-request"><div class="col-md-12 billing-table top bottom left-border right-border">OTHER REQUEST COURSES NOT FOUND</div></div>';
                          }
                          content.html('');
                          var rows = $(elem);
                          rows.hide();
                          content.append(rows);
                          rows.fadeIn("500");
                        },
                        error:function(data)
                        {
                            alert("Error fetching courses. Please try again later.");
                        }
                    });
  });
  //Browse Course Country Filter
  $('#country_sort select').change(function(){
      var category = $('.coursescategorydiv.active .cat_id').text();
      var section_id = $('.coursescategorydiv.active .sec_id').text();
      var area = $('#country_sort select[name="sort_courses_by_country"]').val();
      var section = $('#section_'+section_id);
      var added_country = $.ajax(
                    {
                        url: base_url + '/sort_by_country/' + area + '/' + category,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                            section.html('');
                            if (data.length != 0) {
                              elem = "<ul class = 'price_nav'>";
                              jQuery.each(data, function(index, item) {
                                elem += "<li>";
                                elem += "<a href= '"+base_url+"/coursedetail/"+item.coursecode+"'>";
                                elem += '<div style="height: 165px; display: flex; justify-content: center; overflow: hidden;" class="browsecoursesmalldiv">';
                                elem += '<img src="'+s3_url + item.image+'" alt="img">';
                                elem += '</div>';
                                elem += '<h3 class="coursetitle line-clamp line-clamp-2">'+item.title+'</h3>';
                                elem += '<h2 class="courselecturer line-clamp line-clamp-1">'+item.courselecturer+'</h2>';
                                if (item.price == 0) {
                                  price = 'FREE';
                                } else {
                                  price = formatCurrency(item.symbol,parseInt(item.price));
                                }
                                elem += '<h2 class="courseprice">'+price+'</h2>';
                                elem += '</a>';
                                elem += "</li>";
                              });
                              elem += "</ul>";

                              section.append(elem);
                            }
                        },
                        error:function(data)
                        {
                            alert("Error fetching courses. Please try again later.");
                        }
                    });

  });
  // WHEN PILLS CLICKED WILL AUTOMATICALLY RESET THE FILTER SELECTION
  $('a[data-toggle = "pill"]').click(function(){
    // $('#country_sort select').val('');
  });

 // REMOVE FROM THE LIST BUTTON MY PROPOSALS
 $(document).on('click', '.remove-proposal, .cancel-proposal', function(){
    var user_id = $('#user_id').text();
    var cpid = $(this).parent().parent().find('.cpid').text();
    var crid = $(this).parent().parent().find('.crid').text();
    var content = $(this).parent().parent().parent().parent();

    var added = $.ajax(
                    {
                        url: base_url + '/dashboard/removerejectedproposal/' + user_id + "/" + cpid + "/" + crid,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          if (data.info == 'success') {
                            content.hide('500', function(){content.remove();});
                          } else {
                            alert(data.message);
                          }
                        },
                        error:function(data)
                        {
                            alert("Error removing proposal. Please try again later.");
                        }
                    });
 });

  function formatCurrency(symbol, amount) {
    var aDigits = amount.toFixed(2).split(".");
    aDigits[0] = aDigits[0].split("").reverse().join("")
      .replace(/(\d{3})(?=\d)/g,"$1,").split("").reverse().join("");
    return symbol + aDigits.join(".");
  }

  function getMonthName (month) {
    var monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];
    return monthNames[month];
  }

  //DASHBOARD INDEX SEE-MORE CLICKED
  $('#see-more-feed, .see-more-feed').click(function(e){
    e.preventDefault();
    var offset = $(this).attr("data-offset");
    var user_id = $(this).attr("data-user_id");
    var type = parseInt($(this).attr('data-type'));
    var url = window.location.href;
    var postcourseflag = 0;
    var temp = url.search("/postcourse");
    if (temp != -1) {
      postcourseflag = 1;
    }
    var selector = $('#dashboard-popular .pricearea');
    if (type == 1) {
      var selector = $('#online #dashboard-popular .pricearea');
    } else if (type == 0) {
      var selector = $('#offline #dashboard-popular .pricearea');
    }
    
    if (postcourseflag == 1) {
      // SEE-MORE IN POST COURSE
      var added = $.ajax(
                      {
                          url: base_url + '/seemoreowned/' + offset + "/" + 9 + "/" + postcourseflag + '/' + type ,
                          type:'GET',
                          dataType : "json",
                          data: {},
                          beforeSend: function (){
                            //show loading
                            height = selector.height();
                            $("#loadingDiv, .loadingDiv").css("margin-top",height+30);
                            $("#loadingDiv, .loadingDiv").css("display","block");
                          },
                          complete: function () {
                            //time out before loading dissapear
                            setTimeout(function(){
                              height = selector.height();
                              $("#loadingDiv, .loadingDiv").css("display","none");
                              $("#loadingDiv, .loadingDiv").css("margin-top",height+30);
                            },1000);
                          },
                          success:function(data)
                          {
                            var elem = "";
                            if (data.length != 0) {
                              jQuery.each(data, function(index, item) {
                                  var img = "";
                                  var str = item.wishlist_user_id;
                                  if (postcourseflag == -1) {
                                    if (str != null) {
                                      var arr = str.split(","); //split the "," from wishlist user
                                      var check = $.inArray(user_id, arr); //check if current user wishlisted course
                                      if (check != -1) {
                                        img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon bookmarked' src = 'img/bookmark-min.png' data-course_id = "+ item.course_id +">";
                                      } else {
                                        img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon hide' src = 'img/add-icon-min.png' data-course_id = "+ item.course_id +">";
                                      }
                                    } else {
                                      img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon hide' src = 'img/add-icon-min.png' data-course_id = "+ item.course_id +">";
                                    }
                                  } else {
                                    img = "<img src = " + s3_url + item.image + " alt = 'img'>";
                                  }
                                  if (item.price > 0) {
                                    item.price = formatCurrency(item.currencysymbol,parseInt(item.price));
                                  } else {
                                    item.price = 'FREE';
                                  }
                                  elem = elem + 
                                        "<li class = 'homepagelist'><a href = " + base_url + "/coursedetail/" + item.coursecode + ">" +
                                        img +
                                        "<h4 class = 'coursetitle line-clamp line-clamp-2'>" + item.title + "</h4>" +
                                        "<h3 class = 'courselecturer line-clamp line-clamp-1'>" + item.courselecturer + "</h3>" +
                                        "<h3 class = 'courseprice'>" + item.price + "</h3>" +
                                        "</a></li>";
                              });
                              setTimeout(function(){
                                // $('#dashboard-popular .pricearea ul').append(elem);
                                selector.find('ul').append(elem);
                              },1000);
                              if (type == 1) {
                                var selector = $('#online');
                              } else if (type == 0) {
                                var selector = $('#offline');
                              }
                              selector.find('.see-more-feed').attr("data-offset",(parseInt(offset) + 1));
                            }
                          },
                          error:function(data)
                          {
                              alert("Error fetching courses. Please try again later.");
                          }
                      });
    } else {
      // SEE-MORE IN DASHBOARD INDEX
      var added = $.ajax(
                      {
                          url: base_url + '/seemore/' + offset + "/" + 9 + "/" + postcourseflag + '/' + type ,
                          type:'GET',
                          dataType : "json",
                          data: {},
                          beforeSend: function (){
                            //show loading
                            height = selector.height();
                            $("#loadingDiv, .loadingDiv").css("margin-top",height+30);
                            $("#loadingDiv, .loadingDiv").css("display","block");
                          },
                          complete: function () {
                            //time out before loading dissapear
                            setTimeout(function(){
                              height = selector.height();
                              $("#loadingDiv, .loadingDiv").css("display","none");
                              $("#loadingDiv, .loadingDiv").css("margin-top",height+30);
                            },1000);
                          },
                          success:function(data)
                          {
                            var elem = "";
                            if (data.length != 0) {
                              jQuery.each(data, function(index, item) {
                                  var img = "";
                                  var str = item.wishlist_user_id;
                                  if (postcourseflag == -1) {
                                    if (str != null) {
                                      var arr = str.split(","); //split the "," from wishlist user
                                      var check = $.inArray(user_id, arr); //check if current user wishlisted course
                                      if (check != -1) {
                                        img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon bookmarked' src = 'img/bookmark-min.png' data-course_id = "+ item.course_id +">";
                                      } else {
                                        img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon hide' src = 'img/add-icon-min.png' data-course_id = "+ item.course_id +">";
                                      }
                                    } else {
                                      img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon hide' src = 'img/add-icon-min.png' data-course_id = "+ item.course_id +">";
                                    }
                                  } else {
                                    img = "<img src = " + s3_url + item.image + " alt = 'img'>";
                                  }
                                  if (item.price > 0) {
                                    item.price = formatCurrency(item.currencysymbol,parseInt(item.price));
                                  } else {
                                    item.price = 'FREE';
                                  }
                                  elem = elem + 
                                        "<li class = 'homepagelist'><a href = " + base_url + "/coursedetail/" + item.coursecode + ">" +
                                        img +
                                        "<h4 class = 'coursetitle line-clamp line-clamp-2'>" + item.title + "</h4>" +
                                        "<h3 class = 'courselecturer line-clamp line-clamp-1'>" + item.courselecturer + "</h3>" +
                                        "<h3 class = 'courseprice'>" + item.price + "</h3>" +
                                        "</a></li>";
                              });
                              setTimeout(function(){
                                // $('#dashboard-popular .pricearea ul').append(elem);
                                selector.find('ul').append(elem);
                              },1000);
                              $("#see-more-feed").attr("data-offset",(parseInt(offset) + 1));
                            }
                          },
                          error:function(data)
                          {
                              alert("Error fetching courses. Please try again later.");
                          }
                      });
    }
  });

  $('#see-more-wishlist').click(function(e){
    e.preventDefault();
    var offset = $('#see-more-wishlist').attr("data-offset");
    var user_id = $("#see-more-wishlist").attr("data-user_id");
    var added = $.ajax(
                    {
                        url: base_url + '/seemorewishlist/' + offset + "/" + user_id,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        beforeSend: function (){
                          //show loading
                          height = $('#dashboard-wishlist .pricearea').height();
                          $("#loadingDivWishlist").css("margin-top",height+30);
                          $("#loadingDivWishlist").css("display","block");
                        },
                        complete: function () {
                          //time out before loading dissapear
                          setTimeout(function(){
                            height = $('#dashboard-wishlist .pricearea').height();
                            $("#loadingDivWishlist").css("display","none");
                            $("#loadingDivWishlist").css("margin-top",height+30);
                          },1000);
                        },
                        success:function(data)
                        {
                          var elem = "";
                          if (data.length != 0) {
                            jQuery.each(data, function(index, item) {
                                var img = "<img src = " + s3_url + item.image + " alt = 'img'>" + "<img class = 'bookmark-icon bookmarked' src = 'img/bookmark-min.png' data-course_id = "+ item.course_id +">";
                                if (item.price > 0) {
                                    item.price = formatCurrency(item.currencysymbol,parseInt(item.price));
                                } else {
                                  item.price = 'FREE';
                                }
                                elem = elem + 
                                      "<li class = 'homepagelist'><a href = " + base_url + "/coursedetail/" + item.coursecode + ">" +
                                      img +
                                      "<h4 class = 'coursetitle line-clamp line-clamp-2'>" + item.title + "</h4>" +
                                      "<h3 class = 'courselecturer line-clamp line-clamp-1'>" + item.courselecturer + "</h3>" +
                                      "<h3 class = 'courseprice'>" + item.price + "</h3>" +
                                      "</a></li>";
                            });
                            setTimeout(function(){
                              $('#dashboard-wishlist .pricearea ul').append(elem);
                            },1000);
                            $("#see-more-wishlist").attr("data-offset",(parseInt(offset) + 1));
                          }
                        },
                        error:function(data)
                        {
                            alert("Error fetching wishlisted courses. Please try again later.");
                        }
                    });
  });
  //END OF DASHBOARD INDEX SEE-MORE CLICKED

  $("[data-toggle='asdf']").click(function() {
    var selector = $(this).data("target");
    $(selector).toggleClass('in');
  });

  // EMPLOYEE INVITE
  

  //SETTINGS PAGE CANCEL BUTTON
  $("#personal-info :input").change(function(){
    $("#cancel-settings").prop('disabled', false);
  });
  $("#personal-info :input").keypress(function(){
    $("#cancel-settings").prop('disabled', false);
  });
  $("#cancel-settings").click(function(){
    location.reload();
  });

  //SETTINGS PAGE DELETE BUTTON
  $("#delete-settings").click(function(){
    var conf = window.confirm("Are you sure want to delete your LAD Global account?");
    if (conf) {
      var added = $.ajax(
                    {
                        url: base_url + '/dashboard/settings/deleteaccount',
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          location.replace(base_url + "/logout");
                        },
                        error:function(data)
                        {
                            alert("Error delete account. Please try again later.");
                        }
                    });
    }
  });
  //Browse Course Filter
  $('#sortingemployee').change(function(){
    value = $(this).val();
    location.replace(base_url + '/dashboard/employeelist/' + value);
  });

  //SORTING EMPLOYEE
  $('#sortingemployee').change(function(){
    value = $(this).val();
    location.replace(base_url + '/dashboard/employeelist/' + value);
  });

  //BROWSE NO PROPOSAL
  $('#no-proposal-browse').click(function(){
    $('.dashboard-tabs a[href="#browseotherrequest"]').click();
  });

  // SET DATATABLES
  $('.administrator-table table').DataTable({
    ordering: false,
    searching: true
  });
  // END

  // ENROLLMENT NEXT BUTTON
  $(document).on('click','.enroll-button .next', function(){
    var type = $('#type').text();

    // setting container
    var container = '';
    var missingstep = [];
    var location = $('#enroll-location').text();
    var sfc = $('#enroll-sfc').text();
    var price = parseFloat($('#enroll-price').text());
    if (type == 1) {
      container = $('#sgcorporate_content');
      if ($('select[name="enroll_employee"]').val() != 'other') {
        missingstep.push(2);
      }
      if (location != 'SG' || sfc == '0' || price <= 0) {
        missingstep.push(3);
        $('select[name="enroll_futurecredit"]').val('0');
      }
      if ($('select[name="enroll_futurecredit"]').val() == '1' || price <= 0) {
        missingstep.push(4);
        container.find('select[name="enroll_paymentmethod"]').val('wired');
      } else {
        missingstep = jQuery.grep(missingstep, function(value) {
          return value != 4;
        });
      }
    } else if (type == 0 || type == 2){
      container = $('#normalindividual_content');
      if (price <= 0) {
        missingstep.push(1);
      }
      if (container.find('select[name="enroll_futurecredit"]').val() == '1' || price <= 0) {
        missingstep.push(2);
      } else {
        missingstep = jQuery.grep(missingstep, function(value) {
          return value != 2;
        });
      }
    }

    var totalstep = parseInt(container.attr('data-total_step'));
    var currentstep = parseInt(container.find('.current').attr('data-step'));
    flag = true;

    if (type == 1 && currentstep == 2){
      fullname = container.find('input[name="enroll_fullname"]').val();
      email = container.find('input[name="enroll_email"]').val();
      country = container.find('select[name="enroll_country"]').val();
      industry = container.find('select[name="enroll_industry"]').val();
      interest = container.find('select[name="enroll_interest"]').val();
      occupation =container.find('select[name="enroll_occupation"]').val();
      var added = $.ajax(
                    {
                        url: base_url + '/dashboard/getuser/' + email,
                        type:'GET',
                        dataType : "json",
                        data: {},
                        success:function(data)
                        {
                          if(data.length > 0) {
                            flag = false;
                            alert("Email already registered. Please use another email.");
                          }
                        },
                        error:function(data)
                        {
                            alert("Error. Please try again later.");
                        }
                    });
      if (fullname == '' || email == '' || (country == '' || country == null) || (industry == '' || industry == null) || (interest == '' || interest == null) || (occupation == '' || occupation == null)) {
        flag = flag && false;
        alert("Fields can't be left empty.");
      }
    }

    currentstep++;
    if (jQuery.inArray((currentstep),missingstep) != -1) {

      while(jQuery.inArray(currentstep,missingstep) != -1) {
        currentstep++;
      }

    }
    if (currentstep < totalstep) {
      if (flag){
        container.find('.current').hide();
        container.find('.current').removeClass('current');
        
        container.find('.enroll-form-container[data-step='+currentstep+']').show();
        container.find('.enroll-form-container[data-step='+currentstep+']').addClass('current');
      }
    } else {
      if (location != '') {
        if (flag) {
          var status = submitEnrollment(container);
        }
      } else {
        show_signin_modal();
      }
    }
  });
  // ENROLLMENT OKAY BUTTON
  $(document).on('click','#okay-enroll', function(){
    code = $('input[name="code"]').val();
    location.replace(base_url + "/coursedetail/" + code);
  });
  // ENROLLMENT SUBMIT
  function submitEnrollment(container){
    var type = $('#type').text();
    var formData = '';
    var flagEmail = true;
    if (type == 1) {
      // CORPORATE ENROLLMENT
      formData = new FormData($('#corporate_form')[0]);
    } else if (type == 0 || type == 2){
      // INDIVIDUAL ENROLLMENT
      var email = $('#email').text();
      if (email == '') {
        // if email empty
        flagEmail = false;
      }
      formData = new FormData($('#individual_form')[0]);
    }

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
                    // cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        // $('#page-loading-ajax').removeClass('hide');
                    },
                    success:function(data)
                    {
                        if (data.info == "success") 
                        {   // Request successful 
                            // location.reload();
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
                            // $('#individual_form').trigger('reset');
                            // $('#page-loading-ajax').addClass('hide');
                            alert(data.message);
                        }
                    },
                    error:function(data)
                    {
                        // $('#page-loading-ajax').addClass('hide');
                        // $('#individual_form').trigger('reset');
                        alert("Failed to enroll. Please try again later.");
                    }
                });
    } else {
      show_inputemail_modal();
    }
    // return false;
  }
  $('#input-email-form').submit(function(){
    event.preventDefault();
    email = $(this).find('input[name="addemail"]').val();
    formData = new FormData($('#input-email-form')[0]);
    // Append token
    var _token = $('meta[name="csrf-token"]').attr('content');
    formData.append('_token', _token);
    var request = $.ajax(
                {
                    url: base_url + '/add_email',
                    type:'POST', //data type
                    dataType : "json",
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        // $('#page-loading-ajax').removeClass('hide');
                    },
                    success:function(data)
                    {
                        if (data.info == "success") 
                        {   // Request successful 
                            // location.reload();
                            $('#email').text(email);
                            $("#input-email-modal").fadeOut(300);
                            setTimeout(
                                        function() 
                                        {
                                            checkScrollBars(false);
                                            $('body').css('overflow','auto');
                                        }, 300); 
                            container = $('#normalindividual_content');
                            submitEnrollment(container);
                        }
                        else
                        {   // Request error
                            // $('#individual_form').trigger('reset');
                            // $('#page-loading-ajax').addClass('hide');
                            alert(data.message);
                        }
                    },
                    error:function(data)
                    {
                        // $('#page-loading-ajax').addClass('hide');
                        // $('#individual_form').trigger('reset');
                        alert("Failed to insert email. Please try again later.");
                    }
                });
  });

  // PRINT PDF FROM TRANSACTION MANAGER
  // $(document).on('click', '.printinvoice', function(){
  //   invoice = $(this).text();
  //   var _token = $('meta[name="csrf-token"]').attr('content');
  //   var request = $.ajax(
  //               {
  //                   url: base_url + '/pdf',
  //                   type:'POST', //data type
  //                   headers: {
  //                       'X-CSRF-TOKEN': _token
  //                   },
  //                   data: {invoicebutton: invoice},
  //                   // cache: false,
  //                   processData: false,
  //                   contentType: false,
  //                   beforeSend: function(){
  //                       // $('#page-loading-ajax').removeClass('hide');
  //                   },
  //                   success:function(data)
  //                   {
  //                       // if (data.info == "success") 
  //                       // {   // Request successful 
  //                       //     // location.reload();
  //                       //     var totalstep = parseInt(container.attr('data-total_step'));
  //                       //     container.find('.current').hide();
  //                       //     container.find('.current').removeClass('current');
  //                       //     container.find('.enroll-form-container[data-step='+totalstep+']').show();
  //                       //     container.find('.enroll-form-container[data-step='+totalstep+']').addClass('current');
  //                       //     $('.enroll-button .next').text('Okay');
  //                       //     $('.enroll-button .next').attr('id','okay-enroll');
  //                       //     if (type == 1) {
  //                       //       $('#enroll-again').removeClass('hide');
  //                       //     }
  //                       //     $('.enroll-button .next').removeClass('next');
  //                       // }
  //                       // else
  //                       // {   // Request error
  //                       //     // $('#individual_form').trigger('reset');
  //                       //     // $('#page-loading-ajax').addClass('hide');
  //                       //     alert(data.message);
  //                       // }
  //                   },
  //                   error:function(data)
  //                   {
  //                       // $('#page-loading-ajax').addClass('hide');
  //                       // $('#individual_form').trigger('reset');
  //                       alert("Failed to enroll. Please try again later.");
  //                   }
  //               });
  // });

  // Custom responsive JS: used in #index_request_title of index page
  // https://stackoverflow.com/questions/5358183/is-it-possible-to-dynamically-scale-text-size-based-on-browser-width
  var $body = $('body'); //Cache this for performance
  var setBodyScale = function() {
      var scaleSource = $body.width(), // 1903 -> 35 px
          scaleFactor = 0.018,                     
          maxScale = 35,
          minScale = 12; //Tweak these values to taste

      var fontSize = scaleSource * scaleFactor; //Multiply the width of the body by the scaling factor:

      if (fontSize > maxScale) fontSize = maxScale;
      if (fontSize < minScale) fontSize = minScale; //Enforce the minimum and maximums

      $('#index_request_title').css('font-size', fontSize + 'px');
  }
  $(window).resize(function(){
      // setBodyScale();
  });
  //Fire it when the page first loads:
  // setBodyScale();

  // Scroll to anchored div with animation and offset
  $('#index_sub_2').click(function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('#trustedby').offset().top-100
    }, 500);
  });
  // Search Course sortby onchange
  $('#searchcoursesortby').change(function(e){
    var currenturl = window.location.href;
    var selectedsort = $(this).val();

    var url_split = currenturl.split("?");

    var new_url = url_split[0]+"?";

    var params_split = url_split[1].split("&");
    params_split.forEach(function(uri_params) {
      if (uri_params.indexOf("sort") !== -1) 
      { // sort found
        new_url += "sort="+selectedsort;
      }
      else if (uri_params.indexOf("page") !== -1) 
      { // page found
        // Reset to page 1
        // new_url += "sort="+selectedsort;
      }
      else
      { // sort not found
        new_url += "&"+uri_params;
      }
    });

    window.location = new_url;
  });

  // Header chat div
  $('.chattopics:not(.friendrequest)').click(function(e) {
    // alert($(this).attr('data-user'));
    $("#chatroomdiv").css("display","block");

    $("#chatroomdiv").animate({"left":"0px"}, 500);
  });
  // Header chat div > back button pressed
  $('#chatback').click(function(e) {
    $("#chatroomdiv").animate({"left":"+=500px"}, 500);
    setTimeout(function(){
      $("#chatroomdiv").css("display","none");
    }, 400); 
  });
}); 

// handle navbar search course
function searchcourse(e){
  e.preventDefault(); // Otherwise the form will be submitted

  // alert("FORM WAS SUBMITTED - navbar");
}

// handle 404 search field
function search_404(e){
  e.preventDefault(); // Otherwise the form will be submitted

  // alert("FORM WAS SUBMITTED - 404");
}

// When user click outside navbarheader, close the dropdown
$(document).on('click', function(event) {
  if(!$(event.target).closest('#headernotifcontentul').length) {
    if($('#headernotifcontentul').is(":visible")) {
      $('#headernotifcontentul').hide();
    }
  }  
});



