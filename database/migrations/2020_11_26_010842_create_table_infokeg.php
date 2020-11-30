<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInfokeg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_infokeg', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan',30);
            $table->date('tanggal_kegiatan');
            $table->string('tempat_kegiatan',50);
            $table->string('foto_kegiatan',255);
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
        Schema::dropIfExists('table_infokeg');
    }
}
