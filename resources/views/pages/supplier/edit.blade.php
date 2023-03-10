@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('supplier.index') }}" parentPage="supplier" currentPage="edit" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.supplier action="{{ route('supplier.update', [$supplier->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $supplier->name }}</x-slot>
                <x-slot:email_value>{{ old('email') ?? $supplier->email }}</x-slot>
                <x-slot:phone_value>{{ old('phone') ?? $supplier->phone }}</x-slot>
                <x-slot:address_value>{{ old('address') ?? $supplier->address }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.supplier>
        </div>
    </div>
</div>
@endsection