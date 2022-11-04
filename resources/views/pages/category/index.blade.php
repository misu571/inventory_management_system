@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Category List</x-slot>
    <x-slot:create_route>{{ route('category.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name' }}</x-slot>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="category" :nameId="$category->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>