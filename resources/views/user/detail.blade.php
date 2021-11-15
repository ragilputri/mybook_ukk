@extends('layout.landing-page')
@section('content')

<br><br><br>
<br><br><br>

<div class="d-flex justify-content-end">
<img src="{{ asset ('images/'. $data_buku->gambar) }}" height="370px" width="500px" style="object-fit: contain;">
<div class="card " style="width: 50rem;">
    <div class="card-body ">
        <h2>{{$data_buku->judul}}</h2><br>
        <span class="text-secondary">Detail</span>
        <font size="4">
        <table style="font-size">
            <tr>
                <td>Pengarang</td>
                <td>&emsp;:</td>
                <td>&emsp;{{$data_buku->pengarang}}</td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>&emsp;:</td>
                <td>&emsp;{{$data_buku->penerbit}}</td>
            </tr>
            </table>
        </font>
        <br>
        <span class="text-secondary">Bagikan</span><br>
        <div class=" expanded button-group">
            <a href="http://twitter.com/share?source=sharethiscom" target="_blank" class="btn" style="background-color:#00acee;">Twitter</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn" style="background-color:#3b5998;">Facebook</a>
            <a href="https://mail.google.com/mail/u/2/#sent?compose=VpCqJXKKPxMPsdZvNsRhNWgbnzlfBCxPxmhdWPmxGVSJKGrwrBZGDSVTDdbcCbcRkNxZtjQ" class="btn" style="background-color:#BB001B;">Gmail</a>
        </div><br><br>
        <div class="d-grid gap-2 mx-auto">
            <a href="{{url('user-pinjam/'.$data_buku->id)}}" class="btn btn-primary">Pinjam</a>
        </div>
    </div>
</div>
</div>
<br><br><br>

<h5 class="text-secondary">Buku Lainnya</h5>
<div class="list-group">
@foreach($buku as $buku)
    @if($buku->id != $data_buku->id)
    <a href="{{ url('detail/'.$buku->id) }}" style="text-decoration:none">
    <div class="list-group-item list-group-item-action">
        <table>
            <tr>
                <td><img src="{{ asset ('images/'.$buku->gambar) }}" alt="" height="150px" width="100px" style="object-fit: contain;"></td>
                <td valign=top>
                    <h4>&emsp;{{$buku->judul}}</h4><br>
                    <p>&emsp;Pengarang
                    &emsp;:
                    &emsp;{{$buku->pengarang}}</p>
                    <p> &emsp;Penerbit
                    &emsp; &emsp;:
                    &emsp;{{$buku->penerbit}}</p>
                </td>
            </tr>
        </table>
    </div>
    </a>
    @endif
@endforeach
</div>

@stop
