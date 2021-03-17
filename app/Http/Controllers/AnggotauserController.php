<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Infokeg;

use App\Anggota;

use App\Pengumuman;

class AnggotauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infokeg=Infokeg::paginate(3);
        $pengumuman=Pengumuman::paginate(3);
        $anggota=Anggota::paginate(5);
        return view('/anggotauser')
        ->with(compact('anggota'))
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }

}
