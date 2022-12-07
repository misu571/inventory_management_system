@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Employee List</x-slot>
    <x-slot:create_route>{{ route('employee.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,image, position, Email, Phone, Roles - Permissions' }}</x-slot>
        @foreach ($employees as $employee)
            @php $image = $employee->image ? asset('storage/employees/avatar/' . $employee->image) : asset('images/avatar.png') @endphp
            <tr id="{{ $employee->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <a href="{{ route('employee.roles_permissions.show', [$employee->id]) }}" class="btn btn-sm btn-outline-primary m-0">Assign</a>
                </td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('employee.show', [$employee->id]) }}" data-color="#6c757d" style="color: rgb(108,117,125);">
                            <i class="icon-copy dw dw-view" data-toggle="tooltip" title="View"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('employee.destroy', [$employee->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>