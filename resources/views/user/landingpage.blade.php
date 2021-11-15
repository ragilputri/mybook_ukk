@extends('layout.landing-page')
@section('content')
<br><br><br>

<div class="row mt-5 mb-5">

    <div class="col-lg-12 gambar">
        <img src={{ asset ('assets/vector-konten.png') }} width="100%">
    </div>

    <div class="col-sm-12 position-relative p-4">

        <div class="position-absolute top-0 end-0">
            <img src={{ asset ('image/ilus.svg') }} class="img" height="20%">
        </div>

        <h1 class="display-1 text-truncate tebel-sedang judul1">Jelajah</h1>
        <h1 class="display-1 text-truncate tebel-sedang judul2">Literasi</h1>
        <div class="hr"></div>

        <div class="desc mt-4">
            <p style="font-size:24px;">Temukan semua buku kesukaan kamu pada perpustakaan MyBook
            </p>
        </div>

        <div class="mt-5">
            <a href="/login" class="button rounded-pill shadow tebel-sedang">Login</a>
        </div>

        <br>

    </div>

</div>

<!-- search -->
<br><br><br>
<hr>
<br>
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
            <div class="d-grid gap-2 mx-auto">
                <a href="{{ url('detail/'.$buku->id) }}" class="btn btn-info">Detail</a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>
<br><br><br>

<h1 class="d-flex justify-content-center">Kontak</h1><br><br>

    <!--Contact-->
<div class="d-flex justify-content-end">
<img src={{ asset ('image/message.svg') }} height="350px" width="500px">
<div class="card " style="width: 50rem;">
    <div class="card-body ">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Submit</button>
        </div>
    </div>
</div>
</div>

@stop
