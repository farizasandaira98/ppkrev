<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infokeg;
use App\Pengumuman;
use Illuminate\Support\Facades\File;
use PDF;

class InfoKegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infokeg = Infokeg::all();
        return view('/admin/infokeg/infokeg', ['infokeg' => $infokeg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $pengumuman = Pengumuman::all();
        return view('/admin/infokeg/infokeg_tambah')
        ->with(compact('pengumuman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'tanggal_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'foto_kegiatan' => 'required',
            'pengumuman' => 'required'
        ]);

        foreach ($request->file('foto_kegiatan') as $image) {
            $namafile = $image->getClientOriginalName();
            $namaasli = pathinfo($namafile, PATHINFO_FILENAME);
            $ekstensi = $image->getClientOriginalExtension();
            $tujuan_upload = 'data_file';
            $namafoto = $namaasli."_".$request->nama_kegiatan.".".$ekstensi;
            $image->move($tujuan_upload,$namafoto);
            $data[] = $namafoto;
        }

        

        Infokeg::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'foto_kegiatan' => $namafoto = json_encode($data),
            'id_pengumuman' => $request->pengumuman
            
        ]);
        return redirect('infokeg')->with('msg', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $pengumuman = Pengumuman::all();
        $infokeg = Infokeg::where('id', $id)->first();
        return view('/admin/infokeg/infokeg_edit', ['infokeg' => $infokeg])
        ->with(compact('pengumuman'));
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
       $this->validate($request,[
        'nama_kegiatan' => 'required',
        'deskripsi' => 'required',
        'tanggal_kegiatan' => 'required',
        'tempat_kegiatan' => 'required',
        'foto_kegiatan' => 'required',
        'pengumuman' => 'required'
    ]);

       $infokeg = Infokeg::where('id', $id)->first();
       $image = json_decode($infokeg->foto_kegiatan);
       $length = count($image);
       for ($i = 0; $i < $length; $i++) {
           unlink(public_path("data_file/".$image[$i]));
       }

       foreach ($request->file('foto_kegiatan') as $image) {
        $namafile = $image->getClientOriginalName();
        $namaasli = pathinfo($namafile, PATHINFO_FILENAME);
        $ekstensi = $image->getClientOriginalExtension();
        $tujuan_upload = 'data_file';
        $namafoto = $namaasli."_".$request->nama_kegiatan.".".$ekstensi;
        $image->move($tujuan_upload,$namafoto);
        $data[] = $namafoto;
    }

    $infokeg->nama_kegiatan = $request->nama_kegiatan;
    $infokeg->deskripsi = $request->deskripsi;
    $infokeg->tanggal_kegiatan = $request->tanggal_kegiatan;
    $infokeg->tempat_kegiatan = $request->tempat_kegiatan;
    $infokeg->foto_kegiatan = $namafoto = json_encode($data);
    $infokeg->id_pengumuman = $request->pengumuman;
    $infokeg->save();
    return redirect('infokeg')->with('msg', 'Data Telah Teredit');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $infokeg = Infokeg::where('id', $id)->first();
       $image = json_decode($infokeg->foto_kegiatan);
       $length = count($image);
       for ($i = 0; $i < $length; $i++) {
           unlink(public_path("data_file/".$image[$i]));
       }
       $infokeg->delete();
       return redirect('infokeg')->with('msg', 'Data Telah Terhapus');
   }
   public function search(Request $request)
   {
    $cari = $request->search;
    $caritanggal = $request->datekeg;
    $caritanggalakhir = $request->datekeg2;
    if (isset($cari)) {
        $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$cari.'%')
        ->paginate(5);
    }elseif (isset($cari)&&isset($caritanggal)&&isset($caritanggalakhir)) {
        $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$cari.'%')
        ->orWhere('tanggal_kegiatan', 'between', $caritanggal,'and',$caritanggalakhir)
        ->paginate(5);
    }elseif (isset($caritanggal)&&isset($caritanggalakhir)) {
        $infokeg = Infokeg::whereBetween('tanggal_kegiatan', [$caritanggal, $caritanggalakhir])
        ->paginate(5);
    }elseif (isset($cari)&&isset($caritanggalakhir)) {
       $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$cari.'%')
        ->orWhere('tanggal_kegiatan', 'like', '%'.$caritanggalakhir.'%')
        ->paginate(5);
    }elseif (isset($cari)&&isset($caritanggal)) {
        $infokeg = Infokeg::where('nama_kegiatan', 'like', '%'.$cari.'%')
        ->orWhere('tanggal_kegiatan', 'like', '%'.$caritanggal.'%')
        ->paginate(5);
    }elseif (isset($caritanggal)) {
        $infokeg = Infokeg::where('tanggal_kegiatan', 'like', '%'.$caritanggal.'%')
        ->paginate(5);
        //dd($infokeg);
    }elseif (isset($caritanggalakhir)) {
        $infokeg = Infokeg::where('tanggal_kegiatan', 'like', '%'.$caritanggalakhir.'%')
        ->paginate(5);
    }
    return view('/admin/infokeg/infokeg', ['infokeg' => $infokeg]);
}

    public function cetak_pdf()
    {
        $infokeg = Infokeg::all();
        $pdf = PDF::loadview('/admin/infokeg/infokeg_pdf',['infokeg'=>$infokeg]);
        return $pdf->stream();
    }
}
