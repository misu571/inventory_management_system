@extends('layouts.app')

@section('content')
<x-pages.elements.title>
    <x-slot:page_title>Form</x-slot>
    <x-slot:route_name>{{ route('category.index') }}</x-slot>
    <x-slot:parent_page>Category</x-slot>
    <x-slot:current_page>edit</x-slot>
</x-pages.elements.title>
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.category action="{{ route('category.update', ['category' => $category->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $category->name }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.category>
        </div>
    </div>
</div>
@endsection