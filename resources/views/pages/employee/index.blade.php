@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Employee List</x-slot>
    <x-slot:create_route>{{ route('employee.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,image, position, Email, Phone, NID' }}</x-slot>
        @foreach ($employees as $employee)
            @php $image = $employee->image ? asset('storage/avatar/employee/' . $employee->image) : asset('images/avatar.png') @endphp
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
                <td>{{ $employee->nid }}</td>
                <td>
                    <x-pages.elements.action btn="a" name="employee" :nameId="$employee->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>