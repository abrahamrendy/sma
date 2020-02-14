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
            <th>Gender</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Phone</th>
            <th>Tanggal Lahir</th>
            <th>Status</th>
            <th>Tanggal Daftar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach ($registrant as $list) : ?>
            <tr>
              <td align="center">{{ $i }}</td>
              <td style="word-wrap: break-word;">{{ $list->name }}</td>
              <td style="word-wrap: break-word;">{{ $list->gender }}</td>
              <td style="word-wrap: break-word;">{{ $list->email }}</td>
              <td style="word-wrap: break-word;">{{ $list->alamat }}</td>
              <td style="word-wrap: break-word;">{{ $list->phone }}</td>
              <td style="word-wrap: break-word;">{{ $list->ttl }}</td>
              <td style="word-wrap: break-word;">
                <?php 
                  if ($list->status == 0) {
                    echo "<span class = 'btn btn-info'>PENDING</span>";
                  } else if ($list->status == 1) {
                    echo "<span class = 'btn btn-primary'>APPROVED</span>";
                  } else if ($list->status == 2) {
                    echo "<span class = 'btn btn-danger'>REJECTED</span>";
                  }
                ?>
                  
              </td>
              <td align="center">{{date('Y-m-d H:i:s', strtotime($list->created_time))}}</td>
              <td>
                <a href="{{route('registrant_details', [$list->id,0])}}"><button type="button" class="btn btn-primary">Details</button></a>
                <a href="{{route('registrant_edit', [$list->id,0])}}"><button type="button" class="btn btn-primary">Edit</button></a>
                <hr style="border-color: #a7a5a5">
                <div class="poi_handler">
                  <a href="{{route('delete_user', [$list->id])}}" onclick="return confirm('Are you sure want to DELETE this item?')"><button type="button" class="btn btn-danger" data-id = "{{$list->id}}" >DELETE</button></a>
                </div>
              </td>
            </tr>
          <?php $i++;endforeach ?>
        </tbody>
      </table>
    </div>
      <!-- /.row (main row) -->

    </section>
@endsection