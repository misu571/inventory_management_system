@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Sub-Group List</x-slot>
    <x-slot:create_route>{{ route('sub-group.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,category Name,sub-category Name' }}</x-slot>
        @foreach ($subGroups as $subGroup)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subGroup->name }}</td>
                <td>{{ $subGroup->category_name }}</td>
                <td>{{ $subGroup->sub_category_name }}</td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('sub-group.edit', [$subGroup->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                            <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('sub-group.destroy', [$subGroup->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>