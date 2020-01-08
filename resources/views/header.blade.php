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
    {{-- <meta name="google-signin-client_id" content="798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com"> --}}
    <meta name="google-signin-client_id" content="306208290680-9gvmgv8hfrl2lhl5kfhimphd9u1l9ftf.apps.googleusercontent.com">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title)?$title:'Home - KATARTIZO Mission Academy' }}</title>

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
    <link href="{{ URL::asset('css/hover.css') }}" rel="stylesheet">        
    <!-- hover css file -->
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Girassol&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/KATARTIZO LOGO-01.png') }}" type="image/x-icon">  
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96009968-1"></script>
    <script src="https://kit.fontawesome.com/c0b43bff53.js" crossorigin="anonymous"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

     gtag('config', 'UA-96009968-1');
    </script>
    <!-- <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script> -->
    <script type="text/javascript">
      var base_url = "{{ URL::to('/') }}";
      var s3_url = "{{ env('S3_URL')}}";
      var session_id = "<?php echo Session::get('LAD_user_id')?>";
      var course_credits = "<?php echo Session::get('LAD_course_credits')?>";
      var proposal_credits = "<?php echo Session::get('LAD_proposal_credits')?>";
    </script>
    
    <!-- <script src="{{ URL::to('/') }}/js/tinymce.min.js"></script> -->
    <!-- <script>tinymce.init({ selector:'textarea' });</script> -->
  </head>
<body>
  <!-- =========================
    //////////////This Theme Design and Developed //////////////////////
    //////////// by www.wpfreeware.com======================--> 

  <!-- FB Login Suspended -->
  <?php if (Session::has('fb_login_suspended')): ?>
    <script type="text/javascript">
      alert("{!! session('fb_login_suspended') !!}");
    </script>
    <?php endif ?>
  <!-- End of FB Login Suspended -->

  <!-- Reset password -->
  <?php if (Session::has('reset_password_ok')): ?>
    <script type="text/javascript">
      alert("{!! session('reset_password_ok') !!}");
    </script>
  <?php endif ?>
  <!-- End of Reset password -->

  <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
 
  <!-- End Preloader -->  

  <div class = 'hide' id = 'page-loading-ajax'>
    <div class="cssload-thecube">
      <div class="cssload-cube cssload-c1"></div>
      <div class="cssload-cube cssload-c2"></div>
      <div class="cssload-cube cssload-c4"></div>
      <div class="cssload-cube cssload-c3"></div>
    </div>
  </div>

  <a class="scrollToTop" href="#"><i class="fa fa-angle-up" style="font-size: 20pt;"></i></a>

  <!-- start navbar -->
  <nav class="navbar navbar-default navbar-fixed-top homepagenavbar" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbarmenubutton navbar-toggle collapsed navigationtoggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <img class="headerhamburger" src="{{ URL::to('/') }}/img/icon-dashboard-min.png" style="max-height: 35px;" alt="logo">
        </button>
        <a href="{{url('/index')}}">
          <img class="headerimage" src="{{ URL::to('/') }}/img/KATARTIZO LOGO-01.png" style="max-height: 75px;" alt="logo">
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse navbar_area homepage no-overflow" style="float: right; width: calc(100% - 300px);">    
        <ul class="nav navbar-nav navbar-right custom_nav navbarlist">
          <li <?=(isset($browsecoursesflag) && ($browsecoursesflag==true))?'class="active"':'';?>><a href="{{ url('/') }}">Home</a></li>
          <li <?=(isset($lecturerflag) && ($lecturerflag==true))?'class="active"':'';?>><a href="{{ url('/lecturers') }}">Lecturers</a></li>
          <li <?=(isset($curriculumflag) && ($curriculumflag==true))?'class="active"':'';?>><a href="{{ url('/curriculum') }}">Curriculum</a></li>
          <li><a class="home_signup_button hvr-icon-wobble-horizontal" id="signupbutton" href="{{ url('/register') }}" style="font-family: 'Montserrat'; font-weight: 500 !important; font-size: 1.5rem;">REGISTER <i class="fas fa-user-plus hvr-icon" style="margin-left: 5px;"></i></a></li>                    
        </ul>
      </div>
    </div>
  </nav>
  <!-- End navbar -->