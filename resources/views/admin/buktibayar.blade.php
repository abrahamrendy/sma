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
     <table id="example" class="table table-striped table-bordered list_data" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Tanggal Lahir</th>
            <th>Bukti Bayar</th>
            <th>Tanggal Submit</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach ($registrant as $list) : ?>
            <tr>
              <td align="center">{{ $i }}</td>
              <td style="word-wrap: break-word;">{{ $list->name }}</td>
              <td style="word-wrap: break-word;">{{ $list->email }}</td>
              <td style="word-wrap: break-word;">{{ $list->phone }}</td>
              <td style="word-wrap: break-word;">{{ $list->ttl }}</td>
              <td style="word-wrap: break-word;">
                <?php
                  if ($list->bukti != '') {
                    $arrfilename = explode('/', $list->bukti);
                    $filename = $arrfilename[count($arrfilename)-1];
                ?>
                  <a href="{{route('dl_files_bukti', [$filename])}}" target="_blank">
                    <div class="col-md-12 no-padding" style="text-align: center"><img src="{{URL('/').'/img/download_file.png'}} " alt="POI Image" class="form-control" style="height: 58px; width: auto;"></div>
                  </a>
                <?php } else { ?>
                  <div class="col-md-6" style="text-align: center"><img src="{{URL('/').'/img/noimage.jpg'}}" alt="POI Image" class="form-control" style="height : 58px; width: auto;"></div>
                <?php } ?>
              </td>
              <td align="center">{{date('Y-m-d H:i:s', strtotime($list->created_at))}}</td>
            </tr>
          <?php $i++;endforeach ?>
        </tbody>
      </table>
    </div>
      <!-- /.row (main row) -->

    </section>
@endsection