@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('setting.permission.index') }}" parentPage="permission" currentPage="edit" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <x-forms.permission action="{{ route('setting.permission.update', [$permission->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $permission->name }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.permission>
        </div>
    </div>
</div>
@endsection