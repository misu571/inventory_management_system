@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Customer List</x-slot>
    <x-slot:create_route>{{ route('customer.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, Email, Phone, shop name, account name, account number, bank name, branch name' }}</x-slot>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->shop_name }}</td>
                <td>{{ $customer->account_name }}</td>
                <td>{{ $customer->account_number }}</td>
                <td>{{ $customer->bank_name }}</td>
                <td>{{ $customer->branch_name }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('customer.show', ['customer' => $customer->id]) }}"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('customer.edit', ['customer' => $customer->id]) }}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" role="button" href="#deleteModal" data-toggle="modal" data-route="{{ route('customer.destroy', ['customer' => $customer->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>