@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('sub-category.index') }}" parentPage="sub category" currentPage="create" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.sub-category action="{{ route('sub-category.store') }}">
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.sub-category>
        </div>
    </div>
</div>
@endsection