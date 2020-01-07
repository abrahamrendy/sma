	<!-- start confirmation modal -->
	  <div id="employeeconfirmation-modal" class="modal" style="z-index: 39; padding-top: 0px;">
	    <div class="employeeconfirmation-modal-content">
	      <div>
	        <div class="modal-body">
	          <div id="popuptitle">
	            Are you sure you want to remove this user from the employee list?
	          </div>
	          <div class="confirmationbuttondiv">
	          	<button class="buttonyes">Yes</button>
	          	<button class="buttonno">No</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!-- End confirmation modal -->

      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header" style="margin-bottom: 25px;">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Employee List
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            
          </div>

          <div class="tab-content employeecontentouterdiv">
            <?php if (isset($employeelists) && count($employeelists)>0) { $i = 1;?>
                  <div class="sortby">
                  	<select id = 'sortingemployee' style="background: url({{ URL::to('/') }}/img/slate-min.png) right center no-repeat;background-size: 14px;background-color: #FBFBFB;background-origin: content-box;">
                  		<option selected="" disabled="">Sort By</option>
                  		<option value="nameasc" <?=(isset($criteria) && $criteria == 'nameasc')?"selected":'';?>>Name A-Z</option>
                  		<option value="namedesc" <?=(isset($criteria) && $criteria == 'namedesc')?"selected":'';?>>Name Z-A</option>
                  		<option value="role" <?=(isset($criteria) && $criteria == 'role')?"selected":'';?>>Role</option>
                  	</select>
                  </div>
                  <div class="employeecontent">
            	     <ul>
                              <div class="hide" id = "totalcourses"><?php echo array_sum(array_map("count", $allcourses))?></div>
                              <?php foreach ($employeelists as $el) { ?>
                        		<li>
                        			<div data-toggle="asdf" data-target="#<?php echo $el->id?>">
                        				<div class="upper" style="/*cursor: pointer;*/">
                        					<div class="left">
                        						<img src="{{ env('S3_URL') }}<?=($el->photo != null)?$el->photo:'images/default-avatar-min.jpg';?>">
                        					</div>
                        					<div class="right">
                        						<h2><?php echo $el->name?></h2>
            		            				<h3><?php echo $el->occuname?></h3>			
                        					</div>
                        				</div>
                                          </div>
                        				<div class="lower">
                                                      <?php if ($el->role == 2) {?>
                        	                              <button class="dismissbutton employeeactionbutton" data-user-id = "<?php echo $el->id?>">Not Admin</button>
                                                      <?php } else {?>
                                                            <button class="promotebutton employeeactionbutton" data-user-id = "<?php echo $el->id?>">Make Admin</button>
                                                      <?php }?>
                        					<button class="removebutton employeeactionbutton" data-user-id = "<?php echo $el->id?>">Remove</button>
                        				</div>
                        		</li>

                                    <!-- EXPANDABLE CONTENT -->
                                    <div id = '<?php echo $el->id?>' class="demo hide">
                                          <!-- 2nd COLUMN -->
                                          <div class="col-md-6 left-border">
                                                <div class="upper" style="padding-bottom: 10%">
                                                      <div class="">
                                                            <img src="{{ URL::to('/') }}/img/rank-min.png">
                                                      </div>
                                                      <div class="right">
                                                            <h1>Expert</h1>               
                                                      </div>
                                                </div>
                                                <div class="lower">
                                                      <div style="text-align: center;"><img src="{{ URL::to('/') }}/img/checklistrounded-min.png" / style=" width: 20px; margin-right: 8px;"><b>Has completed 10 lessons</b></div>
                                                </div>
                                          </div>

                                          <!-- 3rd COLUMN -->
                                          <div class="col-md-6 left-border" style="height: 132px;">
                                                      <div class="lower hide" style="position: absolute; height: 0px; text-align: center; margin-top: -20px; transform: rotate(180deg)">
                                                            <img href = '#' src = "{{ URL::to('/') }}/img/slate-min.png" style="width: 15px;" />
                                                      </div>
                                                <div class="upper" style="padding-bottom: 5%; font-size: 10pt; font-weight: bolder;">
                                                      <div class="" style="width: 80%;overflow: hidden;height: 132px;">
                                                            <?php if(isset($allcourses[$el->id]) && count($allcourses[$el->id]) > 0) {?>
                                                                  <?php foreach($allcourses[$el->id] as $trcourse) {?>
                                                                        <div>
                                                                              <span><?php echo $trcourse->title?></span>
                                                                              <div class="progress" style="height: 5px; margin-bottom: 0px">
                                                                                <div id = 'mycourse-progress-bar-<?php echo $i;?>' class="progress-bar" role="progressbar" aria-valuenow="<?php echo $trcourse->progress?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                              </div>
                                                                              <span style="font-size: 14pt; color: #008EFE;"><?php echo $trcourse->progress ?>%</span>
                                                                        </div>
                                                                  <?php $i++; } ?>
                                                            <?php } else { ?>
                                                                  <div style="margin-top: 50px;">
                                                                        <span>Not enrolled to any courses.</span>
                                                                  </div>
                                                            <?php } ?>
                                                            <!-- <div>
                                                                  <span>Facilitation of Learning</span>
                                                                  <div class="progress" style="height: 5px; margin-bottom: 0px">
                                                                    <div id = 'mycourse-progress-bar-2' class="progress-bar" role="progressbar" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                  </div>
                                                                  <span style="font-size: 14pt; color: #008EFE;">16.67%</span>
                                                            </div> -->
                                                      </div>
                                                </div>
                                                <?php if (count($allcourses[$el->id]) > 2) {?>
                                                      <div class="lower" style="text-align: center; margin-top: -25px; position: absolute;">
                                                            <img href = '#' src = "{{ URL::to('/') }}/img/slate-min.png" style="width: 15px;" />
                                                      </div>
                                                <?php } ?>
                                          </div>
                                    </div>
                                    <!-- END OF EXPANDABLE CONTENT -->

                              <?php }?>
                        <?php } else {?>
                            <ul> 
                              <div class="alert alert-info" style="margin-top: 25px;">
                                    <?php if (isset($users) && ($users->type == 2 && $users->role == 2)) {?>
                                          Your account is listed as <b>Individual Account</b>.
                                    <?php } else {?>
                                          You haven't listed your employee.
                                    <?php } ?>
                              </div>
                        <?php } ?>
            		<!-- <li>
            			<div>
            				<div class="upper">
            					<div class="left">
            						<img src="{{ URL::to('/') }}/img/default-avatar-min.jpg">
            					</div>
            					<div class="right">
			            			<h2>Lara Kunis</h2>
			            			<h3>Accounting Staff</h3>		
		            			</div>
            				</div>
            				<div class="lower">
            					<button class="promotebutton employeeactionbutton">Make Admin</button>
            					<button class="removebutton employeeactionbutton">Remove</button>
            				</div>
            			</div>
            		</li>
            		<li>
            			<div>
            				<div class="upper">
            					<div class="left">
            						<img src="{{ URL::to('/') }}/img/default-avatar-min.jpg">
            					</div>
            					<div class="right">
			            			<h2>Lara Kunis</h2>
			            			<h3>Accounting Staff</h3>
		            			</div>		
            				</div>
            				<div class="lower">
            					<button class="promotebutton employeeactionbutton">Make Admin</button>
            					<button class="removebutton employeeactionbutton">Remove</button>
            				</div>
            			</div>
            		</li> -->
            	</ul>
                  <div class="col-lg-12 col-md-12" style="text-align: center">
                        <form action="{{URL::to('/')}}/dashboard/employeelist/invite" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="text" name="employee_email" class="subscribe-field" placeholder="Email Address">
                              <button type="submit" class="subscribebutton" id = 'invite-employee'>Invite Employee</button>
                        </form>
                  </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>