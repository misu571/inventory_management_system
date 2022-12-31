@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Product List</x-slot>
    <x-slot:create_route>{{ route('product.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>part no.,image,department,brand,category,sub-category,Sub sub-category,country origin,location,rack no.,quantity,purchase rate</x-slot>
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
                <td>{{ $product->sub_group_name }}</td>
                <td>{{ $product->country_name }}</td>
                <td>{{ $product->location }}</td>
                <td>{{ $product->rack_number }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('product.show', [$product->id]) }}" data-color="#6c757d" style="color: rgb(108,117,125);">
                            <i class="icon-copy dw dw-view" data-toggle="tooltip" title="View"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('product.destroy', [$product->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>