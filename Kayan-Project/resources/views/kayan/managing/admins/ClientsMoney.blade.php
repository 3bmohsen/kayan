@extends('kayan.managing.admins.master')
@section('title','خزينة العملاء')
@section('body')
<style>
    .table{
        --bs-table-hover-bg: rgb(220 220 220 / 36%);
        --bs-table-color: #ffffff;
    --bs-table-bg: #ffffff00;
    }
</style>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }
        .search-input {
            margin: 8px;
        }
    </style>
</head>
<div class="container" >
    <h1 class="text-center m-3 text-light">خزينة العملاء</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#send">إضافة حساب</button>
    </div>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
    <livewire:all-clients-money />


    <div class="modal" id="send" tabindex="-1" aria-labelledby="send" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="send">إضافة حساب</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/AddCM" method="POST" enctype="multipart/form-data">
@csrf
<div class="col-md-12 text-center">
  <label for="client_id" class="form-label text-dark text-center">العميل</label>
  <input type="hidden" id="client_id" name="client_id">

  <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        اختر العميل
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <input type="text" style="width: 80%;" class="form-control search-input" id="client_ids" name="client_ids" placeholder="ابحث عن اسم العميل">
            <ul id="optionsList" class="list-unstyled">
            @foreach ($clients as $client)

                <li><a class="dropdown-item" href="#" data-value="{{$client->id}}">{{$client->name}} - {{$client->Missions->mission_name}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
  </div>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // بحث في الخيارات
        $('#client_ids').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#optionsList li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // تحديث الزر وقيمة client_id عند اختيار عنصر
        $('#optionsList .dropdown-item').on('click', function() {
            var empId = $(this).data('value');
            var empName = $(this).text();
            $('#client_id').val(empId); // تعيين القيمة المخفية
            $('#dropdownMenuButton').text(empName); // تحديث النص في الزر
        });
        $('form').on('submit', function(event) {
    var empId = $('#client_id').val();
    if (!empId) {
        event.preventDefault(); // منع إرسال النموذج
        alert('يرجى اختيار العميل'); // رسالة تحذير
    }
});
    });
    
</script>
@endsection