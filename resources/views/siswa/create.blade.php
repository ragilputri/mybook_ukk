@extends('layout.layout')
@section('title', 'Create Siswa')
@section('menu', 'Siswa')
@section('content')
<div class="card">
    <div class="card-header">
        Create Siswa
    </div>
    <div class="card-body">
    <form action="{{url('siswa-save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nis">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="email">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="password">
        <p class="text-danger">*Password yang telah diisi tidak dapat diubah</p>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="kelas">
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

