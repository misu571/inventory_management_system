@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<x-pages.elements.title title="Form" route="{{ route('setting.role-permission.index') }}" parentPage="roles & Permissions" currentPage="edit" />
<div class="row">
    <div class="col-md-5 mb-30 mb-md-0">
        <div class="card-box p-3 mb-4">
            <form action="{{ route('setting.role-permission.role.update', [$role->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="input-group mb-0">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $role->name }}" placeholder="Edit role" aria-label="Edit role" aria-describedby="role">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="role">Edit Entry</button>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </form>
        </div>
        <div class="card-box p-3">
            <form action="{{ route('setting.role-permission.permission.assign.role', [$role->id]) }}" method="POST">
                @csrf
                <input type="hidden" id="permissions" name="permissions" value="">
                <div class="form-group mb-4">
                    <select class="selectpicker form-control" onchange="$('#permissions').val($(this).val())" data-size="5" data-style="btn-light text-dark" multiple data-actions-box="true" data-selected-text-format="count">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-lg btn-primary m-0">
                        <i class="icon-copy ion-android-create mr-2"></i> Assign Permission(s)
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md">
        <div class="card-box">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Role's Permission(s)</h4>
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
                            @foreach ($role->getAllPermissions() as $permission)
                                <tr id="{{ $permission->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td class="text-right">
                                        <div class="table-actions d-flex justify-content-end">
                                            <a href="#deleteModal" data-toggle="modal" data-route="{{ route('setting.role-permission.permission.assign.role.revoke', ['role' => $role->id, 'permission' => $permission->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                                                <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                                            </a>
                                        </div>
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

<!-- Delete -->
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