@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<x-pages.elements.title title="Show" route="{{ route('employee.index') }}" parentPage="employee" currentPage="details" />
<div class="row">
    <div class="col-md-3 mb-30 mb-md-0">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <img src="{{ $employee->image ? asset('storage/employees/avatar/' . $employee->image) : asset('images/avatar.png') }}" alt="" class="avatar-photo border border-secondary rounded-circle">
            </div>
            <h5 class="text-center h5 mb-0">{{ $employee->name }}</h5>
            <p class="text-center text-muted font-14">{{ $employee->designation }}</p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                <ul>
                    <li>
                        <span>Email Address:</span>
                        {{ $employee->email }}
                    </li>
                    <li>
                        <span>Phone Number:</span>
                        {{ $employee->phone }}
                    </li>
                    <li>
                        <span>Address:</span>
                        {{ $employee->address ?? '--' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="row">
            <div class="col-md-5 mb-30 mb-md-0">
                <div class="card-box p-3 mb-3">
                    <h4 class="text-blue h5 mb-30">Assign Role(s)</h4>
                    <form method="POST" id="employee-roles_permissions-assignForm" action="{{ route('employee.roles_permissions.assign', [$employee->id]) }}">
                        @csrf
                        <div class="input-group m-0">
                            <select class="custom-select @error('role_name') is-invalid @enderror" id="role_name" name="role_name" required>
                                <option selected>Choose...</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" onclick="this.disabled=true;document.getElementById('employee-roles_permissions-assignForm').submit();">Assign</button>
                            </div>
                        </div>
                        @error('role_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                </div>
                <div class="card-box p-3">
                    <table class="table mb-0">
                        <tbody>
                            @forelse ($employee->roles as $role)
                                <tr>
                                    <td>{{ ucfirst($role->name) }}</td>
                                    <td class="text-right">
                                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('employee.roles_permissions.revoke', ['employee' => $employee->id, 'role' => $role->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td class="text-center text-muted">No role(s) assigned</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md">
                <div class="card-box p-3 mb-3">
                    <h4 class="text-blue h5 mb-30">Assign Direct Permission(s)</h4>
                    <form action="{{ route('employee.roles_permissions.direct.assign', [$employee->id]) }}" id="employee-roles_permissions-direct-assignForm" method="POST">
                        @csrf
                        <input type="hidden" id="permissions" name="permissions" value="" required>
                        <div class="form-group row">
                            <div class="col pr-0">
                                <select class="selectpicker form-control" onchange="$('#permissions').val($(this).val())" data-size="5" data-style="btn-light text-dark" multiple data-actions-box="true" data-selected-text-format="count">
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3 pl-0">
                                <button type="submit" class="btn btn-block btn-outline-primary m-0" onclick="this.disabled=true;document.getElementById('employee-roles_permissions-direct-assignForm').submit();">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-box p-3">
                    <table class="table data-table stripe hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee->getDirectPermissions() as $directPermission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $directPermission->name }}</td>
                                    <td>
                                        <div class="table-actions d-flex justify-content-end">
                                            <a href="#deleteModal" data-toggle="modal" data-route="{{ route('employee.roles_permissions.direct.revoke', ['employee' => $employee->id, 'permission' => $directPermission->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
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