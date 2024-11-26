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
        background: url('{{ asset("img/bgg2.svg") }}') no-repeat center center fixed;
        background-size: cover;
    }
    .table{
      --bs-table-bg: #ffffff45;
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

</style>
<body class="d-flex flex-column" style="min-height:100%">
<nav class="navbar navbar-expand-lg bg-body-tertiary text-center sticky-top" dir="rtl" style="background-color: #2980b999 !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="/ShowClients" style="font-weight:bold;">مؤسسة كيان</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">العملاء</a>
          <ul class="dropdown-menu ">
            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addmission">إضافة / حذف مأمورية</button></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/AddClient">إضافة عميل</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ShowClients">عرض العملاء</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            الموظفين
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/AddEmployee">إضافة موظف</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ShowEmployees">عرض الموظفين</a></li>
          </ul>
        </li>

        <li class="nav-item d-flex justify-content-center align-items-center m-2">
          <button type="button" class=" nav-link icon-button"data-bs-toggle="modal" data-bs-target="#exampleModal">

    <span class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512.017 512.017" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#ffa81c" d="M256.3 512.012h-.382c-33.508 0-60.768-27.261-60.768-60.769v-14.2c0-8.284 6.716-15 15-15h91.918c8.284 0 15 6.716 15 15v14.2c0 33.509-27.261 60.769-60.768 60.769z" opacity="1" data-original="#ffa81c"></path><path fill="#ff9300" d="M302.068 422.044h-45.959v89.969h.191c33.508 0 60.768-27.261 60.768-60.769v-14.2c0-8.285-6.716-15-15-15z" opacity="1" data-original="#ff9300" class=""></path><path fill="#ffa81c" d="M286.093 93.76h-59.969c-8.284 0-15-6.716-15-15V44.997c0-24.805 20.18-44.984 44.984-44.984s44.984 20.18 44.984 44.984V78.76c.001 8.284-6.715 15-14.999 15z" opacity="1" data-original="#ffa81c"></path><path fill="#ff9300" d="M286.093 93.76c8.284 0 15-6.716 15-15V44.997c0-24.805-20.18-44.984-44.984-44.984V93.76z" opacity="1" data-original="#ff9300" class=""></path><path fill="#ffcf2c" d="M415.057 452.044H97.16c-12.983 0-23.546-10.563-23.546-23.546v-21.446a94.868 94.868 0 0 1 24.354-63.519 64.913 64.913 0 0 0 16.664-43.462v-97.177c0-78.01 63.465-141.475 141.475-141.475s141.475 63.465 141.475 141.475v97.177a64.909 64.909 0 0 0 16.664 43.461 94.864 94.864 0 0 1 24.355 63.519v21.446c.001 12.984-10.561 23.547-23.544 23.547z" opacity="1" data-original="#ffcf2c"></path><path fill="#ffc12e" d="M415.057 452.044c12.983 0 23.546-10.563 23.546-23.546v-21.446a94.864 94.864 0 0 0-24.355-63.519 64.909 64.909 0 0 1-16.664-43.461v-97.177c0-78.01-63.465-141.475-141.475-141.475v390.624z" opacity="1" data-original="#ffc12e" class=""></path><path fill="#fff566" d="M73.615 407.052v21.446c0 12.983 10.563 23.546 23.546 23.546h317.896c12.983 0 23.546-10.563 23.546-23.546v-21.446a95.018 95.018 0 0 0-4.844-29.978h-355.3a95.018 95.018 0 0 0-4.844 29.978z" opacity="1" data-original="#fff566"></path><path fill="#ffe645" d="M256.109 377.074v74.969h158.948c12.983 0 23.546-10.563 23.546-23.546v-21.446a95.018 95.018 0 0 0-4.844-29.978h-177.65z" opacity="1" data-original="#ffe645"></path><path fill="#ff8b6e" d="M15.018 165.672a15.01 15.01 0 0 1-3.18-.341c-8.098-1.748-13.245-9.73-11.497-17.828C12.353 91.864 43.008 40.753 86.658 3.584c6.308-5.371 15.775-4.61 21.145 1.696 5.371 6.308 4.612 15.774-1.696 21.145-38.664 32.923-65.812 78.171-76.442 127.409-1.517 7.031-7.735 11.838-14.647 11.838z" opacity="1" data-original="#ff8b6e"></path><path fill="#ff674f" d="M496.999 165.672c-6.913 0-13.129-4.806-14.647-11.837-10.63-49.238-37.778-94.486-76.441-127.408-6.308-5.371-7.067-14.838-1.696-21.145 5.37-6.308 14.836-7.068 21.145-1.696 43.65 37.167 74.304 88.279 86.316 143.918 1.748 8.098-3.399 16.08-11.497 17.828-1.066.229-2.131.34-3.18.34z" opacity="1" data-original="#ff674f" class=""></path><path fill="#ff8b6e" d="M72.689 183.22c-.919 0-1.851-.085-2.787-.261-8.142-1.53-13.501-9.371-11.971-17.512 8.233-43.81 31.321-84.278 65.009-113.949 6.216-5.477 15.695-4.874 21.17 1.342 5.476 6.217 4.874 15.695-1.342 21.17-28.691 25.271-48.35 59.711-55.354 96.977-1.354 7.207-7.651 12.233-14.725 12.233z" opacity="1" data-original="#ff8b6e"></path><path fill="#ff674f" d="M439.328 183.221c-7.075 0-13.371-5.026-14.725-12.232-7.004-37.265-26.661-71.706-55.352-96.976-6.217-5.476-6.817-14.954-1.342-21.171 5.476-6.216 14.954-6.817 21.171-1.342 33.686 29.671 56.773 70.138 65.006 113.947 1.53 8.142-3.83 15.982-11.972 17.512-.934.177-1.867.262-2.786.262z" opacity="1" data-original="#ff674f" class=""></path></g></svg></span>
        @livewire('notreaded') 
  </button>
        </li>
        @if (Auth::guard('admins')->check())
        <li class="nav-item">
          <a class="nav-link active" href="/Admins/dashboard"><button class="btn btn-dark">لوحة تحكم الادمن</button></a>
        </li>
        @endif

      </ul>
      <div class="d-flex justify-content-center text-center ms-lg-auto">
        <a href="/DataManager/logout"><button class="btn btn-danger" type="submit">تسجيل خروج</button></a>
      </div>
    </div>
  </div>
</nav>
<!-- Button trigger modal -->


<!-- Modal -->
@livewire('notifications') 


<div class="modal" id="addmission" tabindex="-1" aria-labelledby="addmission" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center align-items-center flex-row">
      <h1 class="modal-title fs-5" id="addmission">إضافة مأمورية</h1>
      <button data-bs-toggle="modal" data-bs-target="#delmission" class="btn btn-danger m-1">حذف مأمورية</button>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body d-flex justify-content-center align-items-center text-center">
        <form action="/Missions/Add" method="POST">
          @csrf
          <div class="col-md-12">
            <label for="mission_name" class="form-label">اسم المأمورية</label>
            <input required type="text" class="form-control" id="mission_name" name="mission_name" placeholder="ادخل اسم المأمورية" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="submit" class="btn btn-success">إضافة المأمورية</button>
        </form>

      </div>
    </div>
  </div>
</div>


<div class="modal" id="delmission" tabindex="-1" aria-labelledby="delmission" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center align-items-center flex-row">
      <h1 class="modal-title fs-5" id="delmission">حذف مأمورية</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body d-flex justify-content-center align-items-center text-center">
        <form action="/Missions/Del" method="POST">
          @csrf
          <div class="col-md-12">
            <label for="id" class="form-label">اختر المأمورية المراد حذفها</label>
            <select required name="id" id="id" class="form-control me-2 text-center" aria-label="Search">
              <option  value="">إختر المأمورية</option>
              @foreach ($Missions as $mission)
              <option value="{{$mission->id}}">{{$mission->mission_name}}</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="submit" class="btn btn-danger">حذف المأمورية</button>
        </form>

      </div>
    </div>
  </div>
</div>


@yield('body')

<footer class="mt-auto text-center" tabindex="0" style="background-color: #2980b999 !important">
<a style="font-weight: 900;"> © {{ date('Y') }} - All rights reserved to Kayan Foundation | <a style="" class="text-dark fw-bolder" href="https://api.whatsapp.com/send?phone=201066067946">Designed By Ahmed Mohsen</a></a>

</footer>
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>
</html>