@extends('layout.landing-page')
@section('content')
<br><br><br>
<br><br><br>
<h1 class="d-flex justify-content-center">Form Peminjaman</h1><br><br>
<div class="card" >
    <div class="card-body ">
    <form action="{{url('simpan-peminjaman/'.$data_user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-10">
        <img src="{{ asset ('images/'.$data_buku->gambar) }}" alt="" height="150px" width="100px" style="object-fit: contain;">
            <input class="form-control" name="id_buku" value="{{$data_buku->id}}" type="hidden">
            <input class="form-control" name="id_user" value="{{$data_user->id}}" type="hidden">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_pinjam">
        </div>
    </div>
    <br><br>
    <div class="col-sm-10" style="padding: 0px 200px">
        <button type="submit" class="btn btn-primary" align="right">Submit</button>
    </div>
    </form>
    </div>
</div>

@stop
