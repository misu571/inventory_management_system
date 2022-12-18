@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('employee.index') }}" parentPage="employee" currentPage="create" />
<div class="row">
    <div class="col-md-8">
        <div class="card-box p-3 mb-30">
            <x-forms.employee.create action="{{ route('employee.store') }}" enctype="multipart/form-data">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:email_value>{{ old('email') }}</x-slot>
                <x-slot:phone_value>{{ old('phone') }}</x-slot>
                <x-slot:position_value>{{ old('position') }}</x-slot>
                <x-slot:nid_value>{{ old('nid') }}</x-slot>
                <x-slot:address_value>{{ old('address') }}</x-slot>
                <x-slot:salary_value>{{ old('salary') }}</x-slot>
                <x-slot:roles>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role')==$role->id)>{{ ucfirst($role->name) }}</option>
                    @endforeach
                </x-slot>
                <x-slot:image_thumbnail></x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.employee.create>
        </div>
    </div>
</div>
@endsection

@section('deskapp_scripts')
<script>
    // Preview image before upload
    image.onchange = evt => {
        const [file] = image.files
        if (file) {thumbnail.src = URL.createObjectURL(file)}
    }
</script>
@endsection