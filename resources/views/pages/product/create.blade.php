@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('product.index') }}" parentPage="product" currentPage="create" />
<div class="row">
    <div class="col-7">
        <div class="card-box p-3 mb-30">
            <x-forms.product action="{{ route('product.store') }}">
                <x-slot:name_value>{{ old('name') }}</x-slot>
                <x-slot:code_value>{{ old('code') }}</x-slot>
                <x-slot:location_value>{{ old('location') }}</x-slot>
                <x-slot:route_value>{{ old('route') }}</x-slot>
                <x-slot:categories>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:subCategories></x-slot>
                <x-slot:suppliers>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </x-slot>
                <x-slot:purchase_price_value>{{ old('purchase_price') }}</x-slot>
                <x-slot:purchase_at_value>{{ old('purchase_at') }}</x-slot>
                <x-slot:expire_at_value>{{ old('expire_at') }}</x-slot>
                <x-slot:selling_price_value>{{ old('selling_price') }}</x-slot>
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