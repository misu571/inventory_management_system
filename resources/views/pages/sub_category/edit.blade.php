@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('sub-category.index') }}" parentPage="sub category" currentPage="edit" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.sub-category action="{{ route('sub-category.update', [$subCategory->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $subCategory->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $subCategory->name }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.sub-category>
        </div>
    </div>
</div>
@endsection