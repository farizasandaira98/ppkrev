<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Data Anggota PKK</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Anggota PKK
                </div>
                <div class="card-body">
                    <a href="/anggota/tambah" class="btn btn-primary">Input Anggota Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Status Keanggotaan</th>
                                <th>Foto</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $ang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ang->id_anggota }}</td>
                                <td>{{ $ang->nama_anggota }}</td>
                                <td>{{ $ang->jenis_kelamin }}</td>
                                <td>{{ $ang->alamat }}</td>
                                <td>{{ $ang->email }}</td>
                                <td>{{ $ang->no_telp }}</td>
                                <td>{{ $ang->status_anggota }}</td>
                                <td><img src='data_file/{{ $ang->foto }}' style='width:80px; height:120px;'></td>
                                <td>
                                    <a href="/anggota/edit/{{ $ang->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/anggota/hapus/{{ $ang->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>