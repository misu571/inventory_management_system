@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Category List</x-slot>
    <x-slot:create_route>{{ route('category.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name' }}</x-slot>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('category.show', ['category' => $category->id]) }}"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('category.edit', ['category' => $category->id]) }}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" role="button" href="#deleteModal" data-toggle="modal" data-route="{{ route('category.destroy', ['category' => $category->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>