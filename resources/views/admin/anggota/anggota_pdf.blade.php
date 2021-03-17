<html>
<head>
	<title>Cetak Data Anggota</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
	</style>
	<center>
		<h5>Cetak Data Keanggotan PKK</h4>
	</center>
 
	<table class='table table-bordered'>
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
                  <td><img src="data_file/{{$ang->foto}}" style='width:50px; height:70px;'></td>
                </tr>
                @endforeach
              </tbody>
	</table>
</body>
</html>