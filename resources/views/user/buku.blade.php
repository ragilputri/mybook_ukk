@extends('layout.landing-page')
@section('content')
<br><br><br>
<br><br><br>
<h1 class="d-flex justify-content-center">Kumpulan Buku Menarik</h1>
<h6 class="d-flex justify-content-center">Temukan Buku Kesukaanmu Disini</h6><br>

<form action="" style="center">
<div class="input-group d-flex justify-content-center">
    <div class="form-outline">
        <input type="search" id="myInput" class="form-control" placeholder="Search..." style="width:600px; height:50px;"/>
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
    $("#myCard div").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
});
</script>

<br><br><br>

<div class="row mt-7 mb-7">
    <div class="cards" id="myCard">
    @foreach($data_buku as $buku)
    <div class="card" style="width: 18rem;" >
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
            <div class="d-grid gap-2 mx-auto">
                <a href="{{ url('detail/'.$buku->id) }}" class="btn btn-info">Detail</a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

@stop
