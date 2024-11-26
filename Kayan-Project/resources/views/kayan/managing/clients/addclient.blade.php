@extends('kayan.managing.clients.master')
@section('title','إضافة عميل')
@section('body')
<div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة عميل</h1>
<form class="row g-3 mt-5" action="/Clients/Add" method="POST">
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">العنوان</label>
    <input required type="text" class="form-control" id="address" name="address">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">النشاط</label>
    <input required type="text" class="form-control" id="activity" name="activity">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="inputEmail4" class="form-label">الكود</label>
    <input required type="text" class="form-control" id="code" name="code">
  </div>
  <div class="col-md-6">
  <label for="inputEmail4" class="form-label">رقم التسجيل الضريبي</label>
  <div class="d-flex flex-row">
    <input required type="text" class="form-control" maxlength="3" pattern="\d{3}" id="TaxRegNum1" name="TaxRegNum1" oninput="moveToNext(this, 'TaxRegNum2', 'TaxRegNum1')">
    <span class="input-group-text">-</span>
    <input required type="text" class="form-control" maxlength="3" pattern="\d{3}" id="TaxRegNum2" name="TaxRegNum2" oninput="moveToNext(this, 'TaxRegNum3', 'TaxRegNum1')">
    <span class="input-group-text">-</span>
    <input required type="text" class="form-control" maxlength="3" pattern="\d{3}" id="TaxRegNum3" name="TaxRegNum3" oninput="moveToNext(this, null, 'TaxRegNum2')">
    </div>

</div>
<div class="col-md-6 justify-content-center">
<label for="mission_id" class="form-label">إختر مأمورية العميل</label>

  <select required id="mission_id" name="mission_id" class="form-select" aria-label="المأمورية">
    <option value="">إختر المأمورية</option>
    @foreach ($missions as $mission)
    <option value="{{$mission->id}}">{{$mission->mission_name}}</option>
    @endforeach
  </select>
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة العميل</button>
  </div>
</form>
</div>
<script>
  function moveToNext(current, nextFieldId, prevFieldId) {
    if (current.value.length >= current.maxLength) {
      if (nextFieldId) {
        document.getElementById(nextFieldId).focus();
      }
    } else if (current.value.length === 0 && prevFieldId) {
      // إذا كانت القيمة فارغة، انتقل إلى الحقل السابق
      document.getElementById(prevFieldId).focus();
    }
  }
</script>
@endsection