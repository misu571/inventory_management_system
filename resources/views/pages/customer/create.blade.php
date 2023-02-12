@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('customer.index') }}" parentPage="customer" currentPage="create" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.customer action="{{ route('customer.store') }}">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:email_value>{{ old('email') }}</x-slot>
                <x-slot:phone_value>{{ old('phone') }}</x-slot>
                <x-slot:address_value>{{ old('address') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.customer>
        </div>
    </div>
</div>
@endsection