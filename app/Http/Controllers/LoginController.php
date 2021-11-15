<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    public function authlogin(Request $request){

        $validate_admin = User::where('email', $request->input('email'))
                                ->first();

        if($validate_admin){

            if(Hash::check($request->input('password'), $validate_admin->password)){
                Auth::loginUsingId($validate_admin->id);
                $request->session()->put('id', $validate_admin->id);
                if($validate_admin->account_status == '1'){
                    return redirect('/book');
                }
                if($validate_admin->account_status  == '2'){
                    return redirect('/profile/'.$validate_admin->id);
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

    public function logout(Request $request){
        Auth::logout();
        $request->session()->forget('id');
        return redirect(url('/'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        //
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
        //
    }
}
