<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
use App\User;
use Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = DB::table('siswas')
            ->join('users', 'users.name', '=', 'siswas.nama')
            ->select('users.*','siswas.*')
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(5);
        return view('siswa.index')
            ->with("data_siswa",$data_siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data_siswa = Siswa::create([
            "nis"=>$request->input("nis"),
            "nama"=>$request->input("nama"),
            "kelas"=>$request->input("kelas")
        ]);

        $data_user = User::create([
            "name"=>$request->input("nama"),
            "email"=>$request->input("email"),
            'password' => Hash::make($request->input("password")),
            "account_status"=>2,
        ]);

        if($data_siswa and $data_user){
            Session::flash('sukses','Data Berhasil Ditambahkan');
            return redirect('/data-siswa')
                ->with("data_user",$data_user)
                ->with("data_siswa",$data_siswa);
        }else{
            Session::flash('gagal','Gagal Menambahkan Data');
            return redirect('/data-siswa');
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
        $data_siswa = Siswa::find($id);
        return view('siswa.edit')
            ->with("data_siswa",$data_siswa);

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
        $data_siswa = Siswa::find($id);
        $data_siswa->nis = $request->input("nis");
        $data_siswa->nama = $request->input("nama");
        $data_siswa->kelas = $request->input("kelas");

        $data_siswa->save();

        if($data_siswa){
            Session::flash('sukses','Data Berhasil Diubah');
            return redirect('/data-siswa')
                ->with("data_siswa",$data_siswa);
        }else{
            Session::flash('gagal','Gagal Mengubah Data');
            return redirect('/data-siswa');
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
        $data_siswa = Siswa::find($id);
        $data_siswa->delete();
        if($data_siswa){
            Session::flash('sukses','Data Berhasil Dihapus');
            return redirect('/data-siswa')
                ->with("data_siswa",$data_siswa);
        }else{
            Session::flash('gagal','Gagal Menghapus Data');
            return redirect('/data-siswa');
        }
    }
}
