@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('product.index') }}" parentPage="product" currentPage="edit" />
<div class="row">
    <div class="col-6">
        <div class="card-box p-3 mb-30">
            <x-forms.product action="{{ route('product.update', [$product->id]) }}">
                <x-slot:method_type>
                    @method('PATCH')
                </x-slot>
                <x-slot:name_value>{{ old('name') ?? $product->name }}</x-slot>
                <x-slot:code_value>{{ old('code') ?? $product->code }}</x-slot>
                <x-slot:location_value>{{ old('location') ?? $product->location }}</x-slot>
                <x-slot:route_value>{{ old('route') ?? $product->route }}</x-slot>
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:subCategories></x-slot>
                <x-slot:suppliers>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id == $product->supplier_id) selected @endif>{{ $supplier->name }}</option>
                    @endforeach
                </x-slot:suppliers>
                <x-slot:purchase_price_value>{{ old('purchase_price') ?? $product->purchase_price }}</x-slot>
                <x-slot:purchase_at_value>{{ old('purchase_at') ?? date_format(date_create($product->purchase_at), 'd F Y') }}</x-slot>
                <x-slot:expire_at_value>{{ old('expire_at') ?? date_format(date_create($product->expire_at), 'd F Y') }}</x-slot>
                <x-slot:selling_price_value>{{ old('selling_price') ?? $product->selling_price }}</x-slot>
                <x-slot:button>
                    <i class="icon-copy ion-android-create mr-2"></i> Edit Entry
                </x-slot>
            </x-forms.category>
        </div>
    </div>
</div>
@endsection

@section('deskapp_scripts')
<script>
    $(document).ready(function() {
        const array = <?php echo json_encode($subCategories) ?>;
        array.filter(function (row) {
            if (row['category_id'] == $('#category').val()) {
                $('#sub_category').append($('<option>', {
                    value: row['id'],
                    text: row['name']
                }))
            }
        })
    })
    $('#category').on('change', function (event) {
        const array = <?php echo json_encode($subCategories) ?>;
        $('#sub_category option:not(:first)').remove()
        array.filter(function (row) {
            if (row['category_id'] == $('#category').val()) {
                $('#sub_category').append($('<option>', {
                    value: row['id'],
                    text: row['name']
                }))
            }
        })
    })
</script>
@endsection