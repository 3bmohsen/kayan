
<div wire:poll.10s>


<div  class="table-responsive" dir="rtl">

<table class="table text-center table-hover" style="direction: rtl;">
  <thead>
    <tr>
    <th scope="col">كود الوظيفة</th>

        <th scope="col">الموظف</th>
        <th scope="col">العميل</th>
        <th scope="col">المأمورية</th>
        <th scope="col">حالة الوظيفة</th>
        <th scope="col">تاريخ انتهائها</th>
        <th scope="col">التفاصيل
        </th>
    </tr>
  </thead>
  <tbody>
    @forelse ($jobs as $job )

    <tr>
        <td>{{$job->id}}</td>
        <td>{{$job->employee->name}}</td>
        <td>{{$job->client->name}}</td>
        <td>{{$job->client->Missions->mission_name}}</td>
        <td>@if ($job->status == 'waiting')
        <span class="text-light fw-bolder badge text-bg-warning border">قيد الإنتظار</span>
        @elseif($job->status == 'expired')
        <span class="text-light fw-bolder badge text-bg-danger border">منتهية</span>
        @elseif($job->status == 'completed')
        <span class="text-light fw-bolder badge text-bg-success border">مكتملة</span>

        @endif
        <td>{{$job->exp}}</td>
        <td><a href="/JobDetails/{{$job->id}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#fed480" d="M450.882 29.194v453.619c0 13.236-10.73 23.966-23.966 23.966H149.394l-88.273-88.273V29.194c0-13.236 10.73-23.966 23.966-23.966h341.829c13.236 0 23.966 10.73 23.966 23.966z" opacity="1" data-original="#fed480" class=""></path><path fill="#f59977" d="M129.074 186.773h60.259v60.259h-60.259z" opacity="1" data-original="#f59977"></path><path fill="#92e6fd" d="M129.074 284.446h60.259v60.259h-60.259z" opacity="1" data-original="#92e6fd" class=""></path><path fill="#f59977" d="M189.291 382.135v60.284H149.38c0-11.91-8.88-21.836-20.269-23.612v-36.672z" opacity="1" data-original="#f59977"></path><g fill="#021938"><path d="M55.897 29.191v389.318c.301 1.047.231 2.395 1.53 3.694l88.277 88.267a5.247 5.247 0 0 0 3.694 1.53h277.513c16.1 0 29.191-13.091 29.191-29.191V29.191c0-16.1-13.091-29.191-29.191-29.191H85.088c-16.1 0-29.191 13.091-29.191 29.191zm88.277 464.974-70.441-70.432h51.698c9.996 0 18.723 8.522 18.723 18.682 0 .036.02.066.02.101zm9.9-57.121c-1.984-10.489-10.007-19.194-19.735-22.351v-27.334h49.73v49.832h-29.946c-.01-.051-.04-.096-.049-.147zM445.655 29.191v453.618c0 10.336-8.407 18.743-18.743 18.743h-272.29v-53.913h34.67a5.222 5.222 0 0 0 5.224-5.224v-60.28a5.222 5.222 0 0 0-5.224-5.224h-60.178a5.222 5.222 0 0 0-5.224 5.224v31.15H66.345V29.191c0-10.336 8.407-18.743 18.743-18.743h341.823c10.336 0 18.744 8.407 18.744 18.743z" fill="#021938" opacity="1" data-original="#021938" class=""></path><path d="M219.524 198.878a5.222 5.222 0 0 0 5.224 5.224h158.168c2.887 0 5.224-2.337 5.224-5.224s-2.336-5.224-5.224-5.224H224.748a5.222 5.222 0 0 0-5.224 5.224zM224.748 240.15h122.947c2.887 0 5.224-2.337 5.224-5.224s-2.337-5.224-5.224-5.224H224.748c-2.887 0-5.224 2.337-5.224 5.224s2.337 5.224 5.224 5.224zM129.074 252.261h60.259a5.222 5.222 0 0 0 5.224-5.224v-60.259a5.222 5.222 0 0 0-5.224-5.224h-60.259a5.222 5.222 0 0 0-5.224 5.224v60.259a5.221 5.221 0 0 0 5.224 5.224zm5.224-60.26h49.811v49.811h-49.811zM382.916 291.328H224.748a5.221 5.221 0 0 0-5.224 5.224 5.222 5.222 0 0 0 5.224 5.224h158.168c2.887 0 5.224-2.337 5.224-5.224s-2.337-5.224-5.224-5.224zM224.748 337.823h122.947c2.887 0 5.224-2.337 5.224-5.224s-2.337-5.224-5.224-5.224H224.748c-2.887 0-5.224 2.336-5.224 5.224s2.337 5.224 5.224 5.224zM129.074 349.924h60.259a5.222 5.222 0 0 0 5.224-5.224v-60.259a5.222 5.222 0 0 0-5.224-5.224h-60.259a5.222 5.222 0 0 0-5.224 5.224V344.7a5.22 5.22 0 0 0 5.224 5.224zm5.224-60.259h49.811v49.811h-49.811zM382.916 389.002H224.748c-2.887 0-5.224 2.337-5.224 5.224s2.337 5.224 5.224 5.224h158.168a5.221 5.221 0 0 0 5.224-5.224 5.222 5.222 0 0 0-5.224-5.224zM347.695 425.049H224.748c-2.887 0-5.224 2.337-5.224 5.224s2.337 5.224 5.224 5.224h122.947a5.221 5.221 0 0 0 5.224-5.224 5.222 5.222 0 0 0-5.224-5.224zM170.223 152.158a5.222 5.222 0 0 0 5.224-5.224V74.105c0-2.887-2.337-5.224-5.224-5.224s-5.224 2.337-5.224 5.224v72.829a5.22 5.22 0 0 0 5.224 5.224zM262.02 152.158a5.222 5.222 0 0 0 5.224-5.224v-31.191h31.201c2.887 0 5.224-2.337 5.224-5.224s-2.337-5.224-5.224-5.224h-31.201V79.329h31.201c2.887 0 5.224-2.337 5.224-5.224s-2.337-5.224-5.224-5.224H262.02a5.222 5.222 0 0 0-5.224 5.224v72.829a5.22 5.22 0 0 0 5.224 5.224zM194.986 152.158a5.222 5.222 0 0 0 5.224-5.224V93.511l32.527 56.045a5.22 5.22 0 0 0 4.52 2.602c.449 0 .908-.061 1.357-.184a5.209 5.209 0 0 0 3.867-5.04V74.105c0-2.887-2.337-5.224-5.224-5.224s-5.224 2.337-5.224 5.224v53.423l-32.527-56.045a5.23 5.23 0 0 0-5.877-2.418 5.209 5.209 0 0 0-3.867 5.04v72.829a5.22 5.22 0 0 0 5.224 5.224zM339.114 150.812c13.58 0 24.62-11.04 24.62-24.62V90.909c0-13.57-11.04-24.61-24.62-24.61s-24.62 11.04-24.62 24.61v35.282c0 13.581 11.04 24.621 24.62 24.621zm-14.172-59.903c0-7.805 6.357-14.162 14.172-14.162s14.172 6.357 14.172 14.162v35.282c0 7.816-6.357 14.172-14.172 14.172s-14.172-6.357-14.172-14.172z" fill="#021938" opacity="1" data-original="#021938" class=""></path></g></g></svg></a></td>
        
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
{{$jobs->links('vendor.pagination.bootstrap-5')}}

</div>
@foreach ($jobs as $job )

<div class="modal" id="sure{{$job->id}}" tabindex="-1" aria-labelledby="sure{{$job->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$job->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف السكرتيرة {{$job->name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/DataManager/{{$job->id}}"><button type="button" class="btn btn-danger">حذف السكرتيرة</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($jobs as $job )

<div class="modal" id="edit{{$job->id}}" tabindex="-1" aria-labelledby="edit{{$job->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$job->id}}">تعديل العميل</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/DataManager/edit/{{$job->id}}" method="POST">
        @method('PUT')
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">الاسم</label>
    <input required type="text" class="form-control" id="name" name="name" value="{{$job->name}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="email" class="form-label">الايميل</label>
    <input required type="text" class="form-control" id="email" name="email" value="{{$job->email}}">
  </div>
  <div class="col-md-6 justify-content-center">
    <label for="phone" class="form-label">رقم الهاتف</label>
    <input required type="text" class="form-control" id="phone" name="phone" value="{{$job->phone}}">
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