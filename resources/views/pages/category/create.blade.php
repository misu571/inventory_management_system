@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('category.index') }}" parentPage="category" currentPage="create" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.category action="{{ route('category.store') }}">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.category>
        </div>
    </div>
</div>
@endsection