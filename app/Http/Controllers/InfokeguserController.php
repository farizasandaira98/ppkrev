<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Infokeg;

use App\Pengumuman;

class InfokeguserController extends Controller
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
        return view('/infokeguser')
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }

    public function readmore($id){
        $infokeg2 = Infokeg::paginate(3);
        $pengumuman2 = Pengumuman::paginate(3);
        $infokeg = Infokeg::where('id', $id)->first();
         return view('readmore')
        ->with(compact('pengumuman2'))
        ->with(compact('infokeg2'))
        ->with(compact('infokeg'));
    }

}
