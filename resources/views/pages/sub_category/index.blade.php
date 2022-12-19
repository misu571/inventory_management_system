@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Sub-Category List</x-slot>
    <x-slot:create_route>{{ route('sub-category.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,category Name' }}</x-slot>
        @foreach ($subCategories as $subCategory)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subCategory->name }}</td>
                <td>{{ $subCategory->category_name }}</td>
                <td>
                    <a href="{{ route('sub-category.edit', [$subCategory->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                        <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                    </a>
                    <a href="#deleteModal" data-toggle="modal" data-route="{{ route('sub-category.destroy', [$subCategory->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                        <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>