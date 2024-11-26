<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayan | @yield('title')</title>
    <link rel="icon" type="image/png" href={{asset("img/logo.jpg")}}>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @livewireStyles
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<style>
  *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  html{
    height: 100%;
  }
    body{
        font-family: "Cairo", sans-serif;
        background: url('{{ asset("img/bgg.svg") }}') no-repeat center center fixed;
        background-size: cover;
        background-color: #1d222b;
    }
    h1{
        font-weight: bolder;
    }
    .nav-link{
        font-weight: 700;
    }
    .form-control{
        border: var(--bs-border-width) solid #000000;
    }
    .form-select{
        border: var(--bs-border-width) solid #000000;
    }
    .form-label {
    font-weight: 700;}
    .sb{
        text-decoration: none;
    color: black;
    font-weight: 700;
    }

    .icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  color: #333333;
  background: #dddddd;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
}

.icon-button:active {
  background: #cccccc;
}

.icon-button__badge {
  position: absolute;
  top: -10px;
  right: -10px;
  width: 25px;
  height: 25px;
  background: red;
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}
.navbar-toggler-icon{
  --bs-navbar-toggler-icon-bg:url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

</style>
<body class="d-flex flex-column" style="min-height:100%">
<nav class="navbar navbar-expand-lg bg-body-tertiary text-center sticky-top" dir="rtl" style="background:#21263178  !important">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="/Admins/dashboard" style="font-weight:bold;">مؤسسة كيان</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style=></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item mt-1">
          <a class="nav-link active text-light" href="/Admins/dashboard">الإحصائيات</a>
        </li>

  <li class="nav-item mt-1">
          <a class="nav-link active text-light">صفحة المدير: {{Auth::guard('admins')->user()->name}}</a>
        </li>
      </ul>
      <div class="d-flex justify-content-center text-center ms-lg-auto">
        <a href="/Admin/Logout"><button class="btn btn-danger" type="submit">تسجيل خروج</button></a>
      </div>
    </div>
  </div>
</nav>
<!-- Button trigger modal -->


<!-- Modal -->





@yield('body')

<footer class="mt-auto text-center text-light" tabindex="0" style="background:">
<a style="font-weight: 900;"> © {{ date('Y') }} - All rights reserved to Kayan Foundation | <a style="" class="text-light fw-bolder" href="https://api.whatsapp.com/send?phone=201066067946">Designed By Ahmed Mohsen</a></a>

</footer>
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>
</html>