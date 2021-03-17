<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;

use PDF;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('/admin/anggota/anggota', ['anggota' => $anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('/admin/anggota/anggota_tambah');
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
            'id_anggota' => 'required',
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'status_anggota' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $ekstensi = $request->file('foto')->getClientOriginalExtension();
        $tujuan_upload = 'data_file';
        $namafoto = $request->id_anggota.".".$ekstensi;
        $file->move($tujuan_upload,$namafoto);

        Anggota::create([
            'id_anggota' => $request->id_anggota,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'status_anggota' => $request->status_anggota,
            'foto' => $namafoto
        ]);
        return redirect('anggota')->with('msg', 'Data Telah Tersimpan');
    }   



    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::where('id', $id)->first();
        return view('/admin/anggota/anggota_edit', ['anggota' => $anggota]);
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
            'id_anggota' => 'required',
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'status_anggota' => 'required',
            'foto' => 'required']);

        $anggota = Anggota::where('id', $id)->first();

        unlink(public_path("data_file/".$anggota->foto));

        $ekstensi = $request->file('foto')->getClientOriginalExtension();
        $file = $request->file('foto');
        $namafoto = $request->id_anggota.".".$ekstensi;

        $anggota->id_anggota = $request->id_anggota;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->no_telp = $request->no_telp;
        $anggota->status_anggota = $request->status_anggota;
        $anggota->foto = $namafoto;
        $anggota->save();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$namafoto);

        return redirect('anggota')->with('msg', 'Data Telah Teredit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::where('id', $id)->first();
        unlink(public_path("data_file/".$anggota->foto));
        $anggota->delete();
        return redirect('anggota')->with('msg', 'Data Telah Terhapus');
    }

    public function search(Request $request)
    {
        $cari = $request->search;
        $anggota = Anggota::where('nama_anggota','LIKE','%'.$cari.'%')->orWhere('id_anggota',$cari)->paginate(5);
        //$anggota = Anggota::all();
        return view('/admin/anggota/anggota', ['anggota' => $anggota]);
    }

    public function cetak_pdf()
    {
        $anggota = Anggota::all();
        $pdf = PDF::loadview('/admin/anggota/anggota_pdf',['anggota'=>$anggota]);
        return $pdf->stream();
    }
}
