@extends('kayan.managing.admins.master')
@section('title','إشعارات السكرتيرة')
@section('body')
<style>
    .table{
        --bs-table-hover-bg: rgb(220 220 220 / 36%);
        --bs-table-color: #ffffff;
    --bs-table-bg: #ffffff00;
    }
</style>
<div class="container" >
    <h1 class="text-center m-3 text-light">إشعارات السكرتيرة</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#send">إرسال إشعار</button>
    </div>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
    <livewire:all-data-notification />




<div class="modal fade" id="send" tabindex="-1" aria-labelledby="send" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="send">إرسال الاشعار</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/NewDataNotf" method="POST">
  @csrf
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">محتوى الاشعار</label>
    <textarea required  class="form-control" name="message" id="message" rows="3"></textarea>

  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إرسال الاشعار</button>
  </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection