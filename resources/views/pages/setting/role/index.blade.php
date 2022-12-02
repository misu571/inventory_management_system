@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row mb-30">
    <div class="col-md-4">
        <div class="card-box">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Create New Role</h4>
            </div>
            <div class="p-3">
                <x-forms.role action="{{ route('setting.role.store') }}">
                    <x-slot:name_value>{{ old('name') }}</x-slot>
                    <x-slot:button>
                        <i class="icon-copy ion-plus-round mr-2"></i> Create New
                    </x-slot>
                </x-forms.role>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card-box">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Roles</h4>
            </div>
            <div class="pb-20">
                <div class="table-responsive">
                    <table class="table data-table stripe hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                @if (auth()->user()->id != 1 && $role->id == 1)
                                    @continue
                                @endif
                                <tr id="{{ $role->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ (ucfirst($role->name)) }}</td>
                                    <td class="text-right">
                                        @if ($loop->iteration > 1)
                                            <div class="table-actions d-flex justify-content-end">
                                                <a href="{{ route('setting.role.edit', [$role->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                                                    <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                                                </a>
                                                <a href="#deleteModal" data-toggle="modal" data-route="{{ route('setting.role.destroy', [$role->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                                                    <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                                                </a>
                                            </div>
                                        @else
                                            <i class="icon-copy ti-more-alt"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
</script>
@endsection