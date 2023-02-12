@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Supplier List</x-slot>
    <x-slot:create_route>{{ route('supplier.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, image, Email, Phone, type, shop name' }}</x-slot>
        @foreach ($suppliers as $supplier)
            @php $image = $supplier->image ? asset('storage/avatar/supplier/' . $supplier->image) : asset('images/avatar.png') @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->name }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->type }}</td>
                <td>{{ $supplier->shop_name }}</td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('supplier.edit', [$supplier->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                            <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('supplier.destroy', [$supplier->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>