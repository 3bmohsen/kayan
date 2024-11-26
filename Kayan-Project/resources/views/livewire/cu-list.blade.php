<div wire:poll.1s>
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center mb-5">
    <div class="container-fluid mt-2 ">
    <input required class="form-control me-2 text-center" wire:model="fileName" type="search" name="search" id="search" placeholder="البحث بستخدام إسم الملف" aria-label="Search">
    </div>
</div>
<div wire:poll.10s>
@forelse ($docs as $doc)

<div class="d-flex flex-column flex-md-row " >
        @if ($doc->file_path != null)
          <div class="d-flex p-3 border-start flex-column" style="">
               <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-center"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0" viewBox="0 0 510 510" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><linearGradient id="b" x1="157.153" x2="399.748" y1="198.847" y2="441.441" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#7faef4"></stop><stop offset="1" stop-color="#4c8df1"></stop></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#4c8df1" stop-opacity="0"></stop><stop offset="1" stop-color="#4256ac"></stop></linearGradient><linearGradient xlink:href="#a" id="c" x1="410.106" x2="371.606" y1="173.728" y2="61.228" gradientUnits="userSpaceOnUse"></linearGradient><linearGradient id="d" x1="343.272" x2="387.993" y1="58.728" y2="103.45" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a7c5fd"></stop><stop offset="1" stop-color="#7faef4"></stop></linearGradient><linearGradient xlink:href="#a" id="e" x1="1319" x2="1319" y1="463.7" y2="513.288" gradientTransform="matrix(-1 0 0 1 1574 0)" gradientUnits="userSpaceOnUse"></linearGradient><path fill="url(#b)" d="M68.17 31.88v446.25c0 17.529 14.341 31.87 31.87 31.87h309.91c17.534 0 31.88-14.346 31.88-31.88V117.395a36.905 36.905 0 0 0-10.808-26.094l-80.493-80.493A36.905 36.905 0 0 0 324.435 0H100.05C82.516 0 68.17 14.346 68.17 31.88z" opacity="1" data-original="url(#b)" class=""></path><path fill="#ebeff0" d="M153.111 246.041h203.778a9.196 9.196 0 0 0 9.196-9.196V214.42a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.196zM153.111 309.756h203.778a9.196 9.196 0 0 0 9.196-9.196v-22.425a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.196zM153.111 373.47h203.778a9.196 9.196 0 0 0 9.196-9.196V341.85a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.195zM150.573 437.185h103.155a6.658 6.658 0 0 0 6.658-6.658v-27.5a6.658 6.658 0 0 0-6.658-6.658H150.573a6.658 6.658 0 0 0-6.658 6.658v27.5a6.658 6.658 0 0 0 6.658 6.658z" opacity="1" data-original="#ebeff0" class=""></path><path fill="url(#a)" d="M350.528 10.808A36.904 36.904 0 0 0 333.5 1.132v103.922l108.33 108.33v-95.99A36.905 36.905 0 0 0 431.022 91.3z" opacity="1" data-original="url(#a)" class=""></path><path fill="url(#d)" d="M440.737 108.443c.118.512.227 1.011.326 1.492h-97.648c-6.914 0-12.52-5.605-12.52-12.52V.581a59.1 59.1 0 0 1 2.392.478c7.279 1.61 13.916 5.353 19.188 10.624l77.655 77.655a39.64 39.64 0 0 1 10.607 19.105z" opacity="1" data-original="url(#d)" class=""></path><path fill="url(#a)" d="M441.83 447.201v30.919c0 17.534-14.346 31.88-31.88 31.88H100.04c-17.529 0-31.87-14.342-31.87-31.87v-30.929z" opacity="1" data-original="url(#a)" class=""></path></g></svg></a>
                <p class="text-center mt-1">{{ $doc->file_name }}</p>
            </div>
            @else
            <p class="text-center text-danger m-4 fw-bolder">لا يوجد ملف</p>
          @endif
            <div class="d-flex flex-column ">
            <div class="d-flex flex-row justify-content-lg-start justify-content-center p-3">
            <a href="" data-bs-toggle="modal" data-bs-target="#edit{{$doc->id}}" class="btn btn-primary m-3 mb-0">تعديل الإقرار</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#sure{{$doc->id}}" class="btn btn-danger m-3 mb-0">حذف الإقرار</a>

                </div>
                <p class="p-2">تاريخ الانتهاء : {{$doc->expDate}}</p>
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
                    لا توجد بيانات لعرضها
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
          هل انت متأكد من حذف الإقرار {{$doc->file_name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <a href="/del/TaxCard/{{$doc->id}}"><button type="button" class="btn btn-danger">حذف الإقرار</button></a>
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
          <h5 class="modal-title fs-5 text-center cairo-bold" id="edit{{$doc->id}}">تعديل الإقرار</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body text-center">
        <form class="row g-3 mt-5" action="/TaxCard/edit/{{$doc->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
  @csrf
  <input required type="hidden" value="1" name="filetype">
  <div class="col-md-6">
    <label for="doc_file" class="form-label">ملف الإقرار</label>
    <input type="file" class="form-control" id="doc_file" name="doc_file">
  </div>
  <div class="col-md-6">
    <label for="doc_name" class="form-label">اسم الإقرار</label>
    <input required type="text" class="form-control" id="doc_name" name="doc_name" value="{{$doc->file_name}}">
  </div>
  <div class="col-md-12">
    <label for="expDate" class="form-label">تاريخ الانتهاء</label>
    <input required type="date" class="form-control" id="expDate" name="expDate" value="{{$doc->expDate}}">
  </div>
  <div class="col-md-12">
    <label for="notes" class="form-label">الملاحظات</label>
    <textarea required  class="form-control" name="notes" id="notes" rows="3" value="">{{$doc->notes}}</textarea>
  </div>
  <div class="col-12 text-center mb-5">
    <button type="submit" class="btn btn-primary">تعديل الإقرار</button>
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