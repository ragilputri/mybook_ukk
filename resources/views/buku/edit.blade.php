@extends('layout.layout')
@section('title', 'Edit Buku')
@section('menu', 'Buku')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Buku
    </div>
    <div class="card-body">
    <form action="{{ url('book-update/'.$data_buku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="judul" value="{{$data_buku->judul}}">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
        @if($data_buku->gambar != null)
            <img src="{{ asset('images/'.$data_buku->gambar) }}" alt="img" height="150px" width="100px">
        @endif
        <input type="file" class="form-control" name="gambar" value="{{$data_buku->gambar}}">
        <small class="text-danger">*Biarkan kosong jika tidak merubah gambar</small>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="pengarang" value="{{$data_buku->pengarang}}">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="penerbit" value="{{$data_buku->penerbit}}">
        </div>
    </div>
    <br><br>
    <div class="col-sm-10" style="padding: 0px 250px">
    <button type="submit" class="btn btn-primary" align="right">Submit</button>
    </div>
    </form>
    </div>
</div>
<br><br>
<a href="/book"><button type="button" class="btn btn-warning">Back To List</button></a>
@stop

