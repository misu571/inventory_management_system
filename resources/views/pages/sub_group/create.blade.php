@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('sub-group.index') }}" parentPage="sub group" currentPage="create" />
<div class="row">
    <div class="col-md-4">
        <div class="card-box p-3 mb-30">
            <form id="sub_group-form" method="POST" action="{{ route('sub-group.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                            <x-slot:select>@selected(!old('category'))</x-slot>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category')==$category->id)>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="sub_category" label="Sub Category" name="sub_category" validations="required">
                            <x-slot:select>@selected(!old('sub_category'))</x-slot>
                        </x-forms.type.select-single-input>
                        <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" value="{{ old('name') }}" validations="required" />
                    </div>
                </div>
                <div class="d-flex justify-content-start mt-5">
                    <button type="button" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;event.preventDefault();document.getElementById('sub_group-form').submit();">
                        <i class="icon-copy ion-plus-round mr-2"></i> Create New
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('deskapp_scripts')
<script>
    // Select sub-category on page load or change based on category
    $(document).ready(function () {
        if ("{{ old('category') }}") {
            getSubCategories("{{ old('category') }}", "{{ old('sub_category') }}")
        }
    })
    $('#category').on('change', function () {
        getSubCategories(this.value)
    })

    // Get data from server
    function getSubCategories(category, sub_category = '') {
        $('#category').removeClass('is-invalid')
        $($('#category').parent()).find('.invalid-feedback').remove()
        $('#sub_category option:not(:first)').remove()
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}})
        $.ajax({
            url: "{{ route('query.subCategoriesOfCategory') }}",
            method: "POST",
            data: {category: category},
            success: function (result) {
                const array = result.subCategories
                array.filter(function (row) {
                    if (row['category_id'] == $('#category').val()) {
                        $('#sub_category').append(`<option value="${row['id']}" ${row['id'] == sub_category ? 'selected' : ''}>${row['name']}</option>`)
                    }
                })
            },
            error: function (request) {
                $('#category').addClass('is-invalid')
                $($('#category').parent()).append(
                    `<span class="invalid-feedback" role="alert">
                        <strong>${request.responseJSON.message}</strong>
                    </span>`
                )
            }
        })
    }
</script>
@endsection