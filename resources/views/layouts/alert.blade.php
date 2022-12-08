@if (session('alert'))
    @switch(session('alert')->status)
        @case('success')
            @php $icon = 'dw dw-checked'; $color = 'light' @endphp
            @break
        @case('warning')
            @php $icon = 'dw dw-warning'; $color = 'dark' @endphp
            @break
        @default
            @php $icon = 'dw dw-cancel'; $color = 'light' @endphp
    @endswitch
    <div class="position-fixed m-0" style="z-index: 200; top: 10%; right: 2%;">
        <div class="toast hide border-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
            <div class="toast-body alert bg-{{ session('alert')->status }} alert-dismissible fade show mb-0 border-0">
                <h6 class="text-{{ $color }} m-0"><i class="micon {{ $icon }} mr-2"></i>{{ session('alert')->message }}</h6>
            </div>
        </div>
    </div>
@endif
