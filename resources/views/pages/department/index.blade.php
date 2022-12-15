@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Department List</x-slot>
    <x-slot:create_route>{{ route('department.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name' }}</x-slot>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="department" :nameId="$department->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>