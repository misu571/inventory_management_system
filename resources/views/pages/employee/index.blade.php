@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Employee List</x-slot>
    <x-slot:create_route>{{ route('employee.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, Email, Phone, Address, Experience, Salary' }}</x-slot>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->experience }}</td>
                <td>{{ $employee->salary }}</td>
                <td>
                    <x-pages.elements.action btn="a" name="employee" :nameId="$employee->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>