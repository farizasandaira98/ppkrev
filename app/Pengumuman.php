<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'table_pengumuman';
	protected $fillable = ['judul_pengumuman','konten_pengumuman','tanggal_pengumuman','tambahan'];
}
