@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Sub-Category List</x-slot>
    <x-slot:create_route>{{ route('sub-category.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'category Name, Name' }}</x-slot>
        @foreach ($subCategories as $subCategory)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subCategory->category_name }}</td>
                <td>{{ $subCategory->name }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="sub-category" :nameId="$subCategory->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>