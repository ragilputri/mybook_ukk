@extends('layout.landing-page')
@section('content')
<br><br><br>
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
