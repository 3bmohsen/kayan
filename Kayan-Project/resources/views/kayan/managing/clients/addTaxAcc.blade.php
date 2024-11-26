@extends('kayan.managing.clients.CprofileMaster')
@section('title','إضافة حساب جديد')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة حساب جديد</h1>
<form class="row g-3 mt-5" action="/addClientAcc" method="POST">
@csrf
<input required type="hidden" value="{{request()->route('id')}}" name="client_id" id="client_id">
<label for="acctype" class="form-label">نوع الحساب</label>

<select class="form-select" name="acctype" id="acctype" aria-label="نوع الحساب">
  <option selected>اختر نوع الحساب</option>
  <option value="حساب منظومة الفاتوره الالكترونية">حساب منظومة الفاتوره الالكترونية</option>
  <option value="حساب مصلحة الضرايب">حساب مصلحة الضرايب</option>
</select>
  <div class="col-md-12">
    <label for="email" class="form-label">الايميل</label>
    <input required type="text" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-12">
    <label for="pass" class="form-label">الباسورد</label>
    <input required type="text" class="form-control" id="pass" name="pass">
  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الحساب</button>
  </div>
</form>
</div>
@endsection