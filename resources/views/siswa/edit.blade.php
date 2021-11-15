@extends('layout.layout')
@section('title', 'Edit Siswa')
@section('menu', 'Siswa')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Data Siswa
    </div>
    <div class="card-body">
    <form action="{{url('siswa-update/'.$data_siswa->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nis" value="{{$data_siswa->nis}}">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" value="{{$data_siswa->nama}}">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="kelas" value="{{$data_siswa->kelas}}">
        </div>
    </div>
    <br><br>
    <div class="col-sm-10" style="padding: 0px 200px">
    <button type="submit" class="btn btn-primary" align="right">Submit</button>
    </div>
    </form>
    </div>
</div>
<br><br>
<a href="/data-siswa"><button type="button" class="btn btn-warning">Back To List</button></a>
@stop

