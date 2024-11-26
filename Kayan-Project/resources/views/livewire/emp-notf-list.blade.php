<div wire:poll.10s>
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">الإشعارات</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/EMPmarkreaded" method="POST">
    @method('PUT')
    @csrf
    @forelse($notf as $not)
        <div class="d-flex justify-content-start align-items-center flex-row">
            <div class="d-flex flex-column">
                <p style="font-size: small;">{{$not->created_at->format('Y-m-d h:i A')}}</p>
                <p>{!! $not->message !!}</p>
            </div>
            @if ($not->is_read == 'true')
            <div class=" ms-auto form-check"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 520 520" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="15-Checked"><circle cx="208.52" cy="288.5" r="176.52" fill="#b0ef8f" opacity="1" data-original="#b0ef8f" class=""></circle><path fill="#009045" d="m210.516 424.937-2.239-3.815c-34.2-58.27-125.082-181.928-126-183.17l-1.311-1.781 30.963-30.6 98.012 68.439c61.711-80.079 119.283-135.081 156.837-167.2C407.859 71.675 434.6 55.5 434.87 55.345l.608-.364H488l-5.017 4.468C353.954 174.375 214.1 418.639 212.707 421.093z" opacity="1" data-original="#009045" class=""></path></g></g></svg></div>
            @endif
            @if ($not->is_read == 'false')
            <div class="form-check ms-auto">
                <input class="form-check-input" type="checkbox" value="{{$not->id}}" id="flexCheckChecked{{$not->id}}" name="readed[]">
                <label class="form-check-label" for="flexCheckChecked{{$not->id}}">
                    تمييز كمقروءة
                </label>
            </div>
            @endif

        </div>
        <hr>
    @empty
        <div class="alert alert-danger text-center cairo-bold m-5">
            لا توجد اشعارات لعرضها
        </div>
    @endforelse        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق
        </button>
        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </div>
</form>
      </div>
    </div>
  </div>
</div>





    </div>
