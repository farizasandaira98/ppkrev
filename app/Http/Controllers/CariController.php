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
                $pengumuman = Pengumuman::paginate(3);
                return view('/pencariankegiatan')
                ->with(compact('infokeg'))
                ->with(compact('infokeg2'))
                ->with(compact('pengumuman'));   
            }elseif ($jenis == "pengumuman") {
                $infokeg=Infokeg::paginate(3);
                $pengumuman2=Pengumuman::paginate(3);
                $pengumuman = Pengumuman::where('judul_pengumuman', 'like', '%'.$carikata.'%')
                ->paginate(5);
                return view('/pencarianpengumuman')
                ->with(compact('infokeg'))
                ->with(compact('pengumuman2'))
                ->with(compact('pengumuman'));     
            }

        }elseif (isset($tgl)&&isset($jenis)) {
            if ($jenis == "kegiatan") {
                $pengumuman = Pengumuman::paginate(3);
                $infokeg = Infokeg::where('tanggal_kegiatan', 'like', '%'.$tgl.'%')
                ->paginate(5);
                $infokeg2 = Infokeg::paginate(3);
                return view('/pencariankegiatan')
                ->with(compact('infokeg'))
                ->with(compact('infokeg2'))
                ->with(compact('pengumuman'));   
            }elseif ($jenis == "pengumuman") {
                $infokeg=Infokeg::paginate(3);
                $pengumuman2=Pengumuman::paginate(3);
                $pengumuman = Pengumuman::where('tanggal_pengumuman', 'like', '%'.$tgl.'%')
                ->paginate(5); 
                return view('/pencarianpengumuman')
                ->with(compact('infokeg'))
                ->with(compact('pengumuman2'))
                ->with(compact('pengumuman'));      
            }
        }elseif (isset($carikata)&isset($tgl)&&isset($jenis)) {
            if ($jenis == "kegiatan") {
                $pengumuman = Pengumuman::paginate(3);
                $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$carikata.'%')
                ->orWhere('tanggal_kegiatan', 'like', '%'.$tgl.'%')
                ->paginate(5);
                $infokeg2 = Infokeg::paginate(3);
                return view('/pencariankegiatan')
                ->with(compact('infokeg'))
                ->with(compact('infokeg2'))
                ->with(compact('pengumuman'));     
            }elseif ($jenis == "pengumuman") {
               $infokeg=Infokeg::paginate(3);
               $pengumuman2=Pengumuman::paginate(3);
               $pengumuman = Pengumuman::where('judul_pengumuman', 'like', '%'.$carikata.'%')
               ->orWhere('tanggal_pengumuman', 'like', '%'.$tgl.'%')
               ->paginate(5);
               return view('/pencarianpengumuman')
               ->with(compact('infokeg'))
               ->with(compact('pengumuman2'))
               ->with(compact('pengumuman'));   
           }
       }

   }

}
