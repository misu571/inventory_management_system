@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Customer List</x-slot>
    <x-slot:create_route>{{ route('customer.create') }}</x-slot>
    <x-slot:previewImage>
        @include('pages.elements.modals.preview_image')
    </x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, image, Email, Phone, shop name, account name, account number' }}</x-slot>
        @foreach ($customers as $customer)
            @php $image = $customer->image ? asset('storage/avatar/customer/' . $customer->image) : asset('images/avatar.png') @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>
                    <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                        <img class="img-thumbnail" src="{{ $image }}" alt="" width="50">
                    </a>
                </td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->shop_name }}</td>
                <td>{{ $customer->account_name }}</td>
                <td>{{ $customer->account_number }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="customer" :nameId="$customer->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>