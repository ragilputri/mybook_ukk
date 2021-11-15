<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pinjaman;
use App\Siswa;
use App\Buku;
use App\User;
use Session;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pinjaman = DB::table('pinjamen')
            ->join('users', 'users.id', '=', 'pinjamen.id_user')
            ->join('buku', 'buku.id', '=', 'pinjamen.id_buku')
            ->select('users.*', 'buku.*', 'pinjamen.*')
            ->orderBy('pinjamen.created_at', 'desc')
            ->paginate(5);
        return view('pinjaman.index')
            ->with('data_pinjaman', $data_pinjaman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = User::all();
        $data_buku = Buku::all();

        return view('pinjaman.create')
            ->with('data_user', $data_user)
            ->with('data_buku', $data_buku);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data_pinjaman = Pinjaman::create([
            "id_user"=>$request->input("id_user"),
            "id_buku"=>$request->input("id_buku"),
            "tgl_pinjam"=>$request->input("tgl_pinjam"),
            "pernyataan"=>$request->input("pernyataan"),
            "status"=>"pinjam",
        ]);

        if($data_pinjaman){
            Session::flash('sukses','Data Berhasil Ditambahkan');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Menambahkan Data');
            return redirect('/pinjaman');
        }
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
        $data_pinjaman = Pinjaman::find($id);
        $data_user = User::all();
        $data_buku = Buku::all();
        // $data_pinjaman = DB::table('pinjamen')
        //     ->join('siswas', 'siswas.id', '=', 'pinjamen.id_siswa')
        //     ->join('buku', 'buku.id', '=', 'pinjamen.id_buku')
        //     ->select('siswas.*', 'buku.*', 'pinjamen.*')
        //     ->get();
        return view('pinjaman.edit')
            ->with('data_user', $data_user)
            ->with('data_buku', $data_buku)
            ->with('data_pinjaman', $data_pinjaman);
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
        $data_pinjaman = Pinjaman::find($id);
        $data_pinjaman->id_user = $request->input("id_user");
        $data_pinjaman->id_buku = $request->input("id_buku");
        $data_pinjaman->tgl_pinjam = $request->input("tgl_pinjam");

        $data_pinjaman->save();

        if($data_pinjaman){
            Session::flash('sukses','Data Berhasil Diubah');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Mengubah Data');
            return redirect('/pinjaman');
        }


    }

    public function kembali(Request $request, $id){

        $data_pinjaman = Pinjaman::find($id);
        $data_pinjaman->tgl_kembali = $request->input("tgl_kembali");
        $data_pinjaman->keterangan = $request->input("keterangan");
        $data_pinjaman->status = "Selesai";

        $data_pinjaman->save();

        if($data_pinjaman){
            Session::flash('sukses','Buku Telah Dikembalikan');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Memuat Data');
            return redirect('/pinjaman');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data_pinjaman = Pinjaman::find($id);
        $data_pinjaman->delete();

        if($data_pinjaman){
            Session::flash('sukses','Data Berhasil Ditambahkan');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Menambahkan Data');
            return redirect('/pinjaman');
        }
    }

    public function setuju(Request $request, $id)
    {
        $data_pinjaman = Pinjaman::find($id);
        $data_pinjaman->pernyataan="Diterima";
        $data_pinjaman->save();

        if($data_pinjaman){
            Session::flash('sukses','Data Telah Diterima');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Memuat Data');
            return redirect('/pinjaman');
        }


    }

    public function tolak(Request $request, $id)
    {
        $data_pinjaman = Pinjaman::find($id);
        $data_pinjaman->pernyataan="Ditolak";

        $data_pinjaman->save();

        if($data_pinjaman){
            Session::flash('sukses','Data Telah Ditolak');
            return redirect('/pinjaman')
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Memuat Data');
            return redirect('/pinjaman');
        }


    }
}
