@extends('layout.layout')
@section('title', 'Edit Pinjaman')
@section('menu', 'Pinjaman')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Pinjaman
    </div>
    <div class="card-body">
    <form action="{{url('pinjaman-update/'.$data_pinjaman->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <select name="id_user" id="id_user" class="form-control">
            @foreach($data_user as $user)
            @if($user->id == $data_pinjaman->id_user)
            <option value="{{$user->id}}" selected>{{$user->name}}</option>
            @elseif($user->id != $data_pinjaman->id_user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
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
            @if($buku->id == $data_pinjaman->id_buku)
            <option value="{{$buku->id}}" selected>{{$buku->judul}}</option>
            @elseif($buku->id != $data_pinjaman->id_buku)
            <option value="{{$buku->id}}">{{$buku->judul}}</option>
            @endif
            @endforeach
        </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="tgl_pinjam" value="{{$data_pinjaman->tgl_pinjam}}">
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
<a href="/pinjaman"><button type="button" class="btn btn-warning">Back To List</button></a>

@stop

