<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Session;

class BukuController extends Controller
{
    public function index(){
        $data_buku = Buku::orderBy('created_at', 'desc')->paginate(8);;
        return view('buku.index')
            ->with("data_buku", $data_buku);
    }

    public function create(){
        return view('buku.create');
    }

    public function edit($id){
        $data_buku = Buku::find($id);
        return view('buku.edit')
            ->with("data_buku",$data_buku);
    }

    public function update($id, Request $request){

        $data_buku = Buku::find($id);
        $data_buku->judul = $request->input("judul");
        $data_buku->pengarang = $request->input("pengarang");
        $data_buku->penerbit = $request->input("penerbit");

        if($request->file('gambar')== ""){
            $data_buku->gambar = $data_buku->gambar;
        }else{
            $imgName = $request->gambar->getClientOriginalName() . '-' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imgName);
            $data_buku->gambar = $imgName;
        }

        $data_buku->save();
            if($data_buku){
                Session::flash('sukses','Data Berhasil Diubah');
                return redirect('/book')
                    ->with("data_buku",$data_buku);
            }else{
                Session::flash('gagal','Gagal Mengubah Data');
                return redirect('/book');
            }

    }

    public function save(Request $request){
        $imgName = $request->gambar->getClientOriginalName() . '-' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imgName);

        $data_buku = Buku::create([
            "judul"=>$request->input("judul"),
            "gambar"=>$imgName,
            "pengarang"=>$request->input("pengarang"),
            "penerbit"=>$request->input("penerbit")
        ]);

        if($data_buku){
            Session::flash('sukses','Data Berhasil Ditambahkan');
            return redirect('/book')
                ->with("data_buku",$data_buku);
        }else{
            Session::flash('gagal','Gagal Menambahkan Data');
            return redirect('/book');
        }
    }

    public function delete($id){
        $data_buku = Buku::find($id);
        $data_buku->delete();
        if($data_buku){
            Session::flash('sukses','Data Berhasil Dihapus');
            return redirect('/book')
                ->with("data_buku",$data_buku);
        }else{
            Session::flash('gagal','Gagal Menghapus Data');
            return redirect('/book');
        }
    }
}
