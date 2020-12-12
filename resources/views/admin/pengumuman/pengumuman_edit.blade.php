<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
  <<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Edit Data Pengumuman</title>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".control-group").remove();
      });
    });
  </script>

</head>
<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header text-center">
        Edit Pengumuman PKK - <strong>EDIT DATA</strong>
      </div>
      <div class="card-body">
        <a href="/pengumuman" class="btn btn-primary">Kembali</a>
        <br/>
        <br/>

        <form method="post" action="/pengumuman/update/{{$pengumuman->id}}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label>Judul Pengumuman</label>
            <input type="text" name="judul_pengumuman" class="form-control" placeholder="Judul Pengumuman .." value="{{$pengumuman->judul_pengumuman}}">

            @if($errors->has('judul_pengumuman'))
            <div class="text-danger">
              {{ $errors->first('judul_pengumuman')}}
            </div>
            @endif

          </div>

          <div class="form-group">
            <label>Konten Pengumuman</label>
            <textarea name="konten_pengumuman" class="form-control" >{{$pengumuman->konten_pengumuman}}</textarea>

            @if($errors->has('konten_pengumuman'))
            <div class="text-danger">
              {{ $errors->first('konten_pengumuman')}}
            </div>
            @endif

          </div>

          <div class="form-group">
            <label>Tanggal Pengumuman</label>
            <input type ="date" type="text" class="form-control datepicker" name="tanggal_pengumuman" value="{{$pengumuman->tanggal_pengumuman}}">

            @if($errors->has('tanggal_pengumuman'))
            <div class="text-danger">
              {{ $errors->first('tanggal_pengumuman')}}
            </div>
            @endif
          </div>


          <label>Input Gambar Atau File Pengumuman</label>
          <div class="input-group control-group increment" >
            <input type="file" name="tambahan[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="tambahan[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" style="margin-top:12px" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>