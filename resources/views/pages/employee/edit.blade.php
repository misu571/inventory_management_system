@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('employee.index') }}" parentPage="employee" currentPage="edit" />
<div class="row">
    <div class="col-md-6">
        <div class="card-box p-3 mb-30">
            <x-forms.employee.edit action="{{ route('employee.update', [$employee->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $user->name }}</x-slot>
                <x-slot:phone_value>{{ old('phone') ?? $user->phone }}</x-slot>
                <x-slot:position_value>{{ old('position') ?? $employee->position }}</x-slot>
                <x-slot:nid_value>{{ old('nid') ?? $employee->nid }}</x-slot>
                <x-slot:salary_value>{{ old('salary') ?? $employee->salary }}</x-slot>
                <x-slot:address_value>{{ old('address') ?? $employee->address }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.employee.edit>
        </div>
    </div>
</div>
@endsection