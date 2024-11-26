@extends('kayan.managing.clients.CprofileMaster')
@section('title','إضافة إتحاد مقاولي التشييد والبناء')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column justify-content-center align-items-center" >
<h1 class="m-3">إضافة إتحاد مقاولي التشييد والبناء</h1>
<form class="row g-3 mt-5" action="/AddCUUDoc" method="POST" enctype="multipart/form-data">
@csrf
<input required type="hidden" value="{{request()->route('id')}}" name="client_id" id="client_id">
<input required type="hidden" value="4" name="filetype">
  <div class="col-md-12">
    <label for="doc_file" class="form-label">ملف</label>
    <input type="file" class="form-control" id="doc_file" name="doc_file">
  </div>
  <div class="col-md-6">
    <label for="workDate" class="form-label">تاريخ العمل</label>
    <input required type="date" class="form-control" id="workDate" name="workDate">
  </div>
  <div class="col-md-6">
    <label for="recDate" class="form-label">تاريخ الاستلام</label>
    <input required type="date" class="form-control" id="recDate" name="recDate">
  </div>
  <div class="mb-3">
  <label for="notes" class="form-label">ملاحظات</label>
  <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
</div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة</button>
  </div>
</form>
</div>
@endsection