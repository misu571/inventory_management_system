@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Product List</x-slot>
    <x-slot:create_route>{{ route('product.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>part no.,image,department,brand,category,sub-category,country origin,location,rack no.,quantity,purchase rate</x-slot>
        @foreach ($products as $product)
            @php($image = $product->image ? asset('storage/products/' . $product->image) : asset('images/product_icon.png'))
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->parts_number }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $product->department_name }}</td>
                <td>{{ $product->brand_name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->sub_category_name }}</td>
                <td>{{ $product->country_name }}</td>
                <td>{{ $product->location }}</td>
                <td>{{ $product->rack_number }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>
                    <x-pages.elements.action btn="vd" name="product" :nameId="$product->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>