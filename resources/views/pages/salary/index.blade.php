@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Salary List</x-slot>
    <x-slot:create_route>{{ route('salary.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name, amount, given date, status, advance salary' }}</x-slot>
        @foreach ($salaries as $salary)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $salary->employee_name }}</td>
                <td>{{ $salary->amount }}</td>
                <td>{{ date_format(date_create($salary->given_at), 'd M Y') }}</td>
                <td>{{ $salary->status }}</td>
                <td>{{ $salary->advance_salary ?? '--' }}</td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('salary.edit', [$salary->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                            <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('salary.destroy', [$salary->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>