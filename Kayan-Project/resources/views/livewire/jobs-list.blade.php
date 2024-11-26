<div wire:poll.1s>
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center mb-2">
    <div class="container-fluid mt-2 ">
    <input required class="form-control me-2 text-center" wire:model="job_details" type="search" name="search" id="search" placeholder="البحث بستخدام تفاصيل الوظيفة" aria-label="Search">
    </div>
    <div class="container-fluid mt-2 ">
        <select wire:model="status" name="search" id="search" class="form-control text-center" aria-label="Search">
            <option selected value="">حالة الوظائف</option>
            <option value="waiting">قيد الانتظار</option>
            <option value="completed">مكتملة</option>
            <option value="expired">منتهية</option>
        </select>
  </div>
  <div class="container-fluid mt-2 ">
    <input required type="date" class="form-control" id="exp" value="" name="exp" wire:model="exp">
  </div>
</div>
<div wire:poll.10s>
@forelse($empJobs as $empJob)
        <div class="d-flex flex-column flex-md-row border" style="background-color: #2980b991; border-radius: 10px; overflow: hidden;">
    <!-- العمود الخاص بالعميل وتاريخ الانتهاء -->
    <div class="d-flex p-4 border-end flex-column justify-content-center" style="min-width: 30%; color: #333;">
        <p><strong>الوظيفة خاصة بالعميل:</strong> {{$empJob->client->name}}</p>
        <p><strong> المأمورية:</strong> {{$empJob->client->Missions->mission_name}}</p>
        <p><strong>تاريخ انتهائها:</strong> {{$empJob->exp}}</p>
        <p><strong>حالة الوظيفة:</strong> @if ($empJob->status == 'waiting')
        <span class="text-dark fw-bolder badge text-bg-warning fs-6">قيد الإنتظار</span>
        @elseif($empJob->status == 'expired')
        <span class="text-light fw-bolder badge text-bg-danger fs-6">منتهية (لم تسلم في ميعادها)</span>
        @elseif($empJob->status == 'completed')
        <span class="text-light fw-bolder badge text-bg-success fs-6">مكتملة (سلمت في ميعادها)</span>

        @endif
    </p>
    </div>
<div class="d-flex flex-column justify-content-center align-items-center text-center" style="min-width: 70%; color: #333; overflow: hidden;">
<div class="d-flex flex-column flex-md-row justify-content-center align-items-md-end align-items-center p-4">
<a href="" data-bs-toggle="modal" data-bs-target="#edit{{$empJob->id}}" class="btn fw-normal btn-primary m-3 mb-0">تعديل الوظيفة</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#sure{{$empJob->id}}" class="btn fw-normal btn-danger m-3 mb-0">حذف الوظيفة</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#note{{$empJob->id}}" class="btn fw-normal btn-warning m-3 mb-0">الملاحظات الخاصه بالوظيفة</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#move{{$empJob->id}}" class="btn fw-normal btn-info m-3 mb-0">تغيير الموظف</a>

    </div>
    <!-- العمود الخاص بتفاصيل الوظيفة -->
    @if ($empJob->file_path != null)
          <div class="d-flex p-3  flex-column" style="">
               <a href="{{ asset('storage/' . $empJob->file_path) }}" target="_blank" class="text-center"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0" viewBox="0 0 510 510" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><linearGradient id="b" x1="157.153" x2="399.748" y1="198.847" y2="441.441" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#7faef4"></stop><stop offset="1" stop-color="#4c8df1"></stop></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#4c8df1" stop-opacity="0"></stop><stop offset="1" stop-color="#4256ac"></stop></linearGradient><linearGradient xlink:href="#a" id="c" x1="410.106" x2="371.606" y1="173.728" y2="61.228" gradientUnits="userSpaceOnUse"></linearGradient><linearGradient id="d" x1="343.272" x2="387.993" y1="58.728" y2="103.45" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a7c5fd"></stop><stop offset="1" stop-color="#7faef4"></stop></linearGradient><linearGradient xlink:href="#a" id="e" x1="1319" x2="1319" y1="463.7" y2="513.288" gradientTransform="matrix(-1 0 0 1 1574 0)" gradientUnits="userSpaceOnUse"></linearGradient><path fill="url(#b)" d="M68.17 31.88v446.25c0 17.529 14.341 31.87 31.87 31.87h309.91c17.534 0 31.88-14.346 31.88-31.88V117.395a36.905 36.905 0 0 0-10.808-26.094l-80.493-80.493A36.905 36.905 0 0 0 324.435 0H100.05C82.516 0 68.17 14.346 68.17 31.88z" opacity="1" data-original="url(#b)" class=""></path><path fill="#ebeff0" d="M153.111 246.041h203.778a9.196 9.196 0 0 0 9.196-9.196V214.42a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.196zM153.111 309.756h203.778a9.196 9.196 0 0 0 9.196-9.196v-22.425a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.196zM153.111 373.47h203.778a9.196 9.196 0 0 0 9.196-9.196V341.85a9.196 9.196 0 0 0-9.196-9.196H153.111a9.196 9.196 0 0 0-9.196 9.196v22.425a9.196 9.196 0 0 0 9.196 9.195zM150.573 437.185h103.155a6.658 6.658 0 0 0 6.658-6.658v-27.5a6.658 6.658 0 0 0-6.658-6.658H150.573a6.658 6.658 0 0 0-6.658 6.658v27.5a6.658 6.658 0 0 0 6.658 6.658z" opacity="1" data-original="#ebeff0" class=""></path><path fill="url(#a)" d="M350.528 10.808A36.904 36.904 0 0 0 333.5 1.132v103.922l108.33 108.33v-95.99A36.905 36.905 0 0 0 431.022 91.3z" opacity="1" data-original="url(#a)" class=""></path><path fill="url(#d)" d="M440.737 108.443c.118.512.227 1.011.326 1.492h-97.648c-6.914 0-12.52-5.605-12.52-12.52V.581a59.1 59.1 0 0 1 2.392.478c7.279 1.61 13.916 5.353 19.188 10.624l77.655 77.655a39.64 39.64 0 0 1 10.607 19.105z" opacity="1" data-original="url(#d)" class=""></path><path fill="url(#a)" d="M441.83 447.201v30.919c0 17.534-14.346 31.88-31.88 31.88H100.04c-17.529 0-31.87-14.342-31.87-31.87v-30.929z" opacity="1" data-original="url(#a)" class=""></path></g></svg></a>
                <p class="text-center mt-1">{{ $empJob->file_name }}</p>
                <a href="#" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#surefile{{$empJob->id}}">حذف الملف</a>
            </div>
            @else
            <p class="text-center text-danger m-4 fw-bolder">لا يوجد ملف</p>
          @endif
    <div class="d-flex flex-column justify-content-center align-items-start p-4" style="min-width: 70%; color: #333; overflow: hidden;">
        <p><strong>تفاصيل الوظيفة:</strong></p>
        <div style="max-height: 150px; overflow-y: auto; width: 100%;">
            <p style="margin: 0; word-wrap: break-word;">{{$empJob->job_details}}</p>
        </div>
    </div>
</div>


</div>
<hr style="border: 2px solid #333;">

        @empty
        <tr>
            <td colspan="6">
                <div class="alert alert-danger text-center cairo-bold m-5">
                    لا توجد وظائف لعرضها
                </div>
            </td>
        </tr>
        @endforelse
            <div class="d-flex justify-content-center align-items-center">
            {{ $empJobs->links('vendor.pagination.bootstrap-5') }}
            </div>

</div>