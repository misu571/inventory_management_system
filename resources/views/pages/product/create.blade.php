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
                        <x-forms.type.select-single-input id="department_id" label="department" name="department_id" validations="required">
                            <x-slot:select>@selected(!old('department_id'))</x-slot>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @selected(old('department_id')==$department->id)>{{ $department->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.text-input type="text" id="batch_number" label="batch number" name="batch_number" classes="" value="{{ old('batch_number') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="parts_number" label="parts number" name="parts_number" classes="" value="{{ old('parts_number') }}" validations="required" />
                        <x-forms.type.select-single-input id="brand_id" label="brand" name="brand_id" validations="required">
                            <x-slot:select>@selected(!old('brand_id'))</x-slot>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand_id')==$brand->id)>{{ $brand->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="supplier_id" label="Supplier" name="supplier_id" validations="required">
                            <x-slot:select>@selected(!old('supplier_id'))</x-slot>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @selected(old('supplier_id')==$supplier->id)>{{ $supplier->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                    </div>
                    <div class="col-md">
                        <x-forms.type.select-single-input id="category_id" label="Category" name="category_id" validations="required">
                            <x-slot:select>@selected(!old('category_id'))</x-slot>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="sub_category_id" label="Sub Category" name="sub_category_id" validations="required">
                            <x-slot:select>@selected(!old('sub_category_id'))</x-slot>
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="sub_group_id" label="Sub sub-category" name="sub_group_id" validations="required">
                            <x-slot:select>@selected(!old('sub_group_id'))</x-slot>
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="country_id" label="country of origin" name="country_id" validations="required">
                            <x-slot:select>@selected(!old('country_id'))</x-slot>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected(old('country_id')==$country->id)>{{ $country->name }} [{{ $country->code_alpha_2 }}]</option>
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
                    </div>
                    <div class="col-md">
                        <x-forms.type.text-input type="text" id="rack_number" label="rack number" name="rack_number" classes="" value="{{ old('rack_number') }}" validations="required" />
                        <x-forms.type.text-input type="number" id="quantity" label="quantity" name="quantity" classes="" value="{{ old('quantity') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="purchase_order_number" label="purchase order number" name="purchase_order_number" classes="" value="{{ old('purchase_order_number') }}" validations="required" />
                        <x-forms.type.text-input type="number" id="purchase_price" label="Purchase Price" name="purchase_price" classes="" value="{{ old('purchase_price') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" value="{{ old('purchase_at') }}" validations="required" />
                        {{-- <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" value="{{ date_format(date_create(old('purchase_at')), 'd F Y') }}" validations="required" /> --}}
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
            <button type="button" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;event.preventDefault();document.getElementById('product-storeForm').submit();">
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
        if ("{{ old('category_id') }}") {
            getSubCategories("{{ old('category_id') }}", "{{ old('sub_category_id') }}")
        }
        if ("{{ old('sub_category_id') }}") {
            getSubGroups("{{ old('sub_category_id') }}", "{{ old('sub_group_id') }}")
        }
    })
    $('#category_id').on('change', function () {
        getSubCategories(this.value)
    })
    $('#sub_category_id').on('change', function () {
        getSubGroups(this.value)
    })

    // Get data from server
    function getSubCategories(category, sub_category = '') {
        $('#category_id').removeClass('is-invalid')
        $($('#category_id').parent()).find('.invalid-feedback').remove()
        $('#sub_category_id option:not(:first)').remove()
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}})
        $.ajax({
            url: "{{ route('query.subCategoriesOfCategory') }}",
            method: "POST",
            data: {category: category},
            success: function (result) {
                const array = result.subCategories
                console.log(array);
                array.filter(function (row) {
                    if (row['category_id'] == $('#category_id').val()) {
                        $('#sub_category_id').append(`<option value="${row['id']}" ${row['id'] == sub_category ? 'selected' : ''}>${row['name']}</option>`)
                    }
                })
            },
            error: function (request) {
                $('#category_id').addClass('is-invalid')
                $($('#category_id').parent()).append(
                    `<span class="invalid-feedback" role="alert">
                        <strong>${request.responseJSON.message}</strong>
                    </span>`
                )
            }
        });
    }
    function getSubGroups(sub_category, sub_group = '') {
        $('#sub_category_id').removeClass('is-invalid')
        $($('#sub_category_id').parent()).find('.invalid-feedback').remove()
        $('#sub_group_id option:not(:first)').remove()
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}})
        $.ajax({
            url: "{{ route('query.subGroupsOfSubCategory') }}",
            method: "POST",
            data: {sub_category: sub_category},
            success: function (result) {
                const array = result.subGroups
                array.filter(function (row) {
                    if (row['sub_category_id'] == $('#sub_category_id').val()) {
                        $('#sub_group_id').append(`<option value="${row['id']}" ${row['id'] == sub_group ? 'selected' : ''}>${row['name']}</option>`)
                    }
                })
            },
            error: function (request) {
                $('#sub_category_id').addClass('is-invalid')
                $($('#sub_category_id').parent()).append(
                    `<span class="invalid-feedback" role="alert">
                        <strong>${request.responseJSON.message}</strong>
                    </span>`
                )
            }
        });
    }
</script>
@endsection