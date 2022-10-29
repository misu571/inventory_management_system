@extends('layouts.app')

@section('content')
<x-pages.elements.title>
    <x-slot:page_title>Form</x-slot>
    <x-slot:route_name>{{ route('category.index') }}</x-slot>
    <x-slot:parent_page>Category</x-slot>
    <x-slot:current_page>create</x-slot>
</x-pages.elements.title>
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.category action="{{ route('category.store') }}">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.customer>
        </div>
    </div>
</div>
@endsection