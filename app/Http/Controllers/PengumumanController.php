<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman/pengumuman', ['pengumuman' => $pengumuman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
     return view('pengumuman/pengumuman_tambah');
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
            'judul_pengumuman' => 'required',
            'konten_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'tambahan' => 'required'
        ]);

        foreach ($request->file('tambahan') as $image) {
            $namafile = $image->getClientOriginalName();
            $namaasli = pathinfo($namafile, PATHINFO_FILENAME);
            $ekstensi = $image->getClientOriginalExtension();
            $tujuan_upload = 'data_file';
            $namafoto = $namaasli."_".$request->judul_pengumuman.".".$ekstensi;
            $image->move($tujuan_upload,$namafoto);
            $data[] = $namafoto;
        }

        

        Pengumuman::create([
            'judul_pengumuman' => $request->judul_pengumuman,
            'konten_pengumuman' => $request->konten_pengumuman,
            'tanggal_pengumuman' => $request->tanggal_pengumuman,
            'tambahan' => $namafoto = json_encode($data)
        ]);
        return redirect('pengumuman')->with('msg', 'Data Telah Tersimpan');
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
        $pengumuman = Pengumuman::where('id', $id)->first();
        return view('pengumuman/pengumuman_edit', ['pengumuman' => $pengumuman]);
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
            'judul_pengumuman' => 'required',
            'konten_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'tambahan' => 'required'
        ]);

        $pengumuman = Pengumuman::where('id', $id)->first();
        $image = json_decode($pengumuman->tambahan);
        $length = count($image);
        for ($i = 0; $i < $length; $i++) {
           unlink(public_path("data_file/".$image[$i]));
       }

       foreach ($request->file('tambahan') as $image) {
        $namafile = $image->getClientOriginalName();
        $namaasli = pathinfo($namafile, PATHINFO_FILENAME);
        $ekstensi = $image->getClientOriginalExtension();
        $tujuan_upload = 'data_file';
        $namafoto = $namaasli."_".$request->judul_pengumuman.".".$ekstensi;
        $image->move($tujuan_upload,$namafoto);
        $data[] = $namafoto;
    }

    $pengumuman->judul_pengumuman = $request->judul_pengumuman;
    $pengumuman->konten_pengumuman = $request->konten_pengumuman;
    $pengumuman->tanggal_pengumuman = $request->tanggal_pengumuman;
    $pengumuman->tambahan = $namafoto = json_encode($data);
    $pengumuman->save();
    return redirect('pengumuman')->with('msg', 'Data Telah Teredit');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();
        $image = json_decode($pengumuman->tambahan);
        $length = count($image);
        for ($i = 0; $i < $length; $i++) {
         unlink(public_path("data_file/".$image[$i]));
     }
     $pengumuman->delete();
     return redirect('pengumuman')->with('msg', 'Data Telah Terhapus');
 }
}
