@extends('kayan.managing.clients.CprofileMaster')
@section('title','الحسابات الالكترونيةالخاصه بالعميل')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">الحسابات الالكترونية الخاصه بالعميل</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/addClientAcc/{{request()->route('id')}}"><div class="btn btn-success">إضافة حساب جديد</div></a>
</div>
@if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif 
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
        @forelse($accs as $acc)
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center" >
            <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex flex-row align-items-center justify-content-center p-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#edit{{$acc->id}}" class="btn btn-primary m-3 mb-0">تعديل الحساب</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#sure{{$acc->id}}" class="btn btn-danger m-3 mb-0">حذف الحساب</a>

                </div>
                <div class=" p-2 text-center">
                <p>نوع الحساب : {{$acc->acctype}}</p>

                <p class="">الايميل: </p>
                <p class="">{{$acc->email}}</p>
                <p class="">الباسورد: </p>
                <p class="">{{$acc->pass}}</p>

                </div>
            </div>
        </div>
        <hr style="border:2px solid;">
        @empty
        <tr>
            <td colspan="6">
                <div class="alert alert-danger text-center cairo-bold m-5">
                    لا توجد حسابات لعرضها
                </div>
            </td>
        </tr>
        @endforelse
        
    </div>
</div>



@foreach ($accs as $acc )

<div class="modal" id="sure{{$acc->id}}" tabindex="-1" aria-labelledby="sure{{$acc->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$acc->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف الحساب {{$acc->file_name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/ClientAcc/{{$acc->id}}"><button type="button" class="btn btn-danger">حذف الحساب</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($accs as $acc )

<div class="modal" id="edit{{$acc->id}}" tabindex="-1" aria-labelledby="edit{{$acc->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$acc->id}}">تعديل الحساب</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/ClientAcc/edit/{{$acc->id}}" method="POST">
        @method('PUT')
  @csrf
  <label for="acctype" class="form-label">نوع الحساب</label>
<select class="form-select" name="acctype" id="acctype" aria-label="نوع الحساب">
    @if ($acc->acctype == "حساب منظومة الفاتوره الالكترونية")
    <option selected value ="حساب منظومة الفاتوره الالكترونية">حساب منظومة الفاتوره الالكترونية</option>
    <option value="حساب مصلحة الضرايب">حساب مصلحة الضرايب</option>
    @endif
    @if ($acc->acctype == "حساب مصلحة الضرايب")
    <option value ="حساب منظومة الفاتوره الالكترونية">حساب منظومة الفاتوره الالكترونية</option>
    <option selected value="حساب مصلحة الضرايب">حساب مصلحة الضرايب</option>
    @endif
</select>
  <div class="col-md-12">
    <label for="email" class="form-label">الايميل</label>
    <input required type="text" value="{{$acc->email}}" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-12">
    <label for="pass" class="form-label">الباسورد</label>
    <input required type="text" value="{{$acc->pass}}" class="form-control" id="pass" name="pass">
  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل الحساب</button>
  </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection