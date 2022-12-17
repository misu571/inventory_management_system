@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Show" route="{{ route('product.index') }}" parentPage="Product" currentPage="details" />
<div class="card-box p-3">
    <div class="row">
        <div class="col-md">
            <h4 class="text-blue h5 mb-4">Details</h4>
            <form action="{{ route('product.update', [$product->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md">
                        <x-forms.type.text-input type="text" id="name" label="name" name="name" classes="" value="{{ old('name') ?? $product->name }}" validations="required" />
                        <x-forms.type.select-single-input id="department" label="department" name="department" validations="required">
                            <x-slot:select>@selected(!old('department'))</x-slot>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @selected((old('department') ?? $product->department_id)==$department->id)>{{ $department->name }}</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.text-input type="text" id="batch_number" label="batch number" name="batch_number" classes="" value="{{ old('batch_number') ?? $product->batch_number }}" validations="required" />
                        <x-forms.type.select-single-input id="brand" label="brand" name="brand" validations="required">
                            <x-slot:select>@selected(!old('brand'))</x-slot>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected((old('brand') ?? $product->brand_id)==$brand->id)>{{ $brand->name }}</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="supplier" label="Supplier" name="supplier" validations="required">
                            <x-slot:select>@selected(!old('supplier'))</x-slot>
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @selected((old('supplier') ?? $product->supplier_id)==$supplier->id)>{{ $supplier->name }}</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                    </div>
                    <div class="col-md">
                        <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                            <x-slot:select>@selected(!old('category'))</x-slot>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected((old('category') ?? $product->category_id)==$category->id)>{{ $category->name }}</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="sub_category" label="Sub Category" name="sub_category" validations="required">
                            <x-slot:select>@selected(!old('sub_category'))</x-slot>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @selected((old('sub_category') ?? $product->sub_category_id)==$subCategory->id)>{{ $subCategory->name }}</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                        <x-forms.type.select-single-input id="country" label="country of origin" name="country" validations="required">
                            <x-slot:select>@selected(!old('country'))</x-slot>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected((old('country') ?? $product->country_id)==$country->id)>{{ $country->name }} [{{ $country->code_alpha_2 }}]</option>
                                @endforeach
                        </x-forms.type.select-single-input>
                        <div class="form-group">
                            <label for="condition">Condition <span class="text-danger">*</span></label>
                            <select id="condition" name="condition" class="selectpicker form-control @error('condition') is-invalid @enderror" required>
                                <option @selected(!old('condition')) disabled>Select</option>
                                <option value="new" @selected((old('condition') ?? $product->condition)=='new' )>New</option>
                                <option value="used" @selected((old('condition') ?? $product->condition)=='used' )>Used</option>
                                <option value="damaged" @selected((old('condition') ?? $product->condition)=='damaged' )>Damaged</option>
                            </select>
                            @error('condition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <x-forms.type.text-input type="text" id="location" label="Location" name="location" classes="" value="{{ old('location') ?? $product->location }}" validations="required" />
                    </div>
                    <div class="col-md">
                        <x-forms.type.text-input type="text" id="rack_number" label="rack number" name="rack_number" classes="" value="{{ old('rack_number') ?? $product->rack_number }}" validations="required" />
                        <x-forms.type.text-input type="number" id="quantity" label="quantity" name="quantity" classes="" value="{{ old('quantity') ?? $product->quantity }}" validations="required" />
                        <x-forms.type.text-input type="number" id="purchase_price" label="Purchase Price" name="purchase_price" classes="" value="{{ old('purchase_price') ?? $product->purchase_price }}" validations="required" />
                        <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" value="{{ date_format(date_create(old('purchase_at') ?? $product->purchase_at), 'd F Y') }}" validations="required" />
                        <x-forms.type.text-input type="text" id="note" label="note" name="note" classes="" value="{{ old('note') ?? $product->note }}" validations="" />
                    </div>
                </div>
                <div class="d-flex justify-content-start mt-5">
                    <button type="submit" class="btn btn-lg btn-primary m-0">
                        <i class="icon-copy ion-android-create mr-2"></i> Update Details
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <h4 class="text-blue h5 mb-4">Unique Values</h4>
            <div class="mb-30">
                <form method="POST" action="{{ route('product.partsNumber.update', [$product->id]) }}">
                    @method('PATCH')
                    @csrf
                    <label for="parts_number">Parts number</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('parts_number') is-invalid @enderror" id="parts_number" name="parts_number" value="{{ old('parts_number') ?? $product->parts_number }}" aria-describedby="parts_number-button">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" id="parts_number-button">Change</button>
                        </div>
                        @error('parts_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="mb-30">
                <form method="POST" action="{{ route('product.purchaseOrderNumber.update', [$product->id]) }}">
                    @method('PATCH')
                    @csrf
                    <label for="purchase_order_number">Purchase order number</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('purchase_order_number') is-invalid @enderror" id="purchase_order_number" name="purchase_order_number" value="{{ old('purchase_order_number') ?? $product->purchase_order_number }}" aria-describedby="purchase_order_number-button">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" id="purchase_order_number-button">Change</button>
                        </div>
                        @error('purchase_order_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div>
                <h4 class="text-blue h5 mb-4">Image</h4>
                <img id="thumbnail" class="img-thumbnail w-100" src="{{ $product->image ? asset('storage/products/' . $product->image) : asset('images/product_icon.png') }}" alt="Product image">
                <form action="{{ route('product.image.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="input-group mt-4 mb-0">
                        <div class="custom-file">
                            <input type="file" id="image" name="image" class="custom-file-input" aria-describedby="image-button">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="image-button">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
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