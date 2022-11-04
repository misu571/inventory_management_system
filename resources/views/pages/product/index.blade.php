@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Product List</x-slot>
    <x-slot:create_route>{{ route('product.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, image, category, supplier, code, Purchase Price, Purchase At, Expire At, Selling Price' }}</x-slot>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td><img src="{{ $product->image }}" alt="" width="20"></td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->supplier_name }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->purchase_at }}</td>
                <td>{{ $product->expire_at }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>
                    <x-pages.elements.action btn="a" name="product" :nameId="$product->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>