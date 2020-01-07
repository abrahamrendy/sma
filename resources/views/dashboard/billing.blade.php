
      <div class="col-md-10">
        <div class="dashboard-content">

          <div class="dashboard-header">
            <a href = '#'>
            <img src="{{ URL::to('/') }}/img/icon-dashboard-min.png">
            Billing
            </a>
          </div>

          <div class="dashboard-subheader bottom nav nav-tabs">
            <div class="box-content dashboard-active dashboard-tabs">
              <a data-toggle="tab" href = '#invoice'>
                <img src="{{ URL::to('/') }}/img/invoice-icon-min.png">
                Transaction
              </a>
            </div>
            <div id = "payment-history-tab" class="box-content dashboard-tabs">
              <a data-toggle="tab" href="#payment-history">
                <img src="{{ URL::to('/') }}/img/payment-icon-min.png">
                Payment History
              </a>
            </div>
          </div>

          <div class="tab-content">
            <div id = 'invoice' class = "tab-pane fade in active">
              <div class="col-md-12 billing-table top bottom left-border right-border">
                <table class="table billing-table-content">
                  <thead>
                    <tr>
                      <th class="no-border" style="min-width: 25px"></th>  
                      <th style="min-width: 84px">Date</th>
                      <th style="min-width: 127px">Type</th>
                      <th style="min-width: 232px">Details</th>
                      <th style="min-width: 166px">Number</th>
                      <th style="min-width: 70px">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($transactions) && (count($transactions) > 0)) { $flag = true;?>
                      <?php $counter = 1; ?>
                      <?php foreach ($transactions as $data) { ?>
                        <tr>
                          <td class="no-border">
                            <div class="checkbox">
                              <input type="checkbox" class= "billing-check" id="billing-check-<?php echo $counter;?>" />
                              <label for="billing-check-<?php echo $counter;?>" class="no-padding"><span></span></label>
                            </div>
                          </td>
                          <td><?php echo date("m/d/Y", strtotime($data->time_added)) ?></td>
                          <td><?=($data->status == 0)?"Awaiting Payment": 'Paid';?></td>
                          <td><?php echo $data->title?> Course</td>
                          <td class="invoice-number"><?php echo $data->invoice?></td>
                          <td class="recommended-price-tag"><span class="billing-price"><?php if($data->price == 0){ 
                                                            echo 'FREE';
                                                        }else{
                                                            echo $data->symbol; echo number_format($data->total_amount,2,".",",");}?></span></td>
                        </tr>
                      <?php $counter++; }?> 
                        <tr>
                          <td style="border-top: 0px"></td>
                          <td colspan="3"></td>
                          <td></td>
                          <td></td>
                          <!-- <td id="billing-total-label">Total<div class= "right-border" style="height: 20px;float: right; margin-right: 30px"></div></td>
                          <td id="billing-total-amount" class="recommended-price-tag">$<span id="billing-price-total">0</span></td> -->
                        </tr>
    
                    <?php } else { $flag = false;?>
                        <tr>
                          <td colspan = 6 class="no-border" align="center"><b>No Awaiting Payment</b></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php if ($flag) {?>
                <div class="col-md-12" style="margin-top: 20px; padding-bottom: 20px">
                  {{-- <button type="button" id= "submit-billing" class="btn btn-default btn-blue" style="float: right;">Pay Now</button> --}}
                  <form action="{{ URL::to('/pdf')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="invoicebutton">
                    <button type="submit" id= "submit-billing" class="btn btn-blue" disabled="true" style="float: right;">Download Transaction</button>
                  </form>
                </div>
              <?php } ?>
            </div>

            <div id = 'payment-history' class = "tab-pane fade">
              <div class="col-md-12 no-padding">
                <div class="col-md-1" style="margin-top: 30px; font-weight: bold; color: #3976aa; font-size: 13pt">
                  Filter:
                </div>

                <div class="col-md-2 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name="ph_year">
                        <?php 
                           $starting_year  =date('Y', strtotime('-2 year'));
                           $ending_year = date('Y');
                           $current_year = date('Y');
                           for($ending_year; $starting_year <= $ending_year; $ending_year--) {
                               echo '<option value="'.$ending_year.'"';
                               if( $ending_year ==  $current_year ) {
                                      echo ' selected="selected"';
                               }
                               echo ' >'.$ending_year.'</option>';
                           }  
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-1" style="margin-top: 30px; font-size: 13pt">
                  From:
                </div>

                <div class="col-md-2 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name ="ph_month_from">
                        <?php 
                           $starting_month  =date('n', strtotime('January'));
                           $ending_month = date('n');
                           $current_month = date('n');
                           for($ending_month; $starting_month <= $ending_month; $ending_month--) {
                               echo '<option value="'.$ending_month.'"';
                               if( $ending_month ==  $current_month ) {
                                      echo ' selected="selected"';
                               }
                               echo ' >'.date("F", mktime(0,0,0,$ending_month,10)).'</option>';
                           }  
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-1 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name = "ph_date_from">
                        <?php 
                          $current_date = date('j');
                          $dayCount = cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year);
                          for ($i=1; $i <= $dayCount; $i++) { 
                            echo '<option value="'.$i.'"';
                            echo ' >'.$i.'</option>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-1" style="margin-top: 30px; font-size: 13pt; text-align: right;">
                  To:
                </div>

                <div class="col-md-2 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name="ph_month_to">
                      <?php 
                           $starting_month  =date('n', strtotime('January'));
                           $ending_month = date('n');
                           $current_month = date('n');
                           for($ending_month; $starting_month <= $ending_month; $ending_month--) {
                               echo '<option value="'.$ending_month.'"';
                               if( $ending_month ==  $current_month ) {
                                      echo ' selected="selected"';
                               }
                               echo ' >'.date("F", mktime(0,0,0,$ending_month,10)).'</option>';
                           }  
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-1 no-padding">
                  <div class="dropdown dashboard-dropdown styled-select slate">
                    <select name="ph_date_to">
                        <?php 
                          $current_date = date('j');
                          $dayCount = cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year);
                          for ($i=1; $i <= $dayCount; $i++) { 
                            echo '<option value="'.$i.'"';
                               if( $i ==  $current_date ) {
                                      echo ' selected="selected"';
                               }
                               echo ' >'.$i.'</option>';
                          }
                        ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-12 billing-table top bottom left-border right-border">
                <table class="table billing-table-content">
                  <thead>
                    <tr>
                      <th style="min-width: 84px">Date</th>
                      <th style="min-width: 127px">Type</th>
                      <th style="min-width: 232px">Details</th>
                      <th>Number</th>
                      <th style="min-width: 70px">Amount</th>
                    </tr>
                  </thead>
                  <tbody class="fade in" id='paymenthistory-table-content'>
                    <?php if (isset($paymenthistory) && (count($paymenthistory) > 0)) { ?>
                      <?php foreach ($paymenthistory as $data) { ?>

                        <tr>
                          <td><?php echo date("n/j/Y", strtotime($data->time_added)) ?></td>
                          <td><?=($data->status == 1)?"Paid": 'Cancelled';?></td>
                          <td><?php echo $data->title?> course</td>
                          <td><?php echo $data->invoice ?></td>
                          <td class="recommended-price-tag">
                            <?php if ($data->total_amount > 0) {?>
                              <?php echo $data->symbol; ?><span class="billing-price"><?php echo number_format($data->total_amount,2,".",",")?></span>
                            <?php } else {?>
                              <span class="billing-price">FREE</span>
                            <?php } ?>
                          </td>
                          <td></td>
                        </tr>

                        <!-- OBSOLETE -->
                        <!-- <?php //$counter = 1;?>
                        <?php 
                              //$splitdate = explode(",", $data->time_added);
                              //$splitamount = explode(",", $data->total_amount);
                              //$splittitle = explode(",", $data->title);
                              //$length = count($splitdate);
                        ?>
                        <?php //for ($i = 0; $i < $length; $i++) { ?>
                          <tr>
                            <td><?php //echo date("n/j/Y", strtotime($splitdate[$i])) ?></td>
                            <td><?//=($data->payout_status == 1)?"Paid": 'New';?></td>
                            <td><?php //echo $splittitle[$i]?> course</td>
                            <td class="recommended-price-tag">$<span class="billing-price"><?php //echo number_format($splitamount[$i],2,".",",")?></span></td>
                            <td></td>
                          </tr>
                        <?php //} ?> -->
                        <!-- END OBSOLETE -->
                        <!-- <?php //if ($data->payout_status == 1) {?>
                          <tr class="payout-area">
                            <td colspan="4"></td>
                            <td id="" class="black-color recommended-price-tag">$<span><?php//echo number_format($data->total_payout,0,".",",")?></span></td>
                          </tr>
                        <?php //} ?> -->
                      <?php }?>     
                    <?php } else { ?>
                        <tr>
                          <td colspan = 6 class="no-border" align="center"><b>No Payment History</b></td>
                        </tr>
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