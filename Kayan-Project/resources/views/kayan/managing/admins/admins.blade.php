@extends('kayan.managing.admins.master')
@section('title','عرض المديرين')
@section('body')
<style>
    .table{
        --bs-table-hover-bg: rgb(220 220 220 / 36%);
        --bs-table-color: #ffffff;
    --bs-table-bg: #ffffff00;
    }
</style>
<div class="container" >
    <h1 class="text-center m-5 text-light">عرض المديرين</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">إضافة مدير</button>
    </div>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
    <livewire:admins />

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">إضافة مدير</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 mt-5" action="/addAdmin" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label for="name" class="form-label text-light">الاسم</label>
        <input required type="text" class="form-control text-center" id="name" name="name" placeholder="ادخل اسم المدير">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label text-light">الايميل</label>
        <input required type="email" class="form-control text-center" id="email" name="email" placeholder="ادخل ايميل المدير">
    </div>
    <div class="col-md-12">
        <label for="password" class="form-label text-light">الباسورد</label>
        <input required type="password" class="form-control text-center" id="password" name="password" placeholder="ادخل الباسورد">
    </div>

    <div class="col-12 text-center mb-5">
        <button type="submit" class="btn btn-success">إضافة المدير</button>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection