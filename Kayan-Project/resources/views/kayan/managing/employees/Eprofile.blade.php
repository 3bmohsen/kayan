@extends('kayan.managing.employees.EprofileMaster')
@section('title','الموظف')
@section('Pbody')
@php
    $idd = $employee->id;
@endphp
@section('id',$idd)
@if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
<div class="container mt-3 mb-5 ">
    <div class="d-flex flex-column p-5 align-items-center justify-content-center" style="background: #2980b991;border-radius: 50px;">
        <h4 style="font-weight: bold; ">بيانات الموظف</h4>
        <hr style="    border: 3px solid black;width: 200px;">
        <div class="d-flex flex-column flex-md-row mt-2 text-center">
            <div class="d-flex flex-column align-items-center text-center m-3">
            <p style="font-weight: 700;font-size: larger;" class="me-5"> اسم الموظف: {{$employee->name}}</p>
            <p style="font-weight: 700;font-size: larger;" class="me-5"> رقم الهاتف: {{$employee->phone}}</p>

            </div>
            <div class="d-flex flex-column align-items-start m-3">
            <p style="font-weight: 700;font-size: larger;" class="me-5"> ايميل الموظف: {{$employee->email}}</p>
</div>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#edit{{$employee->id}}" href="" class="btn btn-success" style="font-size:large;">تعديل البيانات</button>

    </div>
</div>
<div class="modal" id="edit{{$employee->id}}" tabindex="-1" aria-labelledby="edit{{$employee->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$employee->id}}">تعديل الموظف</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/employee/edit/{{$employee->id}}" method="POST">
        @method('PUT')
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">الايميل</label>
    <input required type="text" class="form-control" id="email" name="email" value="{{$employee->email}}">
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">الباسورد</label>
    <input required type="text" class="form-control" id="password" name="password" value="">
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل الموظف</button>
  </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
@endsection