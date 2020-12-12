<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;

use App\Infokeg;

use App\Pengumuman;

class CariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
        $carikata = $request->carikata;
        $jenis = $request->jenis;
        $tgl = $request->tgl;
        if (isset($carikata)&&isset($jenis)) {
            if ($jenis == "kegiatan") {
                $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$carikata.'%')
                ->paginate(5);
                $infokeg2 = Infokeg::paginate(3);
                return view('/pencariankegiatan', ['infokeg' => $infokeg],['infokeg2' => $infokeg2]);    
            }elseif ($jenis == "pengumuman") {
                $infokeg=Infokeg::paginate(3);
                $pengumuman = Pengumuman::where('judul_pengumuman', 'like', '%'.$carikata.'%')
                ->paginate(5);
                return view('/pencarianpengumuman', ['pengumuman' => $pengumuman],['infokeg' => $infokeg]);      
            }

        }elseif (isset($tgl)&&isset($jenis)) {
            if ($jenis == "kegiatan") {
                $infokeg = Infokeg::where('tanggal_kegiatan', 'like', '%'.$tgl.'%')
                ->paginate(5);
                $infokeg2 = Infokeg::paginate(3);
                return view('/pencariankegiatan', ['infokeg' => $infokeg],['infokeg2' => $infokeg2]);    
            }elseif ($jenis == "pengumuman") {
                $infokeg=Infokeg::paginate(3);
                $pengumuman = Pengumuman::where('tanggal_pengumuman', 'like', '%'.$tgl.'%')
                ->paginate(5); 
                return view('/pencarianpengumuman', ['pengumuman' => $pengumuman],['infokeg' => $infokeg]);     
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
