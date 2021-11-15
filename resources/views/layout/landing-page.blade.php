<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href={{ asset ('css/navbar.css') }}>
    <link rel="stylesheet" href={{ asset ('css/body.css') }}>
    <link rel="stylesheet" href={{ asset ('css/responsive.css') }}>
    <link rel="stylesheet" href={{ asset ('css/style.css') }}>

    <title>Landing Page ~ MyBook</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm p-3 mb-5 bg-body rounded" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src={{ asset ('image/logo2.png') }} height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link link-navbar tebel-sedang {{Request::is('/') ? 'bg-active' : ''}}" href="/">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-navbar tebel-sedang {{Request::is('daftar-buku') ? 'bg-active' : ''}}" href="/daftar-buku">Daftar Buku &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-navbar tebel-sedang {{Request::is('contact') ? 'bg-active' : ''}}" href="/contact">Contact &nbsp;&nbsp;</a>
                    </li>
                    @if($request->session()->has('id'))
                    <li class="nav-item">
                        <a href="/profile/{{$data_user->id}}" class="nav-link bg-custom tebel-sedang shadow" id="btn-sign">Profile</a>
                    </li>
                    @else
                        @php
                            echo $data_user;
                        @endphp
                    @endif
                </ul>


            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">
        @yield('content')

        <!-- Footer -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="text-muted">&copy; 2021 Ragil Putri Rahmadani, XII RPL 5</span>
            </div>
        </footer>

    </div>

  </body>
</html>
