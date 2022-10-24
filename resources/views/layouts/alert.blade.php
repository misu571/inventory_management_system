@if (session('alert'))
    @switch(session('alert')->status)
        @case('success')
            @php $icon = 'ion-checkmark-round' @endphp
            @break
        @case('warning')
            @php $icon = 'ion-alert' @endphp
            @break
        @default
            @php $icon = 'ion-close-round' @endphp
    @endswitch
    <div class="position-fixed m-0" style="z-index: 200; top: 10%; right: 2%;">
        <div class="toast hide border-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4500">
            <div class="toast-body alert bg-{{ session('alert')->status }} alert-dismissible fade show mb-0 border-0">
                <h6 class="text-light m-0"><i class="icon-copy {{ $icon }} mr-2"></i>{{ session('alert')->message }}</h6>
            </div>
        </div>
    </div>
@endif
