  <?php if (Session::get('LAD_expire') && (time() < Session::get('LAD_expire'))){}else { ?>
    <script type="text/javascript">
      location.replace("index");
    </script>
  <?php } ?>

  <section id="networkpagesearchfriends">
    <div class="container">
      <div class='row'>
        <div class="networkpagesearchcontent">
          <div class="search_title">
            Search for friends
          </div>
          <div>
            <form method="get" action="#" id="networkpage_search_form">
              <input type="text" name="searchfriends" placeholder="Enter name or ID" id="networkpage_search_field" class="login_email" value="<?=(isset($search_input))?$search_input:''?>" style="margin-bottom: 40px;">  
            </form>
          </div>
        </div>        
      </div>
    </div>
  </section>

  <!-- start carousel section -->
  <section id="networkpagecarousel">            
    <div class="container">
      <div class='row'>
        <div class="carousel_title">
          Connection Requests
        </div>
        <div style="width: 100%;">
          <div class="carousel slide media-carousel network_requests" id="media">
            <div class="carousel-inner">
              <?php if (isset($connections) && (count($connections) > 0)): ?>
                <?php for($i=0;$i<count($connections);$i+=4) : ?>
                  <div class="item <?=($i==0)?'active':''?>">
                    <div class="row">
                      <?php for($j=0;$j<4;$j++) : ?>
                        <?php if (isset($connections[(($i)+$j)])): ?>
                          <div class="col-md-3 carousel-div">
                            <div class="carousel-contents">
                              <div class="blue-top"></div>
                              <img src="{{env('S3_URL')}}<?=($connections[(($i)+$j)]['photo'])?$connections[(($i)+$j)]['photo']:'images/default-avatar-min.jpg'?>">
                              <span class="content_name"><?=$connections[(($i)+$j)]['name']?></span>
                              <span class="content_occupation"><?=$connections[(($i)+$j)]['position']?></span>
                              <a href="#" class="content_viewprofile" data-type="request" 
                                                                      data-id="<?=$connections[(($i)+$j)]['id']?>" 
                                                                      data-name="<?=$connections[(($i)+$j)]['name']?>"
                                                                      data-position="<?=$connections[(($i)+$j)]['position']?>"
                                                                      data-organization="<?=$connections[(($i)+$j)]['organization']?>"
                                                                      data-interest="<?=$connections[(($i)+$j)]['interest']?>"
                                                                      data-country="<?=$connections[(($i)+$j)]['country']?>"
                                                                      data-photo="<?=$connections[(($i)+$j)]['photo']?>"
                                                                      data-description="<?=$connections[(($i)+$j)]['description']?>"
                                                                      data-reputation="<?=$connections[(($i)+$j)]['reputation']?>">View Profile</a>
                            </div>                    
                          </div>  
                        <?php else: ?>
                          <?php break; ?>
                        <?php endif ?>
                      <?php endfor; ?> 
                    </div>
                  </div>
                <?php endfor; ?>  
              <?php endif ?>
            </div>
            <a data-slide="prev" href="#media" class="left carousel-control" style="background-image: url(<?=URL::to('/').'/img/slider/left-gray-min.png'?>)"></a>
            <a data-slide="next" href="#media" class="right carousel-control" style="background-image: url(<?=URL::to('/').'/img/slider/right-gray-min.png'?>)"></a>
          </div>                          
        </div>
      </div>
    </div>
  </section>
  <!-- End carousel section -->

  <!-- start network page lower section -->
  <section id="priceSection">
    <div class="container">
      <div class="networklower row wow fadeIn" data-wow-duration="1s">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="categorybutton networkpage">
            <ul class="nav nav-pills">
              <li class="leftbutton active">
                <a data-toggle="pill" href="#searchresult">Search Result</a>
              </li>
              <li class="rightbutton">
                <a data-toggle="pill" href="#friendsuggestions">Friend Suggestions</a>
              </li>
            </ul>
          </div>

          <div class="sortby">
            <span class="networksearchsortby">Sorted By&nbsp;:&nbsp;</span>
            <select class="form-control" id="networkpagesortby">
              <option value="1" selected="">Position</option>
              <option value="2">Name</option>
            </select>
          </div>

          <div class="tab-content">
            <div id="searchresult" class="tab-pane fade in active">
              <div class="searchresultdiv">
                <ul>
                  <?php if (isset($search_result) && (count($search_result) > 0)): ?>
                    <?php foreach ($search_result as $sr): ?>
                      <li>
                        <div class="col-md-3 network_lower_section">
                          <div class="carousel-contents">
                            <div class="blue-top"></div>
                            <img src="{{env('S3_URL')}}<?=(isset($sr['photo']))?$sr['photo']:'images/default-avatar-min.jpg'?>">
                            <span class="content_name"><?=$sr['name']?></span>
                            <span class="content_occupation"><?=$sr['position']?></span>
                            <a class="content_viewprofile" data-id="<?=$sr['id']?>" 
                                                            data-name="<?=$sr['name']?>"
                                                            data-position="<?=$sr['position']?>"
                                                            data-organization="<?=$sr['organization']?>"
                                                            data-interest="<?=$sr['interest']?>"
                                                            data-country="<?=$sr['country']?>"
                                                            data-photo="<?=$sr['photo']?>"
                                                            data-description="<?=$sr['description']?>"
                                                            data-reputation="<?=$sr['reputation']?>">View Profile</a>
                          </div>                    
                        </div>  
                      </li>
                    <?php endforeach ?>
                  <?php else: ?>
                    <span class="network_search_empty">Your search <?=(isset($search_input))?'"'.$search_input.'"':''?> did not match any user.</span>
                  <?php endif ?>
                </ul>
              </div>
            </div>
            
            <div id="friendsuggestions" class="tab-pane fade">
              <div class="searchresultdiv">
                <ul>
                  <?php if (isset($friend_suggestions) && count($friend_suggestions) > 0): ?>
                    <?php foreach ($friend_suggestions as $fs): ?>
                      <li>
                        <div class="col-md-3 carousel-div">
                          <div class="carousel-contents bottom">
                            <div class="blue-top"></div>
                            <img src="{{env('S3_URL')}}<?=(isset($fs['photo']))?$fs['photo']:'images/default-avatar-min.jpg'?>">
                            <span class="content_name"><?=$fs['name']?></span>
                            <span class="content_occupation"><?=$fs['position']?></span>
                            <a class="content_viewprofile" data-id="<?=$fs['id']?>" 
                                                            data-name="<?=$fs['name']?>"
                                                            data-position="<?=$fs['position']?>"
                                                            data-organization="<?=$fs['organization']?>"
                                                            data-interest="<?=$fs['interest']?>"
                                                            data-country="<?=$fs['country']?>"
                                                            data-photo="<?=$fs['photo']?>"
                                                            data-description="<?=$fs['description']?>"
                                                            data-reputation="<?=$fs['reputation']?>">View Profile</a>
                          </div>                    
                        </div>  
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End network page lower section -->

