<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Infokeg;

use App\Pengumuman;

class IndexController extends Controller
{
    
    public function index()
    {
        $infokeg=Infokeg::paginate(3);
        $pengumuman=Pengumuman::paginate(3);
        return view('index')
        ->with(compact('infokeg'))
        ->with(compact('pengumuman'));
    }

    
}
