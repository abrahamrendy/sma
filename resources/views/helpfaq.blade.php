  <!-- Start Help & FAQ slider section -->
  <section id="sliderSection" class="homepageslider">            
    <div class="mainslider_area">
    <img class="slideimage" src="{{ URL::to('/') }}/img/helpfaq/helpandfaqimage-min.png" alt="helpfaq-img">
      <div class="slider_caption helpfaq" style="height: 100%; max-height: 600px; display: flex;">
        <form class="navbarsearchform helpfaq" action="#trustedby" method="get" style="display: inline; margin: auto;">
          <input type="text" name="search" class="navbar-search helpfaqsearch" placeholder="Ask what you want to know" value="<?=(isset($faq_search))?$faq_search:''?>" style="background: url('{{ URL::to('/') }}/img/magnifying-search-min.png') no-repeat scroll 10px 9px; background-size: 30px 30px; background-color: white; height: 50px; width: 500px; padding-left: 55px; font-size: 15px;">  
        </form>
      </div>
      <?php if (false): ?>
        <!-- Remove this when the slider is stable -->
        <!-- Start super slider -->
        <div id="slides">
          <ul class="slides-container">
            <li>
              <!-- Static Contents -->
              <img class="slideimage" src="{{ URL::to('/') }}/img/helpfaq/helpandfaqimage-min.png" alt="helpfaq-img">
              <div class="slider_caption helpfaq" style="height: 100%; max-height: 600px; display: flex;">
                <form class="navbarsearchform helpfaq" action="#" method="get" style="display: inline; margin: auto;">
                  <input type="text" name="search" class="navbar-search helpfaqsearch" placeholder="Ask what you want to know" value="<?=(isset($faq_search))?$faq_search:''?>" style="background: url('{{ URL::to('/') }}/img/magnifying-search-min.png') no-repeat scroll 10px 9px; background-size: 30px 30px; background-color: white; height: 50px; width: 500px; padding-left: 55px; font-size: 15px;">  
                </form>
              </div>
            </li>
          </ul>
        </div>
      <?php endif ?>      
    </div>
  </section>
  <!-- End Help & FAQ slider section -->

  <!-- start FAQ highlights section -->
  <section id="priceSection" class="helpfaq">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="tab-pane">
            <div class="pricearea homepagetopics">
              <ul class="four_button_faq">
                <!-- Static Contents -->
                <li>
                  <a href="#accountsetup">
                    <img src="{{ URL::to('/') }}/img/helpfaq/account-min.png" alt="img">
                    <h2>Account Setup</h2>
                  </a>
                </li>
                <li>
                  <a href="#learningonlad">
                    <img src="{{ URL::to('/') }}/img/helpfaq/enrollment-min.png" alt="img">
                    <h2>Learning on LAD</h2>
                  </a>
                </li>
                <li>
                  <a href="#payments">
                    <img src="{{ URL::to('/') }}/img/helpfaq/payments-min.png" alt="img">
                    <h2>Payments</h2>
                  </a>
                </li>
                <li>
                  <a href="#troubleshooting">
                    <img src="{{ URL::to('/') }}/img/helpfaq/troubleshooting-min.png" alt="img">
                    <h2>Troubleshooting</h2>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End FAQ highlights section -->

  <!-- Start FAQ area -->
  <section id="trustedby" style="border-bottom: none;">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="testimonial_area hidden">
            <div class="aboutus_ourstory video">
              <div class="team_title" style="margin-bottom: 40px;">
                <h2>Getting Started</h2>
              </div>
            </div>
          </div>
        <div class="trustedby_area animated">
          <div class="team_title" style="margin-bottom: 40px;">
            <h2 id="faqcontents">FAQ</h2>
          </div>
          <div class="faq_content" style="display: inline-block; width: 100%;">
            <?php if ($search_status != false ){?>
                  <span class="helpfaq_search_nomatch">
                    Results found for key "<?php echo $search_status;?>"
                  </span>
                <?php } ?>
            <?php if (isset($faq_contents) && (count($faq_contents) > 0)): ?>
              <!-- Desktop version -->
              <table style="width: 100%;">
                <?php for($ct=0;$ct<count($faq_contents);$ct+=2) : ?>
                    <?php if (isset($faq_contents[$ct])): ?>
                      <tr>
                        <h2><?=$faq_contents[$ct]['title']?></h2>
                        <hr>
                        <?php if (isset($faq_contents[$ct]['contents'])): ?>
                          <ul>
                            <?php foreach ($faq_contents[$ct]['contents'] as $faq_contents_items): ?>
                              <li><a><?=$faq_contents_items?></a></li>  
                            <?php endforeach ?>
                          </ul>
                        <?php endif ?>                        
                      </tr>
                      <hr>
                      <?php endif ?>
                      <tr>
                      <?php if (isset($faq_contents[$ct+1])): ?>
                        <h2><?=$faq_contents[$ct+1]['title']?></h2>
                        <?php if (isset($faq_contents[$ct+1]['contents'])): ?>
                      </tr>
                      <hr>  
                      <ul>
                        <?php foreach ($faq_contents[$ct+1]['contents'] as $faq_contents_items): ?>
                          <li><a><?=$faq_contents_items?></a></li>  
                        <?php endforeach ?>
                      </ul>
                      <hr>
                       <?php endif ?>   
                      <?php endif ?>                                         
                    <?php if ($ct<(count($faq_contents)-2)): ?>
                  <?php endif ?>
                <?php endfor; ?>
              </table>

              <!-- Mobile version -->
              <div class="panel-group helpfaq_accordion" id="accordion_helpfaq" style="display: none;">
                <?php if ($search_status != false ){?>
                  <span class="helpfaq_search_nomatch">
                    Results found for key "<?php echo $search_status;?>"
                  </span>
                <?php } ?>
                <?php $faq_counter = 1; ?>
                <?php foreach ($faq_contents as $fc): ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion_helpfaq" href="#helpfaq_collapse<?=$faq_counter?>" class="helpfaq_contents">
                          <?=(isset($fc['title']))?$fc['title']:''?>
                          <img src="{{ URL::to('/') }}/img/header/downarrow-min.png" class="faq_arrow">
                        </a>
                      </h4>
                    </div>
                    <div id="helpfaq_collapse<?=$faq_counter?>" class="panel-collapse collapse faq_list_items">
                      <ul>
                        <?php foreach ($fc['contents'] as $fcc): ?>
                          <li><a class="faq_anchor"><?=$fcc?></a></li>  
                        <?php endforeach ?>
                      </ul>
                    </div>
                  </div>
                  <?php $faq_counter++; ?>
                <?php endforeach ?>
              </div> 
            <?php else: ?>
              <span class="helpfaq_search_nomatch">
                The key did not match any words
              </span>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End FAQ area --> 

  <!-- start Contact Us area -->
  <section id="howWorks" style="background-color: rgb(240,250,255);">
    <div class="container animated">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="howworks_area helpfaq">
            <div class="helpfaqcontactimage">
              <img src="{{ URL::to('/') }}/img/helpfaq/magnifier-min.png" alt="img">
            </div>
            <div class="helpfaqcontactcontent">
              <h2>Can't find what you're looking for?</h2>
              <a class="home_signup_button contactus" href="{{ URL::to('/contactus') }}#contactusformsection"><span>Contact Us</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Us area -->