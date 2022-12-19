@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Expense List</x-slot>
    <x-slot:create_route>{{ route('expense.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'date, Details, Amount' }}</x-slot>
        @foreach ($expenses as $expense)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date_format(date_create($expense->expense_at), 'd M Y') }}</td>
                <td>{{ $expense->details }}</td>
                <td>{{ $expense->amount }}</td>
                <td>
                    <a href="{{ route('expense.edit', [$expense->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                        <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                    </a>
                    <a href="#deleteModal" data-toggle="modal" data-route="{{ route('expense.destroy', [$expense->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                        <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>