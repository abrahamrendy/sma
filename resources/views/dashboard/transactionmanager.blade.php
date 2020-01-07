      
      <!-- standard and simple pop-up -->
      <div id="customized-standard-modal" class="modal" style="z-index: 39; padding-top: 0%">
        <div class="account-modal-content">
          <div class="account-modal-content-small" style="width: 20%">

            <!-- ACCEPTED POP-UP & SCHEDULE APPOINTMENT POP-UP -->
            <div id = "administrator-edit-user-status" class="row modal-body">
              <div class="add-online-course-modal-content-title bottom">
                Edit
              </div>
              <form id ='edit-status-user-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="">
                <div class="col-md-12 util-text-align-left">
                  <label>Transaction No</label>
                  <input class="form-control" name="adm-invoice" type="text" disabled>
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Name</label>
                  <input class="form-control" name="adm-name" type="text" disabled>
                </div>
                <div class="col-md-12 util-text-align-left" style="margin-top: 25px">
                  <label>Email</label>
                  <input class="form-control" name="adm-email" type="text" disabled>
                </div>
                <div class="col-md-12 no-padding util-text-align-left" style="margin-top: 25px">
                  <div class="col-md-12">
                    <label>Status</label>
                    <select class="form-control" name="adm-status">
                        <option value="1">Paid</option>
                        <option value="0">Awaiting Payment</option>
                        <option value="2">Cancelled</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 no-padding">
                  <button type="button" id="submit-edit-transaction-status" class="btn btn-blue view-proposal-btn send-schedule standard-modal-button">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end of standard and simple pop-up -->

      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Transaction Manager
            </a>
          </div>

          <!-- <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#invoice'>
                <img src="{{ URL::to('/') }}/img/invoice-icon-min.png">
                Invoice
              </a>
            </div>
            <div id = "payment-history-tab" class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#payment-history">
                <img src="{{ URL::to('/') }}/img/payment-icon-min.png">
                Payment History
              </a>
            </div>
          </div> -->

          <div class="tab-content">
            <div class = "tab-pane fade in active">
              <div class="administrator-table top bottom left-border right-border">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th class="min-width-120">Transaction No</th>
                      <th class="min-width-120" style="min-width: 80px">Date</th>
                      <th class="min-width-120">Title</th>
                      <th class="min-width-120">Name</th>
                      <th class="min-width-120">Organization</th>
                      <th class="min-width-120">Amount</th>
                      <th class="min-width-120">Method</th>
                      <th class="min-width-120">Status</th>
                      <th class="min-width-120">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($all_transactions) && (count($all_transactions) > 0)) { ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($all_transactions as $data) { ?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td align="center"><a href = "{{URL::to('/')}}/pdf/{{$data->invoice}}" style="color: #3976aa;"><?php echo $data->invoice ?></a></td>
                          <td align="center"><?php echo date("d-m-Y", strtotime($data->time_added)) ?></td>
                          <td><?php echo $data->title ?></td>
                          <td align="center"><?php echo $data->name ?></td>
                          <td align="center"><?php echo $data->organization ?></td>
                          <td><?php echo $data->symbol.number_format($data->price,2,'.','') ?></td>
                          <td>
                            <?php 
                              if ($data->payment_option == 0) {
                                echo "Wire Transfer";
                              } elseif ($data->payment_option == 1) {
                                echo "Credit Card";
                              } elseif ($data->payment_option == 2) {
                                echo "SkillsFuture Credit";
                              } elseif ($data->payment_option == 3) {
                                echo "-";
                              }
                            ?>
                          </td>
                          <td>
                            <!-- <a href = '#' class="change-status-adm" data-id = "<?php //echo $data->id?>" data-name = "<?php //echo $data->name?>" data-email = "<?php //echo $data->email?>" data-status = "<?php //echo $data->status?>"> -->
                            <?php 
                              if ($data->status == 0) {
                                echo "Awaiting Payment";
                              } elseif ($data->status == 1) {
                                echo "Paid";
                              }elseif ($data->status == 2) {
                                echo "Cancelled";
                              }
                            ?>
                            <!-- </a> -->
                          </td>
                          <td align="center">
                            <i class="fa fa-pencil change-status-transaction-adm" data-id = '<?php echo $data->invoice?>' data-name = '<?php echo $data->invoice?>' data-email = '<?php echo $data->name?>' data-email2 = '<?php echo $data->email?>' data-status = '<?php echo $data->status?>' aria-hidden="true"></i> 
                          </td>
                        </tr>
                      <?php $counter++; }?>     
                    <?php } else { $flag = false;?>
                        <!-- <tr>
                          <td colspan = 8 class="no-border" align="center"><b>No Transactions</b></td>
                        </tr> -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>