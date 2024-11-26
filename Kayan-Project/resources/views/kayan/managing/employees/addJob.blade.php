@extends('kayan.managing.employees.EprofileMaster')
@section('title','إضافة وظيفة')
@section('id', request()->route('id'))

@section('Pbody')
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


<div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة وظيفة</h1>
<form class="row g-3 mt-5" action="/addEmpJob" method="POST" enctype="multipart/form-data">
@csrf
<input required type="hidden" value="{{request()->route('id')}}" name="employee_id" id="employee_id">
  <div class="col-md-6">
  <label for="client_id" class="form-label">العميل</label>
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
    <label for="exp" class="form-label">تاريخ إنتهاء التسليم</label>
    <input required type="date" class="form-control" id="exp" name="exp">
  </div>
  <div class="col-md-12">
  <label for="job_details" class="form-label">بيانات الوظيفة</label>
  <textarea required  class="form-control" name="job_details" id="job_details" rows="3"></textarea>
</div>
<div class="col-md-12 mb-3">
    <label for="doc_file" class="form-label">ملف الوظيفة</label>
    <input type="file" class="form-control" id="doc_file" name="doc_file">
</div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الوظيفة</button>
  </div>
</form>
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
            var clientId = $(this).data('value');
            var clientName = $(this).text();
            $('#client_id').val(clientId); // تعيين القيمة المخفية
            $('#dropdownMenuButton').text(clientName); // تحديث النص في الزر
        });
        $('form').on('submit', function(event) {
    var clientId = $('#client_id').val();
    if (!clientId) {
        event.preventDefault(); // منع إرسال النموذج
        alert('يرجى اختيار عميل'); // رسالة تحذير
    }
});
    });
    
</script>


@endsection