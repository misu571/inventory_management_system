@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Form" route="{{ route('product.index') }}" parentPage="product" currentPage="create" />
<form action="{{ route('product.store') }}" id="product-storeForm" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-box p-3">
        <div class="row">
            <div class="col-md">
                <h4 class="text-blue h5 mb-4">Product Details</h4>
                <div class="row">
                    <div class="col-md">
                        <x-forms.type.text-input type="text" id="name" label="name" name="name" classes="" value="{{ old('name') }}" validations="required" />
                        <x-forms.type.select-single-input id="department" label="department" name="department" validations="required">
                            <x-slot:select>@selected(!old('department'))</x-slot>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @selected(old('department')==$department->id)>{{ $department->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.text-input type="text" id="batch_number" label="batch number" name="batch_number" classes="" value="{{ old('batch_number') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="parts_number" label="parts number" name="parts_number" classes="" value="{{ old('parts_number') }}" validations="required" />
                    </div>
                    <div class="col-md">
                        <x-forms.type.select-single-input id="brand" label="brand" name="brand" validations="required">
                            <x-slot:select>@selected(!old('brand'))</x-slot>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand')==$brand->id)>{{ $brand->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="supplier" label="Supplier" name="supplier" validations="required">
                            <x-slot:select>@selected(!old('supplier'))</x-slot>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @selected(old('supplier')==$supplier->id)>{{ $supplier->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                            <x-slot:select>@selected(!old('category'))</x-slot>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category')==$category->id)>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="sub_category" label="Sub Category" name="sub_category" validations="required">
                            <x-slot:select>@selected(!old('sub_category'))</x-slot>
                        </x-forms.type.select-single-input>
                    </div>
                    <div class="col-md">
                        <x-forms.type.select-single-input id="country" label="country of origin" name="country" validations="required">
                            <x-slot:select>@selected(!old('country'))</x-slot>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected(old('country')==$country->id)>{{ $country->name }} [{{ $country->code_alpha_2 }}]</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <div class="form-group">
                            <label for="condition">Condition <span class="text-danger">*</span></label>
                            <select id="condition" name="condition" class="selectpicker form-control @error('condition') is-invalid @enderror" required>
                                <option @selected(!old('condition')) disabled>Select</option>
                                <option value="new" @selected(old('condition')=='new' )>New</option>
                                <option value="used" @selected(old('condition')=='used' )>Used</option>
                                <option value="damaged" @selected(old('condition')=='damaged' )>Damaged</option>
                            </select>
                            @error('condition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <x-forms.type.text-input type="text" id="location" label="Location" name="location" classes="" value="{{ old('location') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="rack_number" label="rack number" name="rack_number" classes="" value="{{ old('rack_number') }}" validations="required" />
                    </div>
                    <div class="col-md">
                        <x-forms.type.text-input type="number" id="quantity" label="quantity" name="quantity" classes="" value="{{ old('quantity') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="purchase_order_number" label="purchase order number" name="purchase_order_number" classes="" value="{{ old('purchase_order_number') }}" validations="required" />
                        <x-forms.type.text-input type="number" id="purchase_price" label="Purchase Price" name="purchase_price" classes="" value="{{ old('purchase_price') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" value="{{ date_format(date_create(old('purchase_at')), 'd F Y') }}" validations="required" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <x-forms.type.text-input type="text" id="note" label="note" name="note" classes="" value="{{ old('note') }}" validations="" />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="text-blue h5 mb-4">Product Image</h4>
                <img id="thumbnail" class="img-thumbnail w-100" src="{{ $image_thumbnail ?? asset('images/product_icon.png') }}" alt="Product image">
                <x-forms.type.file-input id="image" label="" name="image" validations="" />
            </div>
        </div>
        <div class="d-flex justify-content-start mt-5">
            <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('product-storeForm').submit();">
                <i class="icon-copy ion-plus-round mr-2"></i> Create New
            </button>
        </div>
    </div>
</form>
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