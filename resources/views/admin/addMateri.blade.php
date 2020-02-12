@extends('admin.index')

@section('content')
    <section class="content">
      <div class="box" style="padding: 10px;">
        <h2>Upload Materi</h2>
        <form action="{{route('submit_materi')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="string" class="form-control" id="name" name="name" value="" >
          </div>
          <div class="form-group">
            <input type="file" name="modul" class="form-control" required>
          </div>
          <div class="form-group" style="margin-top: 30px">
            <button type="submit" class="btn btn-primary no-margin">SUBMIT</button>
          </div>
        </form>
      </div>
    </section>
@endsection
