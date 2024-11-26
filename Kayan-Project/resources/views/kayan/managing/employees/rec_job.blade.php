@extends('kayan.managing.employees.EprofileMaster')
@section('title','الوظائف المستلمة')
@section('id', request()->route('id'))

@section('Pbody')
<head>
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




<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">الوظائف المستلمة الخاصه بالموظف {{$emp->name}}</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/addEmpJob/{{request()->route('id')}}"><div class="btn btn-success">إضافة وظيفة جديد</div></a>
</div>
@if(session('success'))
    <div class="alert alert-success text-center cairo-bold m-5">
    {!! session('success') !!}
    </div>
@endif 

@if(session('fail'))
    <div class="alert alert-danger text-center cairo-bold m-5">
        {{ session('fail') }}
    </div>
@endif 

<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('jobs-list', ['id' =>request()->route('id')])

    </div>
</div>






<!-- ######################################################## -->



@foreach ($empJobs as $empJob )

<div class="modal" id="edit{{$empJob->id}}" tabindex="-1" aria-labelledby="edit{{$empJob->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$empJob->id}}">تعديل الوظيفة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/JobEdit" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="col-md-6">
  <label for="client_id" class="form-label">العميل</label>
<input type="hidden" class="client_id" name="client_id" value="{{$empJob->client_id}}">
<input type="hidden" id="jobid" name="jobid" value="{{$empJob->id}}">

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle dropdownMenuButton" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        {{$empJob->client->name}} - {{$empJob->client->Missions->mission_name}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <input type="text" style="width: 80%;" class="form-control search-input client_ids" placeholder="ابحث عن اسم العميل">
        <ul class="optionsList list-unstyled">
            @foreach ($clients as $client)
                <li style="cursor: pointer;">
                    <a class="dropdown-item" data-value="{{$client->id}}">{{$client->name}} - {{$client->Missions->mission_name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
  </div>
  <div class="col-md-6">
    <label for="exp" class="form-label">تاريخ إنتهاء التسليم</label>
    <input required type="date" class="form-control" id="exp" value="{{$empJob->exp}}" name="exp">
  </div>
  <div class="mb-3">
  <label for="job_details" class="form-label">بيانات الوظيفة</label>
  <textarea required  class="form-control" name="job_details" id="job_details" rows="3">{{$empJob->job_details}}</textarea>
</div>
<div class="col-md-6">
<select class="form-select" aria-label="Default select example" name="status" id="status">
  <option selected value="{{$empJob->status}}">إختيار الحالة</option>
  <option class="bg-warning" value="waiting">قيد الانتظار</option>
  <option class="bg-success" value="completed">مكتملة</option>
  <option class="bg-danger" value="expired">منتهية</option>
</select>
</div>
<div class="col-md-6">
    <input type="file" class="form-control" id="doc_file" name="doc_file">
</div>
<div class="col-md-12">
    <label for="password" class="form-label">ادخل الباسورد للحفظ</label>
    <input required type="password" class="form-control" id="password" name="password">
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل الوظيفة</button>
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


<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->



@foreach ($empJobs as $empJob )

<div class="modal" id="move{{$empJob->id}}" tabindex="-1" aria-labelledby="move{{$empJob->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="move{{$empJob->id}}">نقل الموظف</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/JobMove" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="col-md-6">
  <label for="emp_id" class="form-label">الموظف المكلف بالوظيفة</label>
  <input type="hidden" class="emp_id" name="emp_id" value="{{$empJob->employee_id}}">
  <input type="hidden" id="jobid" name="jobid" value="{{$empJob->id}}">

  <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle dropdownMenuButton1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$empJob->employee->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <input type="text" style="width: 80%;" class="form-control search-input emp_ids" name="emp_ids" placeholder="ابحث عن اسم الموظف">
            <ul class="list-unstyled optionsList1">
            @foreach ($emps as $emp)

                <li style="cursor: pointer;"><a class="dropdown-item" data-value="{{$emp->id}}">{{$emp->name}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="exp" class="form-label">تاريخ إنتهاء التسليم</label>
    <input required type="date" class="form-control" id="exp" value="{{$empJob->exp}}" name="exp">
  </div>
<select class="form-select" aria-label="Default select example" name="status" id="status">
  <option selected value="{{$empJob->status}}">إختيار الحالة</option>
  <option class="bg-warning" value="waiting">قيد الانتظار</option>
  <option class="bg-success" value="completed">مكتملة</option>
  <option class="bg-danger" value="expired">منتهية</option>
</select>
<div class="col-md-12">
    <label for="password" class="form-label">ادخل الباسورد للحفظ</label>
    <input required type="password" class="form-control" id="password" name="password">
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">نقل الوظيفة</button>
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







<!-- ##############$$$$$$$$$$$$$$$$$$$$$$$ -->
@foreach ($empJobs as $empJob )

<div class="modal" id="sure{{$empJob->id}}" tabindex="-1" aria-labelledby="sure{{$empJob->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$empJob->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف الوظيفة خاصة بالعميل: {{$empJob->client->name}}
          <form action="/del/job" method="POST">
            @csrf
            <input type="hidden" name="jobid" value="{{$empJob->id}}">
            <div class="col-md-12 mt-2">
                <label for="password" class="form-label">ادخل الباسورد للحذف</label>
                <input required type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12 text-center mt-2">

            <button type="submit" class="btn btn-danger">حذف الوظيفة</button>
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

<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->


<!-- ##############$$$$$$$$$$$$$$$$$$$$$$$ -->
@foreach ($empJobs as $empJob )

<div class="modal" id="surefile{{$empJob->id}}" tabindex="-1" aria-labelledby="surefile{{$empJob->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="surefile{{$empJob->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف ملف الوظيفة
          <form action="/del/jobfile" method="POST">
            @csrf
            <input type="hidden" name="jobid" value="{{$empJob->id}}">
            <div class="col-md-12 mt-2">
                <label for="password" class="form-label">ادخل الباسورد للحذف</label>
                <input required type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12 text-center mt-2">

            <button type="submit" class="btn btn-danger">حذف ملف الوظيفة</button>
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

<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->


@foreach ($empJobs as $empJob)
<div class="modal" id="note{{$empJob->id}}" tabindex="-1" aria-labelledby="note{{$empJob->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center align-items-center flex-row">
                <h5 class="modal-title fs-5 text-center cairo-bold" id="note{{$empJob->id}}">ملاحظات الوظيفة</h5>
                <button data-bs-toggle="modal" data-bs-target="#addnote{{$empJob->id}}" class="btn btn-success m-1">إضافة ملاحظة</button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                @php $hasNotes = false; @endphp  <!-- متغير لتحديد ما إذا كانت هناك ملاحظات -->
                @foreach($notes as $note)
                    @if($note->job_id == $empJob->id)
                        @php $hasNotes = true; @endphp <!-- إذا وجدت ملاحظة، قم بتحديث المتغير -->
                        <div class="d-flex justify-content-start align-items-center flex-row" style="gap: 10px;">
    <div class="d-flex flex-column" style="flex: 1;">
        <p class="me-auto" style="font-size: small; margin-bottom: 0;">{{ $note->created_at->format('Y-m-d h:i A') }}</p>
        <div class="d-flex flex-row justify-content-start align-items-center">
            <div style="max-height: 150px; overflow-y: auto; min-width: 50%; padding: 5px; background-color: #f9f9f9; border: 1px solid #ddd; word-break: break-word;">
                <p style="margin: 0;">{{ $note->note }}</p>
            </div>
        </div>
    </div>
    <a class="ms-auto" href="/del/JobNote/{{ $note->id }}" style="display: flex; align-items: center;">
        <!-- أيقونة الحذف -->
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
            <g>
                <path fill="#fc0005" d="M170.8 14.221A14.21 14.21 0 0 1 185 .014L326.991.006a14.233 14.233 0 0 1 14.2 14.223v35.117H170.8zm233.461 477.443a21.75 21.75 0 0 1-21.856 20.33H127.954a21.968 21.968 0 0 1-21.854-20.416L84.326 173.06H427.5l-23.234 318.6zm56.568-347.452H51.171v-33A33.035 33.035 0 0 1 84.176 78.2l343.644-.011a33.051 33.051 0 0 1 33 33.02v33zm-270.79 291.851a14.422 14.422 0 1 0 28.844 0V233.816a14.42 14.42 0 0 0-28.839-.01v202.257zm102.9 0a14.424 14.424 0 1 0 28.848 0V233.816a14.422 14.422 0 0 0-28.843-.01z" opacity="1"></path>
            </g>
        </svg>
    </a>
</div>
<hr>

                    @endif
                @endforeach

                @if(!$hasNotes)
                    <div class="alert alert-danger text-center cairo-bold m-5">
                        لا توجد ملاحظات لعرضها.
                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endforeach



<!-- #################################################### -->


@foreach ($empJobs as $empJob )

<div class="modal" id="addnote{{$empJob->id}}" tabindex="-1" aria-labelledby="addnote{{$empJob->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="addnote{{$empJob->id}}">إضافة ملاحظة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center" >
    <h1 class="m-3">إضافة ملاحظة</h1>
    <form class="row g-3 mt-5" action="/AddJobNote" method="POST" enctype="multipart/form-data">
    @csrf
    <input required type="hidden" value="{{$empJob->id}}" name="job_id" id="job_id">    
  <div class="col-md-12">
    <label for="JobNote" class="form-label">الملاحظة</label>
    <textarea required  class="form-control" name="JobNote" id="JobNote" rows="3"></textarea>
    </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">إضافة الملاحظة</button>
  </div>
</form>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // دالة عامة لتفعيل البحث والاختيار
    function initializeDropdown() {
        // بحث في الخيارات للعملاء
        $('.client_ids').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $(this).closest('.dropdown').find('.optionsList li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // تحديث الزر وقيمة client_id عند اختيار عنصر للعملاء
        $('.optionsList .dropdown-item').on('click', function() {
            var clientId = $(this).data('value');
            var clientName = $(this).text();
            
            console.log("Selected Client ID: ", clientId); // للتحقق من ID المختار
            console.log("Selected Client Name: ", clientName); // للتحقق من الاسم المختار
            
            // تعيين القيمة المخفية
            $('.client_id').val(clientId); 
            // تحديث النص في الزر
            $('.dropdownMenuButton').text(clientName); 
        });
        $('.emp_ids').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $(this).closest('.dropdown').find('.optionsList1 li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // تحديث الزر وقيمة client_id عند اختيار عنصر للعملاء
        $('.optionsList1 .dropdown-item').on('click', function() {
            var clientId = $(this).data('value');
            var clientName = $(this).text();
            
            console.log("Selected Client ID: ", clientId); // للتحقق من ID المختار
            console.log("Selected Client Name: ", clientName); // للتحقق من الاسم المختار
            
            // تعيين القيمة المخفية
            $('.emp_id').val(clientId); 
            // تحديث النص في الزر
            $('.dropdownMenuButton1').text(clientName); 
        });
    }

    // تفعيل القائمة المنسدلة عند تحميل الصفحة
    initializeDropdown();
    
    // إعادة تهيئة القوائم المنسدلة بعد طلبات AJAX
    $(document).ajaxComplete(function() {
        initializeDropdown();
    });
});


</script>

@endsection