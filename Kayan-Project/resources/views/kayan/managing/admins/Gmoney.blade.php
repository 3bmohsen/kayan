@extends('kayan.managing.admins.master')
@section('title','الخزينة العامة')
@section('body')
<style>
    .table{
        --bs-table-hover-bg: rgb(220 220 220 / 36%);
        --bs-table-color: #ffffff;
    --bs-table-bg: #ffffff00;
    }
</style>
<div class="container" >
    <h1 class="text-center m-3 text-light">الخزينة العامة</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#send">إضافة حساب</button>
    </div>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
        
    <livewire:g-money />


    <div class="modal" id="send" tabindex="-1" aria-labelledby="send" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="send">إضافة حساب</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/AddGM" method="POST" enctype="multipart/form-data">
@csrf
  <div class="col-md-6">
    <label for="money" class="form-label">مبلغ الاتعاب</label>
    <input required type="text" class="form-control" id="money" name="money">
  </div>
  <div class="col-md-6">
    <label for="date" class="form-label">التاريخ</label>
    <input required type="date" class="form-control" id="date" name="date">
  </div>
  <div class="mb-3">
  <label for="notes" class="form-label">البيان</label>
  <textarea   class="form-control" name="notes" id="notes" rows="3"></textarea>
</div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الحساب</button>
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