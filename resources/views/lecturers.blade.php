  <style type="text/css">
    .price_nav.aboutusleadershipteam > li {
      margin-bottom: 5%;
      cursor: pointer;
    }
  </style>

  <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Start About Us slider section -->
  <section id="sliderSection" class="homepageslider">            
    <div class="mainslider_area">
      <img class="slideimage" src="{{ URL::to('/') }}/img/lecturers.png" alt="aboutus-img">
      <div class="slider_caption" style="height: 100%; max-height: 600px; display: flex;">
        <!-- <h1 style="text-transform: uppercase; margin: auto;" class="lad_aboutusslider">LECTURERS</h1> -->
      </div>
    </div>
  </section>
  <!-- End About Us slider section -->

  <!-- start Leadership Team section -->
  <section id="priceSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 animated wow fadeIn" data-wow-duration="1s">
          <div class="client_title" style="margin-bottom: 3%;">
            <h2>OUR LECTURERS TEAM</h2>
            <hr class="title_hr">
          </div>
          <div id="toprated" class="tab-pane fade in active">
            <div class="pricearea homepagetopics">
              <ul class="price_nav aboutusleadershipteam" style="float: left; width: 100%">
                <!-- Static Contents -->
                <li data-aos="zoom-in-right" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{ URL::to('/') }}/img/LADTeam/Toni A.JPG" alt="img">
                    <h2>Pdt. Dr. Tonny Andrian, M.Th.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/ko ivan.jpg" alt="img">
                  <h2>Pdm. Stevannus Yordan, S.E., M.Th.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Junus M.jpeg" alt="img">
                  <h2>Pdm. Junus Mulyana, M.Th.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Budi M.JPG" alt="img">
                  <h2>Pdm. Budi Muljono, S.T., M.Th.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Alexander.JPG" alt="img">
                  <h2>Pdm. Alexander Halim, S.E., M.Th.</h2>
                </li>
              </ul>

              <ul class="price_nav aboutusleadershipteam" style="float: left; width: 100%">
                <li data-aos="zoom-in-left">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Henry Saleh.JPG" alt="img">
                  <h2>Pdm. Hendry Saleh, S.T., M.Th.</h2>
                </li>
                <li data-aos="zoom-in-left">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Eddi Max.JPG" alt="img">
                  <h2>Pdm. Edimax Siauta, S.Th.</h2>
                </li>
                <li data-aos="zoom-in-left">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Mardi Susanto.JPG" alt="img">
                  <h2>Pdm. Mardi Susanto.</h2>
                </li>
                <li data-aos="zoom-in-left">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Andreas.JPG" alt="img" style="object-position: center;">
                  <h2>Pdp. Andreas Santosa, S.S.</h2>
                </li>
                <li data-aos="zoom-in-left">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Lina Arief.JPG" alt="img">
                  <h2>Pdp. Lina Arief Sudisman, S.T.</h2>
                </li>
              </ul>

              <ul class="price_nav aboutusleadershipteam" style="float: left; width: 100%">
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Adi D.JPG" alt="img">
                  <h2>Pdp. Adi Darta, S.Kom.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Yogie Tazir.jpeg" alt="img">
                  <h2>Pdp. Yogie Tazir, S.S., M.A.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/Agustin.JPG" alt="img">
                  <h2>dr. Agustina Karianto.</h2>
                </li>
                <li data-aos="zoom-in-right">
                  <img src="{{ URL::to('/') }}/img/LADTeam/om stef.JPG" alt="img" style="object-position: center;">
                  <h2>Stefanus Maleakhi.</h2>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Leadership Team section -->