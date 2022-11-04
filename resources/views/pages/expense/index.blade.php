@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Expense List</x-slot>
    <x-slot:create_route>{{ route('expense.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'date, Details, Amount' }}</x-slot>
        @foreach ($expenses as $expense)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $expense->expense_at }}</td>
                <td>{{ $expense->details }}</td>
                <td>{{ $expense->amount }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="expense" :nameId="$expense->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>