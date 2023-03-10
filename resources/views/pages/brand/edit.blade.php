@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('brand.index') }}" parentPage="brand" currentPage="edit" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.brand action="{{ route('brand.update', [$brand->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $brand->name }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.brand>
        </div>
    </div>
</div>
@endsection