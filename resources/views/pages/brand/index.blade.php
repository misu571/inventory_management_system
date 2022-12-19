@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Brand List</x-slot>
    <x-slot:create_route>{{ route('brand.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name' }}</x-slot>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="{{ route('brand.edit', [$brand->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                        <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                    </a>
                    <a href="#deleteModal" data-toggle="modal" data-route="{{ route('brand.destroy', [$brand->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                        <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>