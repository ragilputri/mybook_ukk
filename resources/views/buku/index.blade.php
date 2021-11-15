@extends('layout.layout')
@section('title', 'Index Buku')
@section('menu', 'Buku')
@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/book"><button type="button" class="close" data-dismiss="alert">×</button></a>
	<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
	</div>
@endif

<div class="card">
    <div class="card-header">
        Daftar Buku
    </div>
    <div class="card-body">
        <form>
            @csrf
        <div class="input-group align-right">
            <div class="form-outline">
                <input type="search" id="myInput" class="form-control" placeholder="Search..." />
            </div>
            <button name="btn" value="1" type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myCard div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>
        <br>
        <a href="/book-create"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
        <div class="cards" id="myCard">
        @foreach($data_buku as $buku)
        <div class="card" style="width: 18rem;">
            <img src="images/{{$buku->gambar}}" class="card-img-top" alt="img" height="250px" style="object-fit: contain;">
            <div class="card-body">
                <h5 class="card-title">{{$buku->judul}}</h5>
                <br>
                <span class="text-secondary">Detail</span>
                <font size="4">
                <table style="font-size">
                <tr>
                    <td>Pengarang</td>
                    <td>&emsp;:</td>
                    <td>&emsp;{{$buku->pengarang}}</td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>&emsp;:</td>
                    <td>&emsp;{{$buku->penerbit}}</td>
                </tr>
                </table>
                </font>
                <br>
                <a href="{{ url('book-edit/'.$buku->id) }}" class="btn btn-warning">Edit</a>&emsp;
                <a href="{{ url('book-delete/'.$buku->id) }}" class="btn btn-danger" onclick="return confirm('Yakin Menghapus data ini?')">Hapus</a>
            </div>
        </div>
        @endforeach
        </div>
        <div style="margin-left: 45%;">
            {{ $data_buku -> appends(Request::all()) -> links() }}
        </div>
    </div>
</div>
@stop

