<div wire:poll.10s>
    @forelse($notes as $note)
<div class="card mb-3" style="--bs-card-bg: #3cac81c7;">
          <div class="card-body">
            <div class="d-flex flex-start">
              <div class="w-100">
                <div class="d-flex flex-column justify-content-center align-items-start mb-3">
                <p class="mb-0 text-start">{{$note->created_at->format('Y-m-d h:i A')}}</p>

                  <h6 class="text-dark fw-semibold m-2" style="line-height: 1.3">
{{$note->note}}
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <tr>
            <td colspan="7">
                <div class="alert alert-danger text-center cairo-bold m-5">
                    لا توجد ملاحظات 
                </div>
            </td>
        </tr>
        @endforelse

    </div>
