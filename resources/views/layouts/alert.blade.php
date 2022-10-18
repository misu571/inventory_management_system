@if (session('alert'))
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        <div class="toast hide border-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3500">
            <div class="toast-body alert alert-{{ session('alert')->status }} alert-dismissible mb-0 border-0">
                {{ session('alert')->message }}
            </div>
        </div>
    </div>
@endif