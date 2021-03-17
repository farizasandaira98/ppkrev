<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infokeg extends Model
{
	protected $table = 'table_infokeg';
	protected $fillable = ['nama_kegiatan','deskripsi','tanggal_kegiatan','tempat_kegiatan','foto_kegiatan','id_pengumuman'];
}
