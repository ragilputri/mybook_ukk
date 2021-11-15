@extends('layout.layout')
@section('title', 'Data Siswa')
@section('menu', 'Data Siswa')
@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/data-siswa"><button type="button" class="close" data-dismiss="alert">×</button></a>
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
        Data Siswa
    </div>
    <div class="card-body">
    <form action="">
        <div class="input-group align-right">
            <div class="form-outline">
                <input type="search" id="myInput" class="form-control" placeholder="Search..." />
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>
        <br>
        <a href="/siswa-create"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
        <br>

        <!-- table-->
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($data_siswa as $siswa)
                <tr>
                <th scope="row">{{$siswa->nis}}</th>
                <td>{{$siswa->nama}}</td>
                <td>{{$siswa->email}}</td>
                <td>{{$siswa->kelas}}</td>
                <td>
                <a href="/siswa-edit/{{$siswa->id}}" class="btn btn-warning"><i class="far fa-edit"></i></a>&emsp;
                <a href="/siswa-delete/{{$siswa->id}}" class="btn btn-danger" onclick="return confirm('Yakin Menghapus data ini?')"><i class="far fa-trash-alt"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>

        <div style="margin-left: 45%;">
            {{ $data_siswa -> appends(Request::all()) -> links() }}
        </div>
    </div>
</div>
@stop

