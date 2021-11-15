@extends('layout.layout')
@section('title', 'Create Buku')
@section('menu', 'Buku')
@section('content')
<div class="card">
    <div class="card-header">
        Create Buku
    </div>
    <div class="card-body">
    <form action="{{url('book-save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="judul">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" name="gambar">
        </div>
    </div>
    <br>
    <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Persediaan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="persediaan">
        </div>
    </div> -->

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="pengarang">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="penerbit">
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

