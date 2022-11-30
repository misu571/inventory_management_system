@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Product List</x-slot>
    <x-slot:create_route>{{ route('product.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'department, image, brand, category, supplier, serial, Purchase Price, Purchase At' }}</x-slot>
        @foreach ($products as $product)
            @php $image = $product->image ? asset('storage/products/' . $product->image) : asset('images/product_icon.png') @endphp
            <tr id="{{ $product->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->department }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $product->brand_name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->supplier_name }}</td>
                <td>{{ $product->serial_number }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ date_format(date_create($product->purchase_at), 'd M Y') }}</td>
                <td>
                    <x-pages.elements.action btn="a" name="product" :nameId="$product->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>