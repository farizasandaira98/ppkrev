<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Data Anggota</title>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Data Anggota PKK - <strong>EDIT DATA</strong>
            </div>
            <div class="card-body">
                <a href="/anggota" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/anggota/update/{{$anggota->id}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    

                    <div class="form-group">
                        <label>Nomor Anggota</label>
                        <input type="text" name="id_anggota" class="form-control" placeholder="Nomor Keanggotaan .." value="{{$anggota->id_anggota}}">

                        @if($errors->has('id_anggota'))
                        <div class="text-danger">
                            {{ $errors->first('id_anggota')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota .." value="{{$anggota->nama_anggota}}">

                        @if($errors->has('nama_anggota'))
                        <div class="text-danger">
                            {{ $errors->first('nama_anggota')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>

                        <select class="form-control" id="jenis_kelamin" 


                        name="jenis_kelamin">

                        @if($anggota->jenis_kelamin == "Laki-laki")
                        <option value="Laki-laki" selected="selected">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        @endif

                        @if($anggota->jenis_kelamin == "Perempuan")
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan" selected="selected">Perempuan</option>
                        @endif

                    </select>

                    @if($errors->has('jenis_kelamin'))
                    <div class="text-danger">
                        {{ $errors->first('jenis_kelamin')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat anggota .." >{{$anggota->alamat}}</textarea>

                    @if($errors->has('alamat'))
                    <div class="text-danger">
                        {{ $errors->first('alamat')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Anggota .." value="{{$anggota->email}}">

                    @if($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="tel" name="no_telp" class="form-control" placeholder="Nomor Telpon Anggota Anggota .." value="{{$anggota->no_telp}}">

                    @if($errors->has('no_telp'))
                    <div class="text-danger">
                        {{ $errors->first('no_telp')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Status Anggota</label>

                    <select class="form-control" id="status_anggota" name="status_anggota" value="{{$anggota->status_anggota}}">


                        <option value="aktif">Aktif</option>


                        <option value="nonaktif">Non Aktif</option>


                    </select>

                    @if($errors->has('status_anggota'))
                    <div class="text-danger">
                        {{ $errors->first('status_anggota')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Foto Anggota</label>
                    <input type="file" name="foto" class="form-control" value="{{$anggota->foto}}">

                    @if($errors->has('foto'))
                    <div class="text-danger">
                        {{ $errors->first('foto')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>