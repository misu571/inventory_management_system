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
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('customer.edit', [$customer->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                            <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('customer.destroy', [$customer->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>