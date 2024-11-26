@extends('kayan.managing.clients.master')
@section('title','العميل')
@section('body')
<div class="container-fluid">
<button class="btn mt-3" style="background: #2980b9;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M128 102.4c0-14.138 11.462-25.6 25.6-25.6h332.8c14.138 0 25.6 11.462 25.6 25.6S500.538 128 486.4 128H153.6c-14.138 0-25.6-11.463-25.6-25.6zm358.4 128H25.6C11.462 230.4 0 241.863 0 256c0 14.138 11.462 25.6 25.6 25.6h460.8c14.138 0 25.6-11.462 25.6-25.6 0-14.137-11.462-25.6-25.6-25.6zm0 153.6H256c-14.137 0-25.6 11.462-25.6 25.6 0 14.137 11.463 25.6 25.6 25.6h230.4c14.138 0 25.6-11.463 25.6-25.6 0-14.138-11.462-25.6-25.6-25.6z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg></button>

<div class="offcanvas offcanvas-start" style="background-color: #226fa2f7;" data-bs-scroll="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light" id="offcanvasScrollingLabel">مؤسسة كيان</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="/ClientProfile/@yield('id')" class="sb text-light  text-center">بيانات العميل</a>
    <hr>
    <a class="sb text-light  text-center" href="/ClientAccs/@yield('id')">الحسابات الالكترونية الخاصه بالعميل</a>

    <hr>
    <div class="nav-item dropdown">
          <a class="nav-link text-light  dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">الضرايب العامه</a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/CheckDocs/@yield('id')">إجراءات الفحص</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/taxDocs/@yield('id')">الإقرارات الضريبية</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/Activities/@yield('id')">الأنشطة</a></li>
          </ul>
        </div>
    <hr>
    <div class="nav-item dropdown">
          <a class="nav-link text-light  dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">القيمة المضافة</a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/monthlyDocs/@yield('id')">الإقرارات الشهرية</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/CheckPeriods/@yield('id')">فترات الفحص</a></li>
          </ul>
        </div>
            <hr>


            <div class="nav-item dropdown">
          <a class="nav-link text-light  dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">مستندات خاصة</a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/TaxCards/@yield('id')">البطاقة الضريبية</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/CommercialRegistry/@yield('id')">السجل التجاري</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/AddedVal/@yield('id')">شهادة القيمة المضافة</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ImportCard/@yield('id')">البطاقة الاستيرادية</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ExportCard/@yield('id')">البطاقة التصديرية</a></li>  
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ContractorsUnion/@yield('id')">إتحاد مقاولي التشييد والبناء</a></li> 
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="/Courses/@yield('id')">الدورات التدريبية</a></li> 
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="/Sessions/@yield('id')">جلسات اللجان</a></li>
        </ul>
        </div>    <hr>
        <a class="sb text-light  text-center" href="/incomeTaxDocs/@yield('id')">إقرارات ضريبة كسب العمل</a></li>
            <hr>
            <a class="sb text-light  text-center" href="/CAIPtaxDocs/@yield('id')">إقرارات ضريبةالارباح التجارية والصناعية</a>
            <hr>
    <a href="/CensorshipDocs/@yield('id')" class="sb text-light  text-center">الهيئة العامه للرقابة على الصادرات والواردات</a>
    <hr>
    <a href="/COCDocs/@yield('id')" class="sb text-light  text-center">الغرفة التجارية</a>
    <hr>
    <a href="/CRDocs/@yield('id')" class="sb text-light  text-center">السجل التجاري</a>
    <hr>
    <a href="/CUUDocs/@yield('id')" class="sb text-light  text-center">إتحاد مقاولي التشييد والبناء</a>
    <hr>
    <a href="/tradeDocs/@yield('id')" class="sb text-light  text-center">الهيئة العامه للأستثمار</a>
    <hr>
    @if (Auth::guard('admins')->check())

    <a href="/ClientMoney/@yield('id')" class="sb text-light  btn text-center btn-success">الماليات</a>
    <hr>

    @endif

</div>
</div>
</div>
@yield('Pbody')
@endsection
