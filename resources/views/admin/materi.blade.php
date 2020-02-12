@extends('admin.index')

@section('content')
<section class="content">
      <!-- Small boxes (Stat box) -->
    @if(session()->has('addProduct'))
      @if(session('addProduct') !== "error")
    <div class="col-md-12 no-padding">
      <div class="alert alert-success alert-dismissable fade in" style="margin-top: 25px;">
        {{session('addProduct')}}
      </div>
    </div>
      @endif
    @endif
    <div style="padding-top: 15px;">
      <div>
        <a href="{{route('add_materi')}}"><button type="button" class="btn btn-primary" style="margin-bottom: 25px">ADD NEW</button></a>
      </div>
     <table id="example" class="table table-striped table-bordered list_data" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <!-- <th>Order</th> -->
            <th>Download</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (isset($materi)) {
          ?>
            <?php $i = 1; foreach ($materi as $list) : ?>
              <tr>
                <td align="center">{{ $i }}</td>
                <td style="word-wrap: break-word;">{{ $list->name }}</td>
                <!-- <td style="word-wrap: break-word;">{{ $list->module_order }}</td> -->
                <td style="word-wrap: break-word;">
                  <?php
                    if ($list->path != '') {
                      $arrfilename = explode('/', $list->path);
                      $filename = $arrfilename[count($arrfilename)-1];
                  ?>
                    <a href="{{route('dl_files_modul', [$filename])}}" target="_blank">
                      <div class="col-md-12 no-padding" style="text-align: center"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 58px; width: auto;"></div>
                    </a>
                  <?php } else { ?>
                    <div class="col-md-6" style="text-align: center"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="height : 58px; width: auto;"></div>
                  <?php } ?>
                </td>
                <td>
                  <a href="{{route('delete_materi', [$list->id])}}" onclick="return confirm('Are you sure want to DELETE this item?')"><button type="button" class="btn btn-danger">DELETE</button></a>
                </td>
              </tr>
            <?php $i++;endforeach ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
      <!-- /.row (main row) -->

    </section>
@endsection