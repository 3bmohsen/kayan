@extends('kayan.managing.clients.CprofileMaster')
@section('title','إضافة إجراء فحص')
@section('Pbody')
@section('id', request()->route('id'))
<div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة إجراء فحص</h1>
<form class="row g-3 mt-5" action="/addCheckDoc" method="POST" enctype="multipart/form-data">
@csrf
<input required type="hidden" value="{{request()->route('id')}}" name="client_id" id="client_id">
  <div class="col-md-6">
    <label for="doc_file" class="form-label">ملف الإجراء</label>
    <input type="file" class="form-control" id="doc_file" name="doc_file">
  </div>
  <div class="col-md-6">
    <label for="action_date" class="form-label">تاريخ الاجراء</label>
    <input required type="date" class="form-control" id="action_date" name="action_date">
  </div>
  <div class="mb-3">
  <label for="notes" class="form-label">ملاحظات</label>
  <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
</div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الاجراء</button>
  </div>
</form>
</div>
@endsection