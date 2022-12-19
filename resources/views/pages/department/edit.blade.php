@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('department.index') }}" parentPage="department" currentPage="edit" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <form id="department-updateForm" method="POST" action="{{ route('department.update', [$department->id]) }}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col">
                        <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" value="{{ old('name') ?? $department->name }}" validations="required" />
                    </div>
                </div>
                <div class="d-flex justify-content-start mt-5">
                    <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('department-updateForm').submit();">
                        <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection