<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset ('css/login.css')}}>
    <title>Login MyBook</title>
</head>
<body>
<div class="center">
      <h1>Login Admin</h1>
      <form action="{{url('validasi/'.$data_buku->id)}}" method="post">
          @csrf
        <div class="txt_field">
          <input type="email" name="email" required >
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required >
          <span></span>
          <label>Password</label>
        </div>
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
            <a href="/login"><button type="button" class="close" data-dismiss="alert">×</button></a>
            <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('gagal'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
            </div>
        @endif
        <input type="submit" value="Login"><br><br>
      </form>
    </div>

</body>
</html>
