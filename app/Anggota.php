<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
   protected $table = 'table_anggota';
   protected $fillable = ['id_anggota','nama_anggota','jenis_kelamin','alamat','email','no_telp','status_anggota','foto'];
}
