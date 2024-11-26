@extends('kayan.managing.clients.master')
@section('title','إضافة موظف')
@section('body')
<div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة موظف</h1>
<form class="row g-3 mt-5" action="/Employees/Add" method="POST">
  @csrf
  <div class="col-md-6">
    <label for="name" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">الايميل</label>
    <input required type="email" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">الباسورد</label>
    <input required type="text" class="form-control" id="password" name="password">
  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الموظف</button>
  </div>
</form>
</div>
@endsection