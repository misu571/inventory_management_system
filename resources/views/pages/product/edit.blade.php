@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('product.index') }}" parentPage="Product" currentPage="edit" />
<div class="row">
    <div class="col-10">
        <div class="card-box p-3 mb-30">
            <x-forms.product action="{{ route('product.update', [$product->id]) }}" enctype="multipart/form-data">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $product->name }}</x-slot>
                <x-slot:code_value></x-slot>
                <x-slot:location_value>{{ old('location') ?? $product->location }}</x-slot>
                <x-slot:route_value>{{ old('route') ?? $product->route }}</x-slot>
                <x-slot:purchase_price_value>{{ old('purchase_price') ?? $product->purchase_price }}</x-slot>
                <x-slot:purchase_at_value>{{ old('purchase_at') ?? date_format(date_create($product->purchase_at), 'd F Y') }}</x-slot>
                <x-slot:expire_at_value>{{ old('expire_at') ?? date_format(date_create($product->expire_at), 'd F Y') }}</x-slot>
                <x-slot:selling_price_value>{{ old('selling_price') ?? $product->selling_price }}</x-slot>
                <x-slot:image_thumbnail>{{ $product->image != '' ? asset('storage/products/' . $product->image) : '' }}</x-slot>
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:suppliers>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id == $product->supplier_id) selected @endif>{{ $supplier->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
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
        } else {
            getSubCategories("{{ $product->category_id }}", "{{ $product->sub_category_id }}")
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