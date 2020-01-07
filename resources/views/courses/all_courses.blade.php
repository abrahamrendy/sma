  <!-- start slider section -->
  
  <!-- End slider section -->

  <!-- Start Category area -->
  <section id="service">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="service_area courses">
          <ul class="courses_category nav nav-pills wow fadeIn" data-wow-duration="1s">
            <?php if (isset($coursescategories) && (count($coursescategories) > 0)): ?>
              <?php $counter = 0;?>
              <?php foreach ($coursescategories as $cc): ?> 
                <?php if ($counter == 1) {?>
                <li class="coursescategorydiv">
                  <div style="height: 100%;">
                    <div class="cat_id hide">a</div>
                    <div class="sec_id hide">a</div>
                    <a data-toggle="pill" href="#section_a" style="width: 100%; height: 100%; overflow: hidden;">
                        <h2 style="padding: 0px; display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">All Courses</h2>
                    </a>
                  </div>
                </li>
                <?php } ?>
                <li class="coursescategorydiv <?php if ($counter == 0) { echo 'active'; }?>">
                  <div style="height: 100%;">
                    <div class="cat_id hide">{{strtolower($cc->id)}}</div>
                    <div class="sec_id hide"><?php echo $counter; ?></div>
                    <a data-toggle="pill" href="#section_{{$counter}}" style="width: 100%; height: 100%; overflow: hidden;">
                      <h2 style="padding: 0px; display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">{{$cc->name}}</h2>
                    </a>
                  </div>
                </li>
                <?php $counter++; ?>
              <?php endforeach ?>
            <?php endif ?>
            <li class="coursescategorydiv">
              <div style="height: 100%;" id='country_sort'>
                 <!-- <h2 style="padding: 0px; display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">COUNTRY: ALL</h2> -->
                <select name = 'sort_courses_by_country'>
                    <option value="" disabled selected style="display: none;">ALL COUNTRIES</option>
                    <option value="all">ALL COUNTRIES</option>
                      <?php
                          $codes = json_decode(file_get_contents('http://country.io/iso3.json'), true);
                          $names = json_decode(file_get_contents('http://country.io/names.json'), true);
                          $iso3_to_name = array();
                            foreach($codes as $iso2 => $iso3) {
                              $iso3_to_name[$iso3] = $names[$iso2];
                            }
                      ?>
                      <?php if (isset($courses_by_country)) {?>
                        <?php foreach ($courses_by_country as $courses_country) {?>
                              <option value="<?php echo $courses_country->country?>"><?php if (isset ($names[$courses_country->country])) {echo strtoupper($names[$courses_country->country]);} else {echo strtoupper($courses_country->country);}?></option>
                        <?php } ?>
                      <?php } ?>
                </select>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Category area -->

  <!-- start courses section -->
  <section id="priceSection" style="padding-top: 0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="tab-content wow fadeIn" data-wow-duration="1s">
            <?php if (isset($data_by_category) && count($data_by_category) > 0): ?>
              <?php $ct = 0; ?>
              <div id="section_a" class="tab-pane fade pricearea browsecourse">
                  <ul class="price_nav">
                    <?php if(isset($all_courses_data)):?>
                      <?php foreach ($all_courses_data as $course): ?>
                        <li>
                          <a href="{{ URL::to('/').'/coursedetail/'.$course->coursecode }}">
                            <div style="height: 165px; display: flex; justify-content: center; overflow: hidden;" class="browsecoursesmalldiv">
                              <img src="{{ env('S3_URL').$course->image }}" alt="img">  
                            </div>
                            <h3 class="coursetitle line-clamp line-clamp-2">{{$course->title}}</h3>
                            <h2 class="courselecturer line-clamp line-clamp-1">{{$course->courselecturer}}</h2>
                            <h2 class="courseprice">
                              <?php if($course->price == 0){ 
                                      echo 'FREE';
                                    }else{
                                      echo $course->symbol?><?=(isset($course->price))?number_format($course->price,2,".",","):'';}?>
                            </h2>
                          </a>
                        </li>
                      <?php endforeach ?>
                    <?php endif ?>
                  </ul>
                </div>
              <?php foreach ($data_by_category as $category_key => $category_value):?>
                <div id="section_{{$category_key}}" class="tab-pane fade pricearea browsecourse {{($ct == 0)?'in active':''}}">
                  <ul class="price_nav">
                    <?php foreach ($category_value as $course_contents): ?>
                      <li>
                        <a href="{{ URL::to('/').'/coursedetail/'.$course_contents->coursecode }}">
                          <div style="height: 165px; display: flex; justify-content: center; overflow: hidden;" class="browsecoursesmalldiv">
                            <img src="{{ env('S3_URL').$course_contents->image }}" alt="img">  
                          </div>
                          <h3 class="coursetitle line-clamp line-clamp-2">{{$course_contents->title}}</h3>
                          <h2 class="courselecturer line-clamp line-clamp-1">{{$course_contents->courselecturer}}</h2>
                          <h2 class="courseprice">
                            <?php if($course_contents->price == 0){ 
                                      echo 'FREE';
                                  }else{
                                      echo $course_contents->symbol?><?=(isset($course_contents->price))?number_format($course_contents->price,2,".",","):'';}?>
                          </h2>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
                <?php $ct++; ?>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
    {{-- sorting courses --}}
     <!-- <div id='country_sort' class="sortingcourses dropdown dashboard-dropdown styled-select slate" style="width: 10%; margin-left: 227px">
        <select name = 'sort_courses_by_country'>
            <option value="" disabled selected style="display: none;">Country</option>
            <option value="all">All</option>
              <?php
                  $codes = json_decode(file_get_contents('http://country.io/iso3.json'), true);
                  $names = json_decode(file_get_contents('http://country.io/names.json'), true);
                  $iso3_to_name = array();
                    foreach($codes as $iso2 => $iso3) {
                      $iso3_to_name[$iso3] = $names[$iso2];
                    }
              ?>
              <?php if (isset($courses_by_country)) {?>
                <?php foreach ($courses_by_country as $courses_country) {?>
                      <option value="<?php echo $courses_country->country?>"><?php if (isset ($names[$courses_country->country])) {echo $names[$courses_country->country];} else {echo $courses_country->country;}?></option>
                <?php } ?>
              <?php } ?>
        </select>
      </div> -->
  </section>
  <!-- End courses section -->
