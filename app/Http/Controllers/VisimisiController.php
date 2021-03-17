<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Infokeg;
use App\Pengumuman;

class VisimisiController extends Controller
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
        return view('/visimisi')
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }
}
