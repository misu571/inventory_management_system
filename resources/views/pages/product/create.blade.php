@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('product.index') }}" parentPage="product" currentPage="create" />
<div class="row">
    <div class="col-md-10">
        <div class="card-box p-3 mb-30">
            <x-forms.product action="{{ route('product.store') }}" enctype="multipart/form-data">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:code_value>{{ old('code') }}</x-slot>
                <x-slot:location_value>{{ old('location') }}</x-slot>
                <x-slot:route_value>{{ old('route') }}</x-slot>
                <x-slot:purchase_price_value>{{ old('purchase_price') }}</x-slot>
                <x-slot:purchase_at_value>{{ old('purchase_at') }}</x-slot>
                <x-slot:expire_at_value>{{ old('expire_at') }}</x-slot>
                <x-slot:selling_price_value>{{ old('selling_price') }}</x-slot>
                <x-slot:image_thumbnail></x-slot>
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:suppliers>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id == old('supplier')) selected @endif>{{ $supplier->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-plus-round mr-2"></i> Create New
                </x-slot>
            </x-forms.product>
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
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}})
        $.ajax({
            url: "{{ route('product.subCategories') }}",
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