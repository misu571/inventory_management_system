@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="card-box mb-30">
    <div class="p-3 d-flex justify-content-start align-items-center">
        <h4 class="text-primary h4 my-0 mr-3">{{ $page_name }}</h4>
        <a href="{{ $create_route }}" role="button" class="btn btn-sm btn-outline-primary m-0"><i class="icon-copy ion-plus-round"></i> Add New</a>
    </div>
    <div class="pb-20">
        <div class="table-responsive">
            {{ $slot }}
        </div>
    </div>
</div>

<!-- Preview image modal -->
{{ $previewImage ?? null }}
<!-- Delete modal -->
@include('pages.elements.modals.delete')
@endsection

@section('deskapp_scripts')
<script src="{{ asset('deskapp/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
<!-- Datatable Setting js -->
<script src="{{ asset('deskapp/vendors/scripts/datatable-setting.js') }}"></script>
<script>
    // Delete
    $('#deleteModal').on('show.bs.modal', function (event) {
        $(this).find('form').attr('action', $(event.relatedTarget).data('route'))
    })

    // Preview
    $('#previewImage').on('show.bs.modal', function (event) {
        $(this).find('img').attr('src', $(event.relatedTarget).data('image'))
    })
</script>
@endsection