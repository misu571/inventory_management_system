@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Employee List</x-slot>
    <x-slot:create_route>{{ route('employee.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{!! 'Name,image, designation, Email, Phone, Roles & Permissions' !!}</x-slot>
        @foreach ($employees as $employee)
            @php $image = $employee->image ? asset('storage/employees/avatar/' . $employee->image) : asset('images/avatar.png') @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $employee->designation }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    @if (auth()->user()->id == $employee->id)
                        <i class="icon-copy ti-more-alt"></i>
                    @else
                        @hasanyrole('super-admin|admin')
                            <a href="{{ route('employee.roles_permissions.show', [$employee->employee_id]) }}" class="btn btn-sm btn-outline-info m-0">Assign</a>
                        @else
                            <i class="icon-copy ti-more-alt"></i>
                        @endhasanyrole
                    @endif
                </td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        @if (auth()->user()->id == $employee->id)
                            <i class="icon-copy ti-more-alt"></i>
                        @else
                            {{-- @hasanyrole('super-admin|admin') --}}
                                <a href="{{ route('employee.show', [$employee->employee_id]) }}" data-color="#6c757d" style="color: rgb(108,117,125);">
                                    <i class="icon-copy dw dw-view" data-toggle="tooltip" title="View"></i>
                                </a>
                                <a href="#deleteModal" data-toggle="modal" data-route="{{ route('employee.destroy', [$employee->employee_id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                                    <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                                </a>
                            {{-- @else
                                <i class="icon-copy ti-more-alt"></i>
                            @endhasanyrole --}}
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>