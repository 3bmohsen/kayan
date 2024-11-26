@extends('kayan.managing.clients.master')
@section('title','الموظف')
@section('body')
<div class="container-fluid">
<button class="btn mt-3" style="background: #2980b9;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M128 102.4c0-14.138 11.462-25.6 25.6-25.6h332.8c14.138 0 25.6 11.462 25.6 25.6S500.538 128 486.4 128H153.6c-14.138 0-25.6-11.463-25.6-25.6zm358.4 128H25.6C11.462 230.4 0 241.863 0 256c0 14.138 11.462 25.6 25.6 25.6h460.8c14.138 0 25.6-11.462 25.6-25.6 0-14.137-11.462-25.6-25.6-25.6zm0 153.6H256c-14.137 0-25.6 11.462-25.6 25.6 0 14.137 11.463 25.6 25.6 25.6h230.4c14.138 0 25.6-11.463 25.6-25.6 0-14.138-11.462-25.6-25.6-25.6z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg></button>

<div class="offcanvas offcanvas-start" style="background-color: #226fa2f7;" data-bs-scroll="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light" id="offcanvasScrollingLabel">مؤسسة كيان</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="/employeeProfile/@yield('id')" class="sb text-light text-center">بيانات الموظف</a>
    <hr>
    <a class="sb text-center text-light" href="/ReceivedJobs/@yield('id')">الوظائف المستلمة</a>
    <hr>

    

</div>
</div>
</div>
@yield('Pbody')
@endsection
