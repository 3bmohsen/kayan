<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href={{asset("img/logo.jpg")}}>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href={{asset("css/uf-style.css")}}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <title>تسجيل دخول السكرتيرة</title>
  </head>
<style>
    body{
        font-family: "Cairo", sans-serif;
    }
</style>
<body>
    <div class="uf-form-signin">
      <div class="text-center">
      <a class=" text-light" style="font-weight:bold;">مؤسسة كيان</a>
      <h1 class="text-white h3">تسجيل دخول السكرتيرة</h1>
      </div>
      <form method="POST" action="/DataManager/login">
    @csrf
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input required type="email" class="form-control" name="email" id="email" placeholder="الايميل">
        </div>

        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input required type="password" class="form-control" name="password" id="password" placeholder="الباسورد">
        </div>
        @if($errors->any())
        <div class="alert-danger text-center p-2 m-2" style="color: red;">
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach
    </div>
@endif
        <div class="d-grid mb-4">
          <button type="submit" class="btn uf-btn-primary btn-lg">تسجيل الدخول</button>
        </div>

      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src={{asset("assets/js/popper.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
  </body>
</html>