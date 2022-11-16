@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Brand List</x-slot>
    <x-slot:create_route>{{ route('brand.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name' }}</x-slot>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="brand" :nameId="$brand->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>