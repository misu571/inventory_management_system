@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('department.index') }}" parentPage="department" currentPage="create" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <form method="POST" action="{{ route('department.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" value="{{ old('name') }}" validations="required" />
                    </div>
                </div>
                <div class="d-flex justify-content-start mt-5">
                    <button type="submit" class="btn btn-lg btn-primary m-0">
                        <i class="icon-copy ion-plus-round mr-2"></i> Create New
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection