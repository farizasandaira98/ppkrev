<html>
<head>
	<title>Cetak Data Kegiatan</title>
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
		<h5>Cetak Data Kegiatan PKK</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Deskripsi</th>
                  <th>Tanggal kegiatan</th>
                  <th>Tempat Kegiatan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($infokeg as $ang)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ang->nama_kegiatan }}</td>
                  <td>{{ $ang->deskripsi }}</td>
                  <td>{{ $ang->tanggal_kegiatan }}</td>
                  <td>{{ $ang->tempat_kegiatan }}</td>
                </tr>
                @endforeach
              </tbody>
	</table>
</body>
</html>