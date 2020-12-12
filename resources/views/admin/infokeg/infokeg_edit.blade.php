<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
  <<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Edit Data Kegiatan</title>

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
        Edit Kegiatan PKK - <strong>EDIT DATA</strong>
    </div>
    <div class="card-body">
        <a href="/infokeg" class="btn btn-primary">Kembali</a>
        <br/>
        <br/>

        <form method="post" action="/infokeg/update/{{$infokeg->id}}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan .." value="{{$infokeg->nama_kegiatan}}">

            @if($errors->has('nama_kegiatan'))
            <div class="text-danger">
              {{ $errors->first('nama_kegiatan')}}
          </div>
          @endif

      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi ..">{{$infokeg->deskripsi}}</textarea>

        @if($errors->has('deskripsi'))
        <div class="text-danger">
            {{ $errors->first('deskripsi')}}
        </div>
        @endif

    </div>

    <div class="form-group">
        <label>Tanggal Kegiatan</label>
        <input type ="date" placeholder="Tanggal Kegiatan" type="text" class="form-control datepicker" name="tanggal_kegiatan" value="{{$infokeg->tanggal_kegiatan}}">

        @if($errors->has('tanggal_kegiatan'))
        <div class="text-danger">
          {{ $errors->first('tanggal_kegiatan')}}
      </div>
      @endif

  </div>

  <div class="form-group">
      <label>Tempat Kegiatan</label>
      <textarea name="tempat_kegiatan" class="form-control" placeholder="Tempat Kegiatan ..">{{$infokeg->tempat_kegiatan}}</textarea>

      @if($errors->has('tempat_kegiatan'))
      <div class="text-danger">
        {{ $errors->first('tempat_kegiatan')}}
    </div>
    @endif

</div>

<label>Input Gambar Kegiatan</label>
<div class="input-group control-group increment" >
  <input type="file" name="foto_kegiatan[]" class="form-control">
  <div class="input-group-btn"> 
    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
</div>
</div>
<div class="clone hide">
  <div class="control-group input-group" style="margin-top:10px">
    <input type="file" name="foto_kegiatan[]" class="form-control">
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