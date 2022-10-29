@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('customer.index') }}" parentPage="customer" currentPage="edit" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.customer action="{{ route('customer.update', ['customer' => $customer->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $customer->name }}</x-slot>
                <x-slot:email_value>{{ old('email') ?? $customer->email }}</x-slot>
                <x-slot:phone_value>{{ old('phone') ?? $customer->phone }}</x-slot>
                <x-slot:address_value>{{ old('address') ?? $customer->address }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.customer>
        </div>
    </div>
</div>
@endsection