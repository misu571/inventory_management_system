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
                <td>{{ $product->image }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->supplier_name }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->purchase_at }}</td>
                <td>{{ $product->expire_at }}</td>
                <td>{{ $product->selling_price }}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('product.show', ['product' => $product->id]) }}"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('product.edit', ['product' => $product->id]) }}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" role="button" href="#deleteModal" data-toggle="modal" data-route="{{ route('product.destroy', ['product' => $product->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>