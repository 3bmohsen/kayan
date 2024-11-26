<div wire:poll.1s>
<div class="d-flex flex-column flex-lg-row align-items-center justify-content-center mb-5">
    <div class="container-fluid mt-2 ">
      <input required class="form-control me-2 text-center" wire:model="name" type="search" name="search" id="search" placeholder="البحث بإستخدام الاسم" aria-label="Search">
  </div>
  <div class="container-fluid mt-2 ">
      <input required class="form-control me-2 text-center" wire:model="phone" type="search" name="search" id="search" placeholder="البحث بإستخدام رقم الهاتف" aria-label="Search">
  </div>
    </div>
    <div wire:poll.10s>


<div  class="table-responsive" dir="rtl">

<table class=" table text-center table-hover" style="direction: rtl;     --bs-table-hover-bg: #4989c799 !important;
    background-image: linear-gradient(to right, #2980b9, #365163e8) !important;border-radius: 10px;    --bs-table-color: #ffffff;--bs-table-bg:n;">
  <thead>
    <tr>
      <th scope="col">ID الموظف</th>
      <th scope="col">اسم الموظف</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">عرض الموظف</th>
      <th scope="col">حذف الموظف</th>
      <th scope="col">تعديل الموظف</th>


    </tr>
  </thead>
  <tbody>
    @forelse ($employees as $employee )

    <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->phone}}</td>
        <td><a href="/employeeProfile/{{$employee->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class=""><g><circle cx="12" cy="15" r="4.25" fill="#000000" opacity="1" data-original="#000000" class=""></circle><path d="m22.53 12.97-1.514-1.515c-4.98-4.979-13.052-4.979-18.032 0L1.47 12.97a.749.749 0 1 0 1.06 1.06l1.515-1.514c4.393-4.394 11.517-4.394 15.91 0l1.515 1.514a.749.749 0 1 0 1.06-1.06z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="m18.85 6.867-1.5 2.598a.751.751 0 0 0 1.3.75l1.5-2.598a.75.75 0 0 0-1.3-.75zM11.25 5.5v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zM3.85 7.617l1.5 2.598a.751.751 0 0 0 1.3-.75l-1.5-2.598a.75.75 0 0 0-1.3.75z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg></a></td>
        <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#sure{{$employee->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#fc0005" fill-rule="evenodd" d="M170.8 14.221A14.21 14.21 0 0 1 185 .014L326.991.006a14.233 14.233 0 0 1 14.2 14.223v35.117H170.8zm233.461 477.443a21.75 21.75 0 0 1-21.856 20.33H127.954a21.968 21.968 0 0 1-21.854-20.416L84.326 173.06H427.5l-23.234 318.6zm56.568-347.452H51.171v-33A33.035 33.035 0 0 1 84.176 78.2l343.644-.011a33.051 33.051 0 0 1 33 33.02v33zm-270.79 291.851a14.422 14.422 0 1 0 28.844 0V233.816a14.42 14.42 0 0 0-28.839-.01v202.257zm102.9 0a14.424 14.424 0 1 0 28.848 0V233.816a14.422 14.422 0 0 0-28.843-.01z" opacity="1" data-original="#fc0005" class=""></path></g></svg></button></td>
 
      <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{$employee->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#388cea" d="m117.42 51.41-6.75 6.75-13.88 13.89-17.12 17.12-.03.04c-.04.03-.07.07-.11.09-.71.66-1.62 1.07-2.6 1.13l-10.2.74a2.543 2.543 0 0 1-2.72-2.71l.74-10.21c.07-.97.47-1.88 1.14-2.59.03-.04.06-.07.1-.11l.03-.03L93.13 48.4l3.88-3.88 6.76-6.75z" opacity="1" data-original="#ea3883" class=""></path><path fill="#235dc1" d="m121.89 36.88-3.58-3.58a7.122 7.122 0 0 0-10.07 0l-4.47 4.47 13.65 13.65 4.47-4.47a7.122 7.122 0 0 0 0-10.07z" opacity="1" data-original="#a223c1" class=""></path><path fill="#fecd1a" d="m64.75 78.25-.74 10.21a2.543 2.543 0 0 0 2.72 2.71l10.2-.74c.98-.06 1.89-.47 2.6-1.13.04-.02.07-.06.11-.09l.03-.04 17.12-17.12v43.72c0 4.55-3.68 8.23-8.23 8.23H12.23C7.68 124 4 120.32 4 115.77V31.75L31.21 4h57.35c4.55 0 8.23 3.68 8.23 8.23v32.51l-3.66 3.66-27.11 27.12-.03.03c-.04.04-.07.07-.1.11-.67.71-1.07 1.62-1.14 2.59z" opacity="1" data-original="#fecd1a" class=""></path><path fill="#ff9b2e" d="M22.99 31.21H4L31.21 4v18.99a8.22 8.22 0 0 1-8.22 8.22z" opacity="1" data-original="#ff9b2e"></path><g fill="#fffcee"><path d="m79.67 89.17-.04.04c-.04.03-.07.07-.11.1a4.25 4.25 0 0 1-2.59 1.13l-10.21.74A2.549 2.549 0 0 1 64 88.47l.75-10.21c.07-.97.47-1.89 1.14-2.59.03-.04.06-.07.1-.11l.03-.03zM81.21 29.46H39.85c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h41.36c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75zM69.48 52.53H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h43.61c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75zM25.87 79.1h21.81c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75zM69.48 98.68H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h43.61c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75z" fill="#fffcee" opacity="1" data-original="#fffcee" class=""></path></g></g></svg></button></td>

    </tr>
    @empty
        <tr>
            <td colspan="6">
                <div class="alert alert-danger text-center cairo-bold m-5">
                    لا توجد بيانات لعرضها
                </div>
            </td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>
<div class="d-flex align-items-center justify-content-center mt-3">
{{$employees->links('vendor.pagination.bootstrap-5')}}

</div>
@foreach ($employees as $employee )

<div class="modal" id="sure{{$employee->id}}" tabindex="-1" aria-labelledby="sure{{$employee->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$employee->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف الموظف {{$employee->name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/employee/{{$employee->id}}"><button type="button" class="btn btn-danger">حذف الموظف</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($employees as $employee )

<div class="modal" id="edit{{$employee->id}}" tabindex="-1" aria-labelledby="edit{{$employee->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$employee->id}}">تعديل الموظف</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/employee/edit/{{$employee->id}}" method="POST">
        @method('PUT')
        @csrf
  <div class="col-md-6">
    <label for="name" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" value="{{$employee->name}}" name="name">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" value="{{$employee->phone}}" name="phone">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">الايميل</label>
    <input required type="email" class="form-control" id="email" value="{{$employee->email}}" name="email">
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">الباسورد</label>
    <input required type="text" class="form-control" id="password" placeholder="ادخل كلمة المرور الجديدة" name="password">
  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل الموظف</button>
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

</div>
</div>