@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('expense.index') }}" parentPage="expense" currentPage="create" />
<div class="row">
    <div class="col-4">
        <div class="card-box p-3 mb-30">
            <x-forms.expense action="{{ route('expense.store') }}">
                <x-slot:details_value>{{ old('details') }}</x-slot>
                <x-slot:amount_value>{{ old('amount') }}</x-slot>
                <x-slot:expense_at_value>{{ old('expense_at') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.expense>
        </div>
    </div>
</div>
@endsection