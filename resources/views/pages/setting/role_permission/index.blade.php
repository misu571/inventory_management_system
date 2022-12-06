@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card-box mb-3">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Create New Role</h4>
            </div>
            <div class="p-3">
                <form action="{{ route('setting.role-permission.role.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-0">
                        <input type="text" id="role_name" name="role_name" class="form-control @error('role_name') is-invalid @enderror" value="{{ old('role_name') }}" placeholder="Add new role" aria-label="Add new role" aria-describedby="role">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="role">Create New</button>
                        </div>
                        @error('role_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
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
                                <tr id="{{ $role->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ (ucfirst($role->name)) }}</td>
                                    <td class="text-right">
                                        @if ($role->id > 2)
                                            <div class="table-actions d-flex justify-content-end">
                                                <a href="{{ route('setting.role-permission.role.edit', [$role->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                                                    <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                                                </a>
                                                <a href="#deleteModal" data-toggle="modal" data-route="{{ route('setting.role-permission.role.destroy', [$role->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
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
    <div class="col-md-6">
        <div class="card-box mb-3">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Create New Permission</h4>
            </div>
            <div class="p-3">
                <form action="{{ route('setting.role-permission.permission.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-0">
                        <input type="text" id="permission_name" name="permission_name" class="form-control @error('permission_name') is-invalid @enderror" value="{{ old('permission_name') }}" placeholder="Add new permission" aria-label="Add new permission" aria-describedby="permission">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="permission">Create New</button>
                        </div>
                        @error('permission_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
        <div class="card-box">
            <div class="p-3 d-flex justify-content-start align-items-center">
                <h4 class="text-primary h4 my-0 mr-3">Permissions</h4>
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
                            @foreach ($permissions as $permission)
                                <tr id="{{ $permission->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td class="text-right">
                                        @if ($permission->id > 18)
                                            <div class="table-actions d-flex justify-content-end">
                                                <a href="{{ route('setting.role-permission.permission.edit', [$permission->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                                                    <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                                                </a>
                                                <a href="#deleteModal" data-toggle="modal" data-route="{{ route('setting.role-permission.permission.destroy', [$permission->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
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