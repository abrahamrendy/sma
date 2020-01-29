@extends('admin.index')

@section('content')
    <section class="content">
      <div class="box" style="padding: 10px;">
        <h2>{{$title}}</h2>
        <form action="{{route('submit_edit')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$product->id}}">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="string" class="form-control" id="name" name="name" value="{{$product->name}}" >
          </div>
          <div class="form-group form-check">
            <label for="gender">Gender:</label>
            <br>
            <input type="radio" class="form-check-input" name="gender" value="L" {{ ($product->gender == 'L')?'checked' : ''}}> Laki-laki
            <br>
            <input type="radio" class="form-check-input" name="gender" value="P" {{ ($product->gender == 'P')?'checked' : ''}}> Perempuan
            <br>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="string" class="form-control" id="email" name="email" value="{{$product->email}}" >
          </div>
          <div class="form-group">
            <label for="address">Alamat:</label>
            <input type="string" class="form-control" id="alamat" name="alamat" value="{{$product->alamat}}" >
          </div>
          <div class="form-group">
            <label for="statuspelayanan">Status Pelayanan:</label>
            <input type="string" class="form-control" id="statuspelayanan" name="statuspelayanan" value="{{$product->statuspelayanan}}" >
          </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="string" class="form-control" id="phone" name="phone" value="{{$product->phone}}" >
          </div>
          <div class="form-group">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="string" class="form-control datepicker" id="ttl" name="ttl" value="{{$product->ttl}}" >
          </div>
          <div class="form-group form-check">
            <label for="gender">Bersedia praktek?</label>
            <br>
            <input type="radio" class="form-check-input" name="praktek" value="L" {{ ($product->praktek == '1')?'checked' : ''}}> YA
            <br>
            <input type="radio" class="form-check-input" name="praktek" value="P" {{ ($product->praktek == '0')?'checked' : ''}}> TIDAK
            <br>
          </div>
          <div class="form-group">
            <label for="desc">Tujuan Mendaftar:</label>
            <textarea  class="form-control" id="desc" placeholder="Enter Description" name="message" value="{{$product->message}}" >{{ stripslashes(str_replace("<br>","&#13;&#10;",$product->message))}}</textarea>
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
                  <input type="file" name="akte">
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
                    <input type="file" name="ktp">
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
                    <input type="file" name="ijazah">
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
                    <input type="file" name="pasfoto">
                </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 30px">

            <button type="submit" class="btn btn-primary no-margin">SUBMIT CHANGE(S)</button>

            <?php if ($product->status == 0) { ?>
              <button type="button" class="btn btn-success approve-btn" data-id = '{{$product->id}}'>APPROVE</button>
              <button type="button" class="btn btn-danger reject-btn" data-id = '{{$product->id}}'>REJECT</button>
            <?php } else if ($product->status == 1) { ?>
              <button type="button" class="btn btn-danger reject-btn" data-id = '{{$product->id}}'>REJECT</button>
            <?php } else if ($product->status == 2) { ?>
              <button type="button" class="btn btn-success approve-btn" data-id = '{{$product->id}}'>APPROVE</button>
            <?php } ?>

          </div>
        </form>
      </div>
    </section>
@endsection
