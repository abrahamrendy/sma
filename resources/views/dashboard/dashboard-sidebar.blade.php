  <?php if (Session::get('LAD_expire') && (time() < Session::get('LAD_expire'))){}else { ?>
    <script type="text/javascript">
      location.replace("index");
    </script>
  <?php } ?>
  <div class="page-content" style="margin-top: 100px; padding-top: 81px; background-color: #FBFBFB; padding-bottom: 30px">
    <div class="row container centered">
      <div class="col-md-2" style="z-index: 10">
        <div class="sidebar content-box" style="display: block;">
            <div class="profile-photo bottom">
              <img src="<?php echo env('S3_URL')?><?=(Session::get('LAD_user_photo') != null)?Session::get('LAD_user_photo'):'images/default-avatar-min.jpg';?>" style="width: 100px; height: 100px; object-fit: cover; object-position: center; border-radius: 100%">  
              <span class="hide" id="user_id"><?php echo Session::get('LAD_user_id')?></span>
              <br><br>
              Welcome,
              <br>
              <a href="{!! url('/dashboard'); !!}"><span style="font-weight: bold; color: #5786B4; font-size: 14pt"><?php echo Session::get("LAD_user_name")?></span></a>
              <br><br>
            </div>
            <div class="rank">
              <?php if ($users->type != 3) {?>
                <div class="box-content right-border">
                  <img src="{{ URL::to('/') }}/img/star-min.png">
                  <?php 
                    if ($users->type == 0) {
                      echo "Individual";
                    } else if ($users->type == 2) {
                      echo 'Employee';
                    } else {
                      echo 'Corporate';
                    }
                  ?>
                </div>
                <div class="box-content">
                  <img src="{{ URL::to('/') }}/img/rank-min.png">
                  Expert
                </div>
            <?php } else {?>
              <div class="box-content" style="width: 100%">
                  <img src="{{ URL::to('/') }}/img/star-min.png" style="width: 8%">
                  Admin
                </div>
            <?php } ?>
            </div>
            <ul class="nav top sidebar-content bottom">
                <!-- Main menu -->
                <?php if (isset($users)) {?>
                  <script type="text/javascript">
                    var user_type = "<?php echo $users->type ;?>";
                  </script>
                  <?php if ($users->type == 1) {?>
                    <!-- CORPORATE USER -->
                    <li class="current"><a href="{!! url('dashboard/mycourse'); !!}">Enrolled Courses</a></li>
                    <li><a href="{{ URL::to('dashboard/myachievement') }}">My Achievements</a></li>
                    <li><a href="{{ URL::to('/browsecourses') }}">Browse Courses</a></li>
                    <li><a href="{{ URL::to('dashboard/employeelist') }}">Employee List</a></li>
                    <li><a href="{{ URL::to('dashboard/coursemanager') }}">Course Manager</a></li>
                    <li><a href="{{ URL::to('dashboard/postcourse') }}">Post Course</a></li>
                    <li><a href="{{ URL::to('dashboard/billing')}}">Billing</a></li>
                    <li><a href="{{ URL::to('dashboard/customizedcourse')}}">Customized Courses<span class="sidebar-notif hide">2</span></a></li>
                    <li><a href="{{ URL::to('dashboard/settings')}}">Settings</a></li>
                    <li><a href="{{ URL::to('/helpfaq')}}">Help</a></li>
                  <?php } elseif ($users->type == 0 || $users->type == 2) { ?>
                    <!-- INDIVIDUAL USER -->
                    <?php if($users->type == 2 && $users->role == 2) {?>
                      <li class="current"><a href="{!! url('dashboard/mycourse'); !!}">Enrolled Courses</a></li>
                      <li><a href="{{ URL::to('dashboard/myachievement') }}">My Achievements</a></li>
                      <li><a href="{{ URL::to('/browsecourses') }}">Browse Courses</a></li>
                      <li><a href="{{ URL::to('dashboard/employeelist') }}">Employee List</a></li>
                      <li><a href="{{ URL::to('dashboard/coursemanager') }}">Course Manager</a></li>
                      <li><a href="{{ URL::to('dashboard/postcourse') }}">Post Course</a></li>
                      <li><a href="{{ URL::to('dashboard/billing')}}">Billing</a></li>
                      <li><a href="{{ URL::to('dashboard/customizedcourse')}}">Customized Courses<span class="sidebar-notif hide">2</span></a></li>
                      <li><a href="{{ URL::to('dashboard/settings')}}">Settings</a></li>
                      <li><a href="{{ URL::to('/helpfaq')}}">Help</a></li>
                    <?php } else { ?>
                      <li class="current"><a href="{!! url('dashboard/mycourse'); !!}">Enrolled Courses</a></li>
                      <li><a href="{{ URL::to('dashboard/myachievement') }}">My Achievements</a></li>
                      <li><a href="{{ URL::to('/browsecourses') }}">Browse Courses</a></li>
                      <li><a href="{{ URL::to('dashboard/billing')}}">Billing</a></li>
                      <li><a href="{{ URL::to('dashboard/settings')}}">Settings</a></li>
                      <li><a href="{{ URL::to('/helpfaq')}}">Help</a></li>
                    <?php } ?>
                  <?php } elseif ($users->type == 3) {?>
                    <!-- ADMIN ONLY -->
                    <li><a href="{{ URL::to('/dashboard') }}">User Manager</a></li>
                    <li><a href="{{ URL::to('dashboard/coursemanager') }}">Course Manager</a></li>
                    <li><a href="{{ URL::to('dashboard/courserequestmanager') }}">Course Request Manager</a></li>
                    <li><a href="{{ URL::to('dashboard/transactionmanager') }}">Transaction Manager</a></li>
                    <li><a href="{{ URL::to('dashboard/settings') }}">Settings</a></li>
                  <?php } ?>
                <?php } ?>
            </ul>
         </div>
      </div>