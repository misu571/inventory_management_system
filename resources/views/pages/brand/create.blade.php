@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('brand.index') }}" parentPage="brand" currentPage="create" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.brand action="{{ route('brand.store') }}">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.brand>
        </div>
    </div>
</div>
@endsection