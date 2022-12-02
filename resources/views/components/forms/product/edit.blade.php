<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col-md-3">
            <x-forms.type.text-input type="text" id="department" label="department" name="department" classes="" :value="$department_value" validations="required" />
            <x-forms.type.text-input type="text" id="serial_number" label="serial number" name="serial_number" classes="" :value="$serial_number_value" validations="required" />
            <x-forms.type.text-input type="text" id="location" label="Location" name="location" classes="" :value="$location_value" validations="required" />
            <x-forms.type.text-input type="text" id="rack_number" label="rack number" name="rack_number" classes="" :value="$rack_number_value" validations="required" />
        </div>
        <div class="col-md-3">
            <x-forms.type.select-single-input id="brand" label="brand" name="brand" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $brands }}
            </x-forms.type.select-single-input>
            <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $categories }}
            </x-forms.type.select-single-input>
            <x-forms.type.select-single-input id="sub_category" label="Sub Category" name="sub_category" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
            </x-forms.type.select-single-input>
            <x-forms.type.select-single-input id="supplier" label="Supplier" name="supplier" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $suppliers }}
            </x-forms.type.select-single-input>
        </div>
        <div class="col-md-3">
            <x-forms.type.text-input type="text" id="parts_number" label="parts number" name="parts_number" classes="" :value="$parts_number_value" validations="required" />
            <x-forms.type.text-input type="number" id="purchase_price" label="Purchase Price" name="purchase_price" classes="" :value="$purchase_price_value" validations="required" />
            <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" :value="$purchase_at_value" validations="required" />
            <x-forms.type.file-input id="image" label="Product Image" name="image" validations="" />
            <input type="hidden" name="parts_number" value="efgr4t4">
        </div>
        <div class="col-md-3">
            <img id="thumbnail" class="img-thumbnail w-100 mb-3" src="{{ $image_thumbnail != '' ? $image_thumbnail : asset('images/product_icon.png') }}" alt="Product image">
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>