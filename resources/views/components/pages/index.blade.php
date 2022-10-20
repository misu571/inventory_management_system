@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="card-box mb-30">
    <div class="p-3 d-flex justify-content-start align-items-center">
        <h4 class="text-primary h4 my-0 mr-3">Employee List</h4>
        <a href="{{ route('employee.create') }}" role="button" class="btn btn-sm btn-outline-primary m-0"><i class="icon-copy ion-plus-round"></i> Add New</a>
    </div>
    <div class="pb-20">
        <div class="table-responsive">
            <table class="table data-table stripe hover">
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach ($listName($colunm_name) as $item)
                            <th>{{ $item }}</th>
                        @endforeach
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
            {{-- <x-pages.elements.table>
                <x-slot:colunm_name>{{ 'Name, Email, Phone, Address, Experience, Salary' }}</x-slot>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->experience }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="{{ route('employee.show', ['employee' => $employee->id]) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="{{ route('employee.edit', ['employee' => $employee->id]) }}"><i class="dw dw-edit2"></i> Edit</a>
                                    <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-pages> --}}
        </div>
    </div>
</div>
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
@endsection