
<div wire:poll.10s>


<div  class="table-responsive" dir="rtl">

<table class="table text-center table-hover" style="direction: rtl;">
  <thead>
    <tr>
      <th scope="col">اسم السكرتيرة</th>
      <th scope="col">ايميل السكرتيرة</th>
      <th scope="col">رقم هاتف السكرتيرة</th>
      <th scope="col">حذف السكرتيرة</th>
      <th scope="col">تعديل السكرتيرة</th>


    </tr>
  </thead>
  <tbody>
    @forelse ($s as $ss )

    <tr>
        <td>{{$ss->name}}</td>
        <td>{{$ss->email}}</td>
        <td>{{$ss->phone}}</td>
        <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#sure{{$ss->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#fc0005" fill-rule="evenodd" d="M170.8 14.221A14.21 14.21 0 0 1 185 .014L326.991.006a14.233 14.233 0 0 1 14.2 14.223v35.117H170.8zm233.461 477.443a21.75 21.75 0 0 1-21.856 20.33H127.954a21.968 21.968 0 0 1-21.854-20.416L84.326 173.06H427.5l-23.234 318.6zm56.568-347.452H51.171v-33A33.035 33.035 0 0 1 84.176 78.2l343.644-.011a33.051 33.051 0 0 1 33 33.02v33zm-270.79 291.851a14.422 14.422 0 1 0 28.844 0V233.816a14.42 14.42 0 0 0-28.839-.01v202.257zm102.9 0a14.424 14.424 0 1 0 28.848 0V233.816a14.422 14.422 0 0 0-28.843-.01z" opacity="1" data-original="#fc0005" class=""></path></g></svg></button></td>
 
      <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{$ss->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#388cea" d="m117.42 51.41-6.75 6.75-13.88 13.89-17.12 17.12-.03.04c-.04.03-.07.07-.11.09-.71.66-1.62 1.07-2.6 1.13l-10.2.74a2.543 2.543 0 0 1-2.72-2.71l.74-10.21c.07-.97.47-1.88 1.14-2.59.03-.04.06-.07.1-.11l.03-.03L93.13 48.4l3.88-3.88 6.76-6.75z" opacity="1" data-original="#ea3883" class=""></path><path fill="#235dc1" d="m121.89 36.88-3.58-3.58a7.122 7.122 0 0 0-10.07 0l-4.47 4.47 13.65 13.65 4.47-4.47a7.122 7.122 0 0 0 0-10.07z" opacity="1" data-original="#a223c1" class=""></path><path fill="#fecd1a" d="m64.75 78.25-.74 10.21a2.543 2.543 0 0 0 2.72 2.71l10.2-.74c.98-.06 1.89-.47 2.6-1.13.04-.02.07-.06.11-.09l.03-.04 17.12-17.12v43.72c0 4.55-3.68 8.23-8.23 8.23H12.23C7.68 124 4 120.32 4 115.77V31.75L31.21 4h57.35c4.55 0 8.23 3.68 8.23 8.23v32.51l-3.66 3.66-27.11 27.12-.03.03c-.04.04-.07.07-.1.11-.67.71-1.07 1.62-1.14 2.59z" opacity="1" data-original="#fecd1a" class=""></path><path fill="#ff9b2e" d="M22.99 31.21H4L31.21 4v18.99a8.22 8.22 0 0 1-8.22 8.22z" opacity="1" data-original="#ff9b2e"></path><g fill="#fffcee"><path d="m79.67 89.17-.04.04c-.04.03-.07.07-.11.1a4.25 4.25 0 0 1-2.59 1.13l-10.21.74A2.549 2.549 0 0 1 64 88.47l.75-10.21c.07-.97.47-1.89 1.14-2.59.03-.04.06-.07.1-.11l.03-.03zM81.21 29.46H39.85c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h41.36c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75zM69.48 52.53H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h43.61c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75zM25.87 79.1h21.81c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75zM69.48 98.68H25.87c-.97 0-1.75.78-1.75 1.75s.78 1.75 1.75 1.75h43.61c.97 0 1.75-.78 1.75-1.75s-.78-1.75-1.75-1.75z" fill="#fffcee" opacity="1" data-original="#fffcee" class=""></path></g></g></svg></button></td>

    </tr>
    @empty
        <tr>
            <td colspan="7">
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
{{$s->links('vendor.pagination.bootstrap-5')}}

</div>
@foreach ($s as $ss )

<div class="modal" id="sure{{$ss->id}}" tabindex="-1" aria-labelledby="sure{{$ss->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$ss->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف السكرتيرة {{$ss->name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/DataManager/{{$ss->id}}"><button type="button" class="btn btn-danger">حذف السكرتيرة</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($s as $ss )

<div class="modal" id="edit{{$ss->id}}" tabindex="-1" aria-labelledby="edit{{$ss->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$ss->id}}">تعديل العميل</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/DataManager/edit/{{$ss->id}}" method="POST">
        @method('PUT')
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name" value="{{$ss->name}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="email" class="form-label">الايميل</label>
    <input required type="text" class="form-control" id="email" name="email" value="{{$ss->email}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="phone" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone" value="{{$ss->phone}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="password" class="form-label">الباسورد</label>
    <input type="password" class="form-control" id="password" name="password" value="">
  </div>

  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل السكرتيرة</button>
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