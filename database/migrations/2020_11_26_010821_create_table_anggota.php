<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_anggota', function (Blueprint $table) {
            $table->id();

            $table->string('id_anggota',100);


            $table->string('nama_anggota',50);


            $table->string('jenis_kelamin',50);


            $table->string('alamat',100);


            $table->string('email',50);


            $table->string('no_telp',20);


            $table->string('status_anggota',20);


            $table->string('foto',255);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_anggota');
    }
}
