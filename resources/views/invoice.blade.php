<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta name="description" content="LAD is an online global platform that enables and facilitates learning & development professionals and organisations to develop and grow into global enterprise.">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="LAD Global Development Team">

    <!-- Google Sign-in Client ID -->
    <meta name="google-signin-client_id" content="798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com">
    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title)?$title:'LAD Global | Free Workplace Learning and Customized Training Platform' }}</title>
    {{-- CSS --}}
    <link href="{{ URL::asset('css/invoicepdf.css') }}" rel="stylesheet">
</head>
<?php foreach ($data as $bill) {?>
  <body>
    <table>
      <tr>
        <td style="border-bottom: 1px solid"><img class="logo" src="{{ URL::to('/') }}/img/logo-min.png"></td>
        <td style="border-bottom: 1px solid">
          <div class="noinvoice">
            <h2><strong>Transaction No.<br></strong>
            <strong><?php echo $bill[0]->invoice ;?></strong></h2>
          </div>
        </td>
      </tr>
  
      <tr>
        <td style="vertical-align: top; width: 300px">
          <div class="bill_info">
            <h2><strong>Billing Information</strong></h2>
              <!-- <p>
                <?php echo $bill[0]->name;?><br>
                <?php echo $bill[0]->organization;?><br>
                <?php echo $bill[0]->email; ?>
              </p> -->
              LAD Global Pte.Ltd<br>
              12 Arumugam Rd, #06-01, LTC Building B<br>
              Singapore 409958<br>
              <a href="mailto:info@ladglobal.com">info@ladglobal.com</a>  
          </div>
        </td>
        <td style="width: 400px">
          <div class="description_info">
            <h2><strong>Description</strong></h2>
            <div class="course_name"><?php echo $bill[0]->title ;?></div>
            <div class="course_creators"><?php echo $bill[0]->name;?></div>
            <div class="participant">Participant Name: <?php echo $bill[0]->participant_name;?>, <?php echo $bill[0]->designation; ?></div>
            <?php if ($bill[0]->employer_name != null || !empty($bill[0]->employer_name)) { ?>
              <div class="participant">Attn: <?php echo $bill[0]->employer_name;?>, <?php echo $bill[0]->employer_organization; ?>, <?php echo $bill[0]->employer_email; ?></div>
            <?php } ?>
            <div class="participant">Payment Method: <?php 
                              if ($bill[0]->payment_option == 0) {
                                echo "Wire Transfer";
                              } elseif ($bill[0]->payment_option == 1) {
                                echo "Credit Card";
                              } elseif ($bill[0]->payment_option == 2) {
                                echo "SkillsFuture Credit";
                              } elseif ($bill[0]->payment_option == 3) {
                                echo "-";
                              }
                            ?></div>
            <?php if ($bill[0]->total_amount == 0) {?>
              <p><strong>Total Fee : FREE </strong></p>
            <?php } else { ?>
              <!-- <p>Subtotal : <?php echo $bill[0]->currency; echo $bill[0]->total_amount; ?>
                <br>
                GST 7% : <?php echo $bill[0]->currency; echo number_format(($bill[0]->total_amount * 0.7),2); ?>
                <hr><hr style="visibility: hidden;">
                <strong>Total Fee : <?php echo $bill[0]->currency; echo number_format($bill[0]->total_amount + ($bill[0]->total_amount * 0.7),2); ?></strong></p> -->
              <p><strong>Total Fee</strong> : <?php echo $bill[0]->currency; echo $bill[0]->total_amount; ?></p>
            <?php } ?>
          </div>
        </td>
      </tr>
      <tr>
        <td style="border-bottom: 1px solid"></td>
        <td style="border-bottom: 1px solid"></td>
      </tr>
       <tr>
          <div class="footer" style="margin-left: 280px;">
                <a href="http://ladglobal.com">www.ladglobal.com</a>
            </div>
       </tr>


    </table>
  </body>
<?php }?>
  