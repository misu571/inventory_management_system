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
                    <x-pages.elements.action btn="a" name="customer" :nameId="$customer->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>