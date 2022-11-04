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
                    <x-pages.elements.action btn="a" name="supplier" :nameId="$supplier->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>