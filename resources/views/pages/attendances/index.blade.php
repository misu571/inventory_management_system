@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Attendance List</x-slot>
    <x-slot:create_route>{{ route('attendance.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,present at' }}</x-slot>
        @foreach ($attendances as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->employee_name }}</td>
                <td>{{ date_format(date_create($row->present_at), 'd M Y') }}</td>
                <td>
                    <x-pages.elements.action btn="ed" name="attendance" :nameId="$attendance->id" />
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>