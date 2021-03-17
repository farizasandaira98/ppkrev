<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use App\Anggota;

use App\Infokeg;

use App\Pengumuman;

use App\Visitor;

use App\User;

use DB;   

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota=Anggota::all()->count('nama_anggota');
        $infokeg=Infokeg::all()->count('nama_kegiatan');
        $pengumuman=Pengumuman::all()->count('judul_pengumuman');
        $tahun = date('Y');
        $judul = "Kegiatan Dalam Tahun ".$tahun;
        $jumlahkegiatan = Infokeg::whereYear('tanggal_kegiatan' ,'=', $tahun)->groupBy(DB::raw('MONTH(tanggal_kegiatan)'))->selectRaw("count(*) as total, tanggal_kegiatan")->get();
        foreach ($jumlahkegiatan as $total) {
        $jmlkegiatan[] = $total->total; 
        $tgl_keg = $total->tanggal_kegiatan;
        $bulan[] = date("M",strtotime($tgl_keg));
        }
        return view('admin/adminite')
        ->with(compact('anggota'))
        ->with(compact('infokeg'))
        ->with(compact('jmlkegiatan'))
        ->with(compact('bulan'))
        ->with(compact('judul'))
        ->with(compact('pengumuman'));
    }
    public function dataadmin()
    {
    $user = User::all();
    return view('dataadmin')
    ->with(compact('user'));    
    }

    public function dataadminhapus($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('dataadmin')->with('msg', 'Data Telah Terhapus');
    }

    public function dataadmincari(Request $request)
    {
        $cari = $request->search;
        $user = User::where('name','LIKE','%'.$cari.'%')->paginate(5);
        return view('/dataadmin', ['user' => $user]);
    }
}
