<div wire:poll.1s>
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center mb-5">
    <div class="container-fluid mt-2 ">
    <input required class="form-control me-2 text-center" wire:model="fileName" type="search" name="search" id="search" placeholder="البحث بستخدام الملاحظات الخاصه بالحساب" aria-label="Search">
    </div>
</div>
<div wire:poll.10s>
@forelse ($docs as $doc)

<div class="d-flex flex-column flex-md-row " >
            <div class="d-flex flex-column ">
            <div class="d-flex flex-row justify-content-lg-start justify-content-center p-3">
            <a href="" data-bs-toggle="modal" data-bs-target="#edit{{$doc->id}}" class="btn btn-primary m-3 mb-0">تعديل الحساب</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#sure{{$doc->id}}" class="btn btn-danger m-3 mb-0">حذف الحساب</a>

                </div>
                <div class="d-flex flex-column flex-md-row text-center">
                <p class="p-2">المبلغ المستلم: {{ $doc->rec_amount }}</p>
                <p class="p-2">المبلغ المصروف: {{ $doc->spent_amount }}</p>
                <p class="p-2">صافي الربح: {{ $doc->profit }}</p>

                </div>

                <div class=" p-2">
                <p class="">الملاحظات: </p>
                <p class="" style="white-space: pre-wrap;">{{ $doc->notes }}</p>

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
        <div class="d-flex align-items-center justify-content-center mt-3">
{{$docs->links('vendor.pagination.bootstrap-5')}}

</div>


@foreach ($docs as $doc )

<div class="modal" id="sure{{$doc->id}}" tabindex="-1" aria-labelledby="sure{{$doc->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="sure{{$doc->id}}">تحذير</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
          هل انت متأكد من حذف هذا الحساب
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/ClientMoney/{{$doc->id}}"><button type="button" class="btn btn-danger">حذف الحساب</button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach










@foreach ($docs as $doc )

<div class="modal" id="edit{{$doc->id}}" tabindex="-1" aria-labelledby="edit{{$doc->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$doc->id}}">تعديل الحساب</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/ClientMoney/edit/{{$doc->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
  @csrf
  <div class="col-md-6">
    <label for="rec_amount" class="form-label">المبلغ المستلم</label>
    <input required type="text" class="form-control" id="rec_amount" value="{{ $doc->rec_amount }}" name="rec_amount">
  </div>
  <div class="col-md-6">
    <label for="spent_amount" class="form-label">المبلغ المصروف</label>
    <input required type="text" class="form-control" id="spent_amount" value="{{ $doc->spent_amount }}" name="spent_amount">
  </div>
  <div class="mb-3">
  <label for="notes" class="form-label">ملاحظات</label>
  <textarea required  class="form-control" name="notes" id="notes" rows="3">{{ $doc->notes }}</textarea>
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

    </div>
</div>