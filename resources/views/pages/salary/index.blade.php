@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Salary List</x-slot>
    <x-slot:create_route>{{ route('salary.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, amount, given date, status, advance salary' }}</x-slot>
        @foreach ($salaries as $salary)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $salary->name }}</td>
                <td>{{ $salary->amount }}</td>
                <td>{{ date_format(date_create($salary->given_at), 'd M Y') }}</td>
                <td>{{ $salary->status }}</td>
                <td>{{ $salary->advance_salary ?? '--' }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="salary" :nameId="$salary->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>