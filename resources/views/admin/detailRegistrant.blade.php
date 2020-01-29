@extends('admin.index')

@section('content')
    <section class="content">
      <div class="box" style="padding: 10px;">
        <h2>{{$title}}</h2>
        <form>
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="string" class="form-control" id="name" name="name" value="{{$product->name}}"  readonly>
          </div>
          <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="string" class="form-control" id="gender" name="gender" value="{{$product->gender}}"  readonly>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="string" class="form-control" id="email" name="email" value="{{$product->email}}"  readonly>
          </div>
          <div class="form-group">
            <label for="address">Alamat:</label>
            <input type="string" class="form-control" id="alamat" name="alamat" value="{{$product->alamat}}"  readonly>
          </div>
          <div class="form-group">
            <label for="statuspelayanan">Status Pelayanan:</label>
            <input type="string" class="form-control" id="statuspelayanan" name="statuspelayanan" value="{{$product->statuspelayanan}}"  readonly>
          </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="string" class="form-control" id="phone" name="phone" value="{{$product->phone}}"  readonly>
          </div>
          <div class="form-group">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="string" class="form-control" id="ttl" name="ttl" value="{{$product->ttl}}"  readonly>
          </div>
          <div class="form-group">
            <label for="praktek">Bersedia Praktek?</label>
            <input type="string" class="form-control" id="praktek" name="praktek" value="{{ ($product->praktek == 0)?'TIDAK':'YA' }}"  readonly>
          </div>
          <div class="form-group">
            <label for="desc">Tujuan Mendaftar:</label>
            <textarea  class="form-control" id="desc" placeholder="Enter Description" name="desc" value="{{$product->message}}"  readonly>{{ stripslashes(str_replace("<br>","&#13;&#10;",$product->message))}}</textarea>
          </div>
          <div class="form-group row">
            <div class="row col-md-12">
              <div class="col-md-2">
                <label for="on_feet">Akte:</label>
                  <?php
                    if ($product->akte != '') {
                      $arrfilename = explode('/', $product->akte);
                      $filename = $arrfilename[count($arrfilename)-1];
                  ?>
                    <a href="{{route('dl_files_akte', [$filename])}}" target="_blank">
                      <div class="col-md-12 no-padding"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 100%;"></div>
                    </a>
                  <?php } else { ?>
                    <div class="col-md-6"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="width: 40%; height: 100%;"></div>
                  <?php } ?>
                </div>

                <div class="col-md-2">
                  <label for="on_feet">KTP:</label>
                    <?php
                      if ($product->ktp != '') {
                        $arrfilename = explode('/', $product->ktp);
                        $filename = $arrfilename[count($arrfilename)-1];
                    ?>
                      <a href="{{route('dl_files_ktp', [$filename])}}" target="_blank">
                        <div class="col-md-12 no-padding"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 100%;"></div>
                      </a>
                    <?php } else { ?>
                      <div class="col-md-6"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="width: 40%; height: 100%;"></div>
                    <?php } ?>
                </div>

                <div class="col-md-2">
                  <label for="on_feet">Ijazah:</label>
                    <?php
                      if ($product->ijazah != '') {
                        $arrfilename = explode('/', $product->ijazah);
                        $filename = $arrfilename[count($arrfilename)-1];
                    ?>
                      <a href="{{route('dl_files_ijazah', [$filename])}}" target="_blank">
                        <div class="col-md-12 no-padding"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 100%;"></div>
                      </a>
                    <?php } else { ?>
                      <div class="col-md-6"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="width: 40%; height: 100%;"></div>
                    <?php } ?>
                </div>

                <div class="col-md-2">
                  <label for="on_feet">Pasfoto:</label>
                    <?php
                      if ($product->pasfoto != '') {
                        $arrfilename = explode('/', $product->pasfoto);
                        $filename = $arrfilename[count($arrfilename)-1];
                    ?>
                      <a href="{{route('dl_files_pasfoto', [$filename])}}" target="_blank">
                        <div class="col-md-12 no-padding"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 100%;"></div>
                      </a>
                    <?php } else { ?>
                      <div class="col-md-6"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="width: 40%; height: 100%;"></div>
                    <?php } ?>
                </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 30px">
            <?php if ($product->status == 0) { ?>
              <a href="{{route('registrant_details', [$product->id, $page])}}"><button type="button" class="btn btn-success">APPROVE</button></a>
              <a href="{{route('registrant_details', [$product->id, $page])}}"><button type="button" class="btn btn-danger">REJECT</button></a>
            <?php } else if ($product->status == 1) { ?>
              <a href="{{route('registrant_details', [$product->id, $page])}}"><button type="button" class="btn btn-danger">REJECT</button></a>
            <?php } else if ($product->status == 2) { ?>
              <a href="{{route('registrant_details', [$product->id, $page])}}"><button type="button" class="btn btn-success">APPROVE</button></a>
            <?php } ?>
          </div>
        </form>
      </div>
    </section>
@endsection
