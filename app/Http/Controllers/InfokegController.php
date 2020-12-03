<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infokeg;
use Illuminate\Support\Facades\File;

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
        return view('infokeg/infokeg', ['infokeg' => $infokeg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('infokeg/infokeg_tambah');
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
            'tanggal_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'foto_kegiatan' => 'required'
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
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'foto_kegiatan' => $namafoto = json_encode($data)
        ]);
        return redirect('infokeg')->with('msg', 'Data Telah Tersimpan');
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
        $infokeg = Infokeg::where('id', $id)->first();
        return view('infokeg/infokeg_edit', ['infokeg' => $infokeg]);
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
            'tanggal_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'foto_kegiatan' => 'required'
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
    $infokeg->tanggal_kegiatan = $request->tanggal_kegiatan;
    $infokeg->tempat_kegiatan = $request->tempat_kegiatan;
    $infokeg->foto_kegiatan = $namafoto = json_encode($data);
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
}
