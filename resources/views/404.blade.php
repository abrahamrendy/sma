  @include('header')

  <!-- Start Trusted By area -->
  <section id="trustedby">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="content_404 wow fadeIn" data-wow-duration="1s">
          <div class="team_title">
            <img src="{{ URL::to('/') }}/img/404illustration-min.png">
          </div>
          <div class="trusted_contents">
            <div class="content_404_info">
              <h1>404 error</h1>
              <h2 style="font-weight: 100">page not found</h2>
              <div class="search404">
                <span><img src="{{ URL::to('/') }}/img/magnifying-white-min.png"></span>
                <form class="navbarsearchform not_found" action="{{url('/search')}}" onsubmit="search_404" style="display: inline;">
                  <input type="text" name="search" class="navbar-search" style="border: none; border-top-right-radius: 4px; border-bottom-right-radius: 4px;" placeholder="What are you looking for?">  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Trusted By area -->

  @include('footer')