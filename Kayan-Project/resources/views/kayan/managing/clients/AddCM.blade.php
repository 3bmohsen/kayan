@extends('kayan.managing.clients.CprofileMaster')
@section('title','إضافة حساب مالي جديد')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column justify-content-center align-items-center" >
<h1 class="m-3">إضافة حساب مالي جديد</h1>
<form class="row g-3 mt-5" action="/AddCM" method="POST" enctype="multipart/form-data">
@csrf
<input required type="hidden" value="{{request()->route('id')}}" name="client_id" id="client_id">
  <div class="col-md-6">
    <label for="rec_amount" class="form-label">المبلغ المستلم</label>
    <input required type="text" class="form-control" id="rec_amount" name="rec_amount">
  </div>
  <div class="col-md-6">
    <label for="spent_amount" class="form-label">المبلغ المصروف</label>
    <input required type="text" class="form-control" id="spent_amount" name="spent_amount">
  </div>
  <div class="mb-3">
  <label for="notes" class="form-label">ملاحظات</label>
  <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
</div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الحساب</button>
  </div>
</form>
</div>
@endsection