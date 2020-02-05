  <!-- Start slider section -->
  <section id="sliderSection">            
    <div class="mainslider_area">
    <img class="slideimage" src="{{ URL::to('/') }}/img/curiculum.jpg" alt="achievements-image">
      <div class="slider_caption" style="height: 100%; max-height: 600px; display: flex;">
        <!-- <h1 style="text-transform: uppercase; margin: auto;" class="lad_achievements">Curriculum</h1> -->
      </div>
    </div>
  </section>
  <!-- End slider section -->

  <!-- start badge and certificate area -->
  <?php
    $arrContent = array(
                        "Pemulihan Pondok Daud" => "DNA GBI Gatot Soebroto Jakarta dibawah pembinaan Pdt. DR. Ir. Niko Njotorahardjo.",
                        "Keselamatan" => "Doktrin keselamatan yang Alkitabiah sebagai fondasi penting dalam berbagai pelayanan praktis yang akan dibangun diatasnya.",
                        "Pelayanan Keluarga" => "Keterampilan praktis dalam konseling, parenting dan pelayanan bimbingan Pra dan Paska Nikah (BP2N).",
                        "Pelayanan Anak" => "Keterampilan dalam pelayanan anak.",
                        "Pelayanan Pemuda Remaja" => "Keterampilan dalam pelayanan pemuda remaja.",
                        "Pelayanan Kesembuhan Batin" => "Keterampilan melayani pemulihan batin dan gambar diri.",
                        "Pelayanan Pendampingan Lansia" => "Pengetahuan praktis penanganan dan pendampingan Lansia.",
                        "Pelayanan Sosial" => "Keterampilan dalam pelayanan kesosialan masyarakat.",
                        "Penangan Darurat Medik" => "Pengetahuan praktis pertolongan pertama pada kecelakaan dan darurat medik.",
                        "Hermeneutika" => "Ilmu yang mempelajari tentang interpretasi makna ayat Alkitab.",
                        "Apologetika" => "Ilmu sistematis untuk menjelaskan dan mempertahankan iman Kristen.",
                        "Homelitika" => "Ilmu khotbah secara terstruktur, dinamis, dan inspiratif.",
                        "Etika Kristen" => "Prinsip-prinsip praktis sikap dan prilaku Kristiani.",
                        "Pelayanan yang Berkuasa" => "Prinsip-prinsip praktis pelayanan yang berkuasa (supranatural).",
                        "Penginjilan Pribadi" => "Prinsip-prinsip praktis untuk memberitakan Injil secara pribadi.",
                        "Liturgi" => "Pedoman praktis penyelenggaraan ibadah mulai dari kebaktian umum, baptisan air, pernikahan dan kedukaan.",
                        "Pelayanan Memimpin Pujian" => "Pelatihan praktis bagaimana memimpin pujian dalam ibadah raya maupun ibadah khusus lainnya.",
                        "Administrasi Gereja" => "Keterampilan dalam pengelolaan administrasi gerejawi.",
                        "Perintisan Jemaat" => "Prinsip-prinsip praktis dalam perintisan jemaat.",
                        "Kepemimpinan" => "Ilmu kepemimpinan Kristen.",
                      );
  ?>
  <section id="timeline">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 line">
          <?php
            if (isset($arrContent)) {
              $ct = 1;
              foreach ($arrContent as $key => $value) {
          ?>
          <article data-aos="{{ ($ct % 2 == 1) ? 'fade-left' : 'fade-right' }}">
            <div class="inner">
              <span class="date">
                <span class="month">{{$ct}}</span>
              </span>
              <h2>{{$key}}</h2>
              <p>{{$value}}</p>
            </div>
          </article>
          <?php
                $ct++;
              }
            }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End badge and certificate area --> 