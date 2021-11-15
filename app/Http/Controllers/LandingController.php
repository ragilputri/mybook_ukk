<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use App\Buku;
use App\User;
use App\Pinjaman;
use Session;

class LandingController extends Controller
{
    use SerializesModels;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));
        } else {
            $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
        }

        $data_buku = Buku::all();

        return view('user.landingpage')
            ->with('data_user',$data_user)
            ->with('data_buku', $data_buku)
            ->with('request', $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id)
    {
        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));
        } else {
            $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
        }

        $data_buku = Buku::find($id);
        $buku = Buku::all();
        return view('user.detail')
            ->with('request', $request)
            ->with('data_user', $data_user)
            ->with('buku', $buku)
            ->with('data_buku', $data_buku);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile($id, Request $request)
    {
        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));
        } else {
            $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
        }

        $data_user = User::find($id);
        $data_buku = Buku::all();
        $data_pinjaman = DB::table('pinjamen')
            ->join('users', 'users.id', '=', 'pinjamen.id_user')
            ->join('buku', 'buku.id', '=', 'pinjamen.id_buku')
            ->select('users.*', 'buku.*', 'pinjamen.*')
            ->get();
        return view('user.profile')
            ->with('request', $request)
            ->with('data_user', $data_user)
            ->with('data_pinjaman', $data_pinjaman);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));
        } else {
            $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
        }

        return view('user.contact')
            ->with('request', $request)
            ->with('data_user', $data_user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buku(Request $request)
    {
        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));
        } else {
            $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
        }

        $data_buku = Buku::all();
        return view('user.buku')
        ->with('request', $request)
        ->with('data_user', $data_user)
        ->with('data_buku', $data_buku);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_pinjam(Request $request, $id)
    {
        $data_buku = Buku::find($id);

        if($request->session()->has('id')) {
            $data_user = User::find($request->session()->get('id'));

            return view('user.user-pinjam')
                ->with('request', $request)
                ->with('data_user',$data_user)
                ->with('data_buku', $data_buku);

        } else {
            return redirect(url('login-pinjam/'.$data_buku->id));
        }

    }

    // public function form_pinjam($id, $id2, Request $request){

    //     if($request->session()->has('id')) {
    //         $data_user = User::find($request->session()->get('id'));
    //     } else {
    //         $data_user = '<a href="/login" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Login</a>';
    //     }

    //     $data_buku = Buku::find($id);
    //     $data_user = User::find($id2);

    //     return view('user.user-pinjam')
    //     ->with('request', $request)
    //     ->with('data_user',$data_user)
    //     ->with('data_buku', $data_buku);

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login_pinjam($id)
    {
        $data_buku = Buku::find($id);
        return view('user.login-pinjam')
        ->with('data_buku', $data_buku);

    }

    public function validasi(Request $request, $id){
        $data_buku = Buku::find($id);
        $data_user = User::where('email', $request->input('email'))
                                ->first();

        if($data_user){

            if(Hash::check($request->input('password'), $data_user->password)){
                Auth::loginUsingId($data_user->id);
                $request->session()->put('id', $data_user->id);
                if($data_user->account_status == '1'){
                    return redirect('/book');
                }
                if($data_user->account_status  == '2'){
                    return view('user.user-pinjam')
                        ->with('request', $request)
                        ->with('data_user',$data_user)
                        ->with('data_buku', $data_buku);
                }

            } else{
                Session::flash('gagal','Ooops, Kata sandi salah');
                return redirect('/login');
            }

        } else{
            Session::flash('gagal','Maaf, email belum terdaftar');
            return redirect('/login');
        }
    }

    public function simpan(Request $request, $id){
        $data_user = User::find($id);

        $data_pinjaman = Pinjaman::create([
            "id_user"=>$request->input("id_user"),
            "id_buku"=>$request->input("id_buku"),
            "tgl_pinjam"=>$request->input("tgl_pinjam"),
            "status"=>"pinjam",
        ]);

        if($data_pinjaman){
            Session::flash('sukses','Menunggu Persetujuan');
            return redirect(url('profile/'.$data_user->id))
                ->with('data_user',$data_user)
                ->with("data_pinjaman",$data_pinjaman);
        }else{
            Session::flash('gagal','Gagal Memuat Data');
            return redirect('/pinjaman');
        }
    }
}
