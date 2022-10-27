@extends('layouts.app')

@section('content')
<x-pages.elements.title>
    <x-slot:page_title>Form</x-slot>
    <x-slot:route_name>{{ route('salary.index') }}</x-slot>
    <x-slot:parent_page>Salary</x-slot>
    <x-slot:current_page>create</x-slot>
</x-pages.elements.title>
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.salary action="{{ route('salary.store') }}">
                <x-slot:employees>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:amount_value>{{ old('amount') }}</x-slot>
                <x-slot:given_at_value>{{ old('given_at') }}</x-slot>
                {{-- <x-slot:status_value>{{ old('status') }}</x-slot>
                <x-slot:advance_salary_value>{{ old('advance_salary') }}</x-slot> --}}
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.salary>
        </div>
    </div>
</div>
@endsection