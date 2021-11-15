<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href={{ asset ('css/style.css')}}>
    <title>@yield('title')</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span><img src={{ asset ('image/logo2.png')}} alt="logo" width="170px"></span></h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{url('/book')}}" class="{{Request::path() === 'book' ? 'active' : ''}}"><span class="fas fa-th"></span>
                    <span>Daftar Buku</span></a>
                </li>
                <li>
                    <a href="{{url('/data-siswa')}}" class="{{Request::path() === 'data-siswa' ? 'active' : ''}}"><span class="fas fa-list"></span>
                    <span>Daftar Siswa</span></a>
                </li>
                <li>
                    <a href="{{url('/pinjaman')}}" class="{{Request::path() === 'pinjaman' ? 'active' : ''}}"><span class="fas fa-clipboard-list"></span>
                    <span>Pinjaman</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
                @yield('menu')
            </h1>
            <div class="user-wrapper">
                <a href="/"><button class="btn btn-info" type="button">LandingPage</button></a>&emsp;
                <a href="/logout"><button class="btn btn-danger" type="button">Logout</button></a>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="footer" style="text-align:center;"> © 2021 Ragil Putri - Stematel XII RPL 5
        </footer>
    </div>
</body>
</html>
