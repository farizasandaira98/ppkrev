<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengumuman;

use App\Infokeg;

class pengumumanuserController extends Controller
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
        return view('/pengumumanuser')
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }

    public function readmore($id){
        $infokeg = Infokeg::paginate(3);
        $pengumuman2 = Pengumuman::paginate(3);
        $pengumuman = Pengumuman::where('id', $id)->first();
        return view('readmorepeng')
        ->with(compact('pengumuman2'))
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }

    
}
