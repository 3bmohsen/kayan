@extends('kayan.managing.admins.master')
@section('title','إرسال إشعار')
@section('body')
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
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center" >
    <h1 class=" text-light">إرسال إشعار</h1>
<form class="row g-3 mt-5 d-flex flex-column justify-content-center align-items-center" action="/SendEmpNotf" method="POST" enctype="multipart/form-data">
@csrf
<div class="col-md-12 text-center">
  <label for="emp_id" class="form-label text-light text-center">الموظف</label>
  <input type="hidden" id="emp_id" name="emp_id">

  <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        اختر الموظف
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <input type="text" style="width: 80%;" class="form-control search-input" id="emp_ids" name="emp_ids" placeholder="ابحث عن اسم الموظف">
            <ul id="optionsList" class="list-unstyled">
            @foreach ($emps as $emp)

                <li><a class="dropdown-item" href="#" data-value="{{$emp->id}}">{{$emp->name}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
  </div>
  <div class="mb-3 col-12 text-center">
  <label for="message" class="form-label text-light text-center">محتوى الاشعار</label>
  <textarea required  class="form-control" name="message" id="message" rows="3" cols="50"></textarea>
</div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إرسال إشعار</button>
  </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // بحث في الخيارات
        $('#emp_ids').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#optionsList li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // تحديث الزر وقيمة emp_id عند اختيار عنصر
        $('#optionsList .dropdown-item').on('click', function() {
            var empId = $(this).data('value');
            var empName = $(this).text();
            $('#emp_id').val(empId); // تعيين القيمة المخفية
            $('#dropdownMenuButton').text(empName); // تحديث النص في الزر
        });
        $('form').on('submit', function(event) {
    var empId = $('#emp_id').val();
    if (!empId) {
        event.preventDefault(); // منع إرسال النموذج
        alert('يرجى اختيار الموظف'); // رسالة تحذير
    }
});
    });
    
</script>
@endsection