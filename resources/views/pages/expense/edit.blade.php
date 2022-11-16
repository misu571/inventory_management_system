@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('expense.index') }}" parentPage="expense" currentPage="edit" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.expense action="{{ route('expense.update', [$expense->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:details_value>{{ old('details') ?? $expense->details }}</x-slot>
                <x-slot:amount_value>{{ old('amount') ?? $expense->amount }}</x-slot>
                <x-slot:expense_at_value>{{ old('expense_at') ?? date_format(date_create($expense->expense_at), 'd F Y') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.expense>
        </div>
    </div>
</div>
@endsection