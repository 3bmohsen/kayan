@extends('kayan.managing.clients.CprofileMaster')
@section('title','العميل')
@section('Pbody')
@php
    $idd = $client->id;
@endphp
@section('id',$idd)
@if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
<div class="container mt-3 mb-5 ">
    <div class="d-flex flex-column p-5 align-items-center justify-content-center" style="background: #2980b991;border-radius: 50px;">
        <h4 style="font-weight: bold; ">بيانات العميل</h4>
        <hr style="    border: 3px solid black;width: 200px;">
        <div class="d-flex flex-column flex-md-row mt-2 ">
            <div class="d-flex flex-column align-items-start m-3">
            <p style="font-weight: 700;font-size: larger;" class="me-5"> اسم العميل: {{$client->name}}</p>
            <p style="font-weight: 700;font-size: larger;" class="me-5"> رقم الهاتف: {{$client->phone}}</p>
            <p style="font-weight: 700;font-size: larger;" class="me-5"> العنوان: {{$client->phone}}</p>

            </div>
            <div class="d-flex flex-column align-items-start m-3">
            <p style="font-weight: 700;font-size: larger;" class=""> النشاط: {{$client->activity}}</p>
            <p style="font-weight: 700;font-size: larger;" class="">  الكود: {{$client->code}}</p>
@php
    $taxRegNum = $client->TaxRegNum; // الحصول على رقم التسجيل الضريبي

    // تقسيم الرقم إلى أجزاء
    $parts = explode('-', $taxRegNum);

    // عكس ترتيب الأجزاء
    $reversedParts = array_reverse($parts);

    // تجميع الأجزاء بعد عكسها
    $formattedTaxRegNum = implode('-', $reversedParts);
@endphp

<p style="font-weight: 700; font-size: larger;" dir="ltr">
    رقم التسجيل الضريبي: {{ $formattedTaxRegNum }}
</p>


</div>
            <div class="d-flex flex-column align-items-start m-3">
            <p style="font-weight: 700;font-size: larger;" class=""> المأمورية: {{$client->Missions->mission_name}}</p>

</div>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#edit{{$client->id}}" href="" class="btn btn-success" style="font-size:large;">تعديل البيانات</button>

    </div>
</div>
<div class="modal" id="edit{{$client->id}}" tabindex="-1" aria-labelledby="edit{{$client->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$client->id}}">تعديل العميل</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/Client/edit/{{$client->id}}" method="POST">
        @method('PUT')
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name" value="{{$client->name}}">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone" value="{{$client->phone}}">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">العنوان</label>
    <input required type="text" class="form-control" id="address" name="address" value="{{$client->address}}">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">النشاط</label>
    <input required type="text" class="form-control" id="activity" name="activity" value="{{$client->activity}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="inputEmail4" class="form-label">الكود</label>
    <input required type="text" class="form-control" id="code" name="code" value="{{$client->code}}">
  </div>
  <div class="col-md-6">
  <label for="inputEmail4" class="form-label">رقم التسجيل الضريبي</label>
  <input required type="text" class="form-control"  id="TaxRegNum" name="TaxRegNum" value="{{$client->TaxRegNum}}">

</div>
<div class="col-md-6 justify-content-center">
<label for="mission_id" class="form-label">مأمورية العميل</label>

  <select id="mission_id" name="mission_id" class="form-select" aria-label="المأمورية">
    <option selected value="{{$client->mission_id}}">{{$client->Missions->mission_name}}</option>
    @foreach ($Missions as $mission)
    <option value="{{$mission->id}}">{{$mission->mission_name}}</option>
    @endforeach
  </select>
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل العميل</button>
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