@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('employee.index') }}" parentPage="employee" currentPage="edit" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.employee action="{{ route('employee.update', [$employee->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $employee->name }}</x-slot>
                <x-slot:email_value>{{ old('email') ?? $employee->email }}</x-slot>
                <x-slot:phone_value>{{ old('phone') ?? $employee->phone }}</x-slot>
                <x-slot:address_value>{{ old('address') ?? $employee->address }}</x-slot>
                {{-- <x-slot:address_value>{{ old('address') ?? $employee->address }}</x-slot> --}}
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.employee>
        </div>
    </div>
</div>
@endsection