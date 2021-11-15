@extends('layout.layout')
@section('title', 'Pinjaman')
@section('menu', 'Pinjaman')
@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/pinjaman"><button type="button" class="close" data-dismiss="alert">×</button></a>
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
        Pinjaman
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
        <a href="/pinjaman-create"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
        <br>

        <!-- table-->
        <table class="table table-hover">
            <thead>
                <tr>
                <th>Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Persetujuan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($data_pinjaman as $pinjam)
                <tr>
                <td>{{$pinjam->created_at}}</td>
                <td>{{$pinjam->name}}</td>
                <td>{{$pinjam->judul}}</td>
                <td>{{$pinjam->tgl_pinjam}}</td>
                <td> @if($pinjam->tgl_kembali == null)
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cek-{{$pinjam->id}}"><i class="fas fa-exclamation-triangle"></i></button>
                    @elseif($pinjam->tgl_kembali != null)
                    {{$pinjam->tgl_kembali}}
                    @endif
                </td>
                <td>@if($pinjam->status == "Selesai")
                    <span class="badge rounded-pill bg-info text-dark">{{$pinjam->status}}</span>
                    @elseif($pinjam->status == "pinjam")
                    <span class="badge rounded-pill bg-secondary text-dark">{{$pinjam->status}}</span>
                    @endif
                </td>
                <td>
                    @if($pinjam->pernyataan == null)
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#acc-{{$pinjam->id}}"><i class="fas fa-info-circle"></i></button>
                    @elseif($pinjam->pernyataan != null)
                    {{$pinjam->pernyataan}}
                    @endif
                </td>
                <td>{{$pinjam->keterangan}}</td>
                <td>
                <a href="/pinjaman-edit/{{$pinjam->id}}" class="btn btn-warning"><i class="far fa-edit"></i></a>&emsp;
                <a href="/pinjaman-delete/{{$pinjam->id}}" class="btn btn-danger" onclick="return confirm('Yakin Menghapus data ini?')"><i class="far fa-trash-alt"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-left: 45%;">
            {{ $data_pinjaman -> appends(Request::all()) -> links() }}
        </div>
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal Persetujuan -->
@foreach($data_pinjaman as $pinjam)
<div class="modal fade" id="acc-{{$pinjam->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Persetujuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table style="font-size">
            <tr>
                <td>Nama</td>
                <td>&emsp; : </td>
                <td>&emsp;{{$pinjam->name}}</td>
            </tr>
            <tr>
                <td>Buku Pinjam</td>
                <td>&emsp; : </td>
                <td>&emsp;<img src="images/{{$pinjam->gambar}}" class="card-img-top" alt="{{$pinjam->judul}}" height="200px" style="object-fit: contain;"></td>
            </tr>
            <tr>
        </table><br>
        Apakah Anda ingin menyetujui peminjaman ini ?
      </div>
      <div class="modal-footer">
        <a href="/tolak/{{$pinjam->id}}" class="btn btn-danger">Tolak</a>
        <a href="/setuju/{{$pinjam->id}}" class="btn btn-primary">Setuju</a>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach


<!-- Modal Cek -->
@foreach($data_pinjaman as $pinjam)
<div class="modal fade" id="cek-{{$pinjam->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{url('pinjaman-kembali/'.$pinjam->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table style="font-size">
            <tr>
                <td>Nama</td>
                <td>&emsp; : </td>
                <td>&emsp;{{$pinjam->name}}</td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>&emsp; : </td>
                <td>&emsp;{{$pinjam->tgl_pinjam}}</td>
            </tr>
            <tr>
                <td>Buku</td>
                <td>&emsp; : </td>
                <td>&emsp;<img src="images/{{$pinjam->gambar}}" class="card-img-top" alt="{{$pinjam->judul}}" height="200px" style="object-fit: contain;"></td>
            </tr>
            @if($pinjam->tgl_kembali == null)
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>&emsp; : &emsp;</td>
                <td><input type="date" class="form-control" name="tgl_kembali"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>&emsp; : </td>
                <td>&emsp; <input type="text" class="form-control" name="keterangan"></td>
            </tr>
            @elseif($pinjam->tgl_kembali != null)
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>&emsp; : </td>
                <td>&emsp;{{$pinjam->tgl_kembali}}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>&emsp; : </td>
                <td>&emsp;{{$pinjam->keterangan}}</td>
            </tr>
            @endif
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@stop

