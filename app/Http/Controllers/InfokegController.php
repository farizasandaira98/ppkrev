<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infokeg;

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
     $infokeg = Infokeg::where('id', $id)->first();
     $image[] = array($infokeg->foto_kegiatan);
     foreach ($image as $image) {
        unlink(public_path("data_file/".json_decode($image)));
     }
     $infokeg->delete();
     return redirect('infokeg')->with('msg', 'Data Telah Terhapus');
 }
}
