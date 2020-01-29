<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="Scotch">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- load bootstrap from a cdn -->
<!--   <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/twitter-bootstrap/3.0.3/css/bootstrap-combined.min.css"> -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/bootstrap.min.css')}}"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/font-awesome.min.css')}}"/>
  <!-- AdminLTE -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/AdminLTE.min.css')}}"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/skins/_all-skins.min.css')}}"/>
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/ionicons.min.css')}}"/>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/dataTables.bootstrap.min.css')}}"/>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="{{asset('js/dashboard/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('js/dashboard/bootstrap.min.js')}}"></script>
  <!-- Slimscroll -->
  <script src="{{asset('js/dashboard/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('js/dashboard/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/dashboard/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/dashboard/demo.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('js/dashboard/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dashboard/dataTables.bootstrap.min.js')}}"></script>
  <script>
    $(function () {
      $('#example').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>

  <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.js"></script> 
  <script src="{{ URL::to('/') }}/js/bootstrap-datepicker.min.js"></script>  
  <script src="{{ URL::to('/') }}/js/bootstrap-datetimepicker.min.js"></script>  

  <style type="text/css">
    .btn-primary {
      margin-top: 5px;
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

  @if (Auth::guest()) 
    <nav class="navbar navbar-default navbar-static-top" style="margin-left: 0px; margin-bottom:100px;">
      <div class="container">
        <div class="navbar-header">

          <!-- Branding Image -->
          <span class="navbar-brand" style="color : #777;">{{ config('app.name', 'Laravel') }}</span>
        </div>
      </div>
    </nav>
  @else
    <!-- Logo -->
    <a href="{{route('bo')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  @endif
</header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="{{route('bo')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="{{route('bukti_bayar')}}"><i class="fa fa-money"></i> <span>Bukti Bayar</span></a></li>
      <li><a href="{{route('bo')}}"><i class="fa fa-book"></i> <span>Upload Materi</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Control Panel</small>
      </h1>
    </section>

    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy;Katartizo Mission Academy.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  $(document).ready(function(){

    $( ".datepicker" ).datepicker();

    $(document).on('click','.approve-btn', function(){

      var id = $(this).attr('data-id');
      var _token = $('input[name=_token]').val();
      $.ajax({
        type: "POST",
        url: "{{route('approve')}}",
        data: {id: id,  _token: _token},
        dataType: 'json',
        success: function(data) 
        {
          location.reload();
        },
        error:function(xhr,status,error)
        {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
      });

    });

    $(document).on('click','.reject-btn', function(){

      var id = $(this).attr('data-id');
      var _token = $('input[name=_token]').val();
      $.ajax({
        type: "POST",
        url: "{{route('reject')}}",
        data: {id: id,  _token: _token},
        dataType: 'json',
        success: function(data) 
        {
          location.reload();
        },
        error:function(xhr,status,error)
        {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
      });

    });
  });
</script>
</body>
</html>
