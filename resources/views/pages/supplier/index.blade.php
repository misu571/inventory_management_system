@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Supplier List</x-slot>
    <x-slot:create_route>{{ route('supplier.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, Email, Phone, type, shop name' }}</x-slot>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->type }}</td>
                <td>{{ $supplier->shop_name }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('supplier.show', ['supplier' => $supplier->id]) }}"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" role="button" href="#deleteModal" data-toggle="modal" data-route="{{ route('supplier.destroy', ['supplier' => $supplier->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>