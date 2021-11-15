@extends('layout.layout')
@section('title', 'Create Pinjaman')
@section('menu', 'Pinjaman')
@section('content')
<div class="card">
    <div class="card-header">
        Create Pinjaman
    </div>
    <div class="card-body">
    <form action="{{url('pinjaman-save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <select name="id_user" id="id_user" class="form-control">
            @foreach($data_user as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-10">
        <select name="id_buku" id="id_buku" class="form-control">
            @foreach($data_buku as $buku)
            <option value="{{$buku->id}}">{{$buku->judul}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="tgl_pinjam">
        </div>
    </div>
    <br>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pernyataan" value="Diterima" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
            Diterima
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pernyataan" value="Ditolak" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
            Ditolak
        </label>
    </div>
    <br><br>
    <div class="col-sm-10" style="padding: 0px 200px">
    <button type="submit" class="btn btn-primary" align="right">Submit</button>
    </div>
    </form>
    </div>
</div>
<br><br>
<a href="/pinjaman"><button type="button" class="btn btn-warning">Back To List</button></a>

@stop

