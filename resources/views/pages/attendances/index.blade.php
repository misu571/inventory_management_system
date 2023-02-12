@extends('layouts.app')

<x-pages.index>
    <x-slot:page_name>Attendance List</x-slot>
    <x-slot:create_route>{{ route('attendance.create') }}</x-slot>
    <x-pages.elements.table>
        <x-slot:colunm_name>{{ 'Name,present at,in time,out time' }}</x-slot>
        @foreach ($attendances as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->employee_name }}</td>
                <td>{{ date_format(date_create($row->present_at), 'd M Y') }}</td>
                <td>{{ date_format(date_create($row->in_time), 'g:i A') }}</td>
                <td>{{ date_format(date_create($row->out_time), 'g:i A') }}</td>
                <td>
                    <div class="table-actions d-flex justify-content-end">
                        <a href="{{ route('attendance.edit', [$row->id]) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                            <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" data-route="{{ route('attendance.destroy', [$row->id]) }}" data-color="#e95959" style="color: rgb(233, 89, 89);">
                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-pages.elements.table>
</x-pages.index>