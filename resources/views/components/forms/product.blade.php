<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-forms.type.text-input type="text" id="code" label="Code" name="code" classes="" :value="$code_value" validations="required" />
            
            <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $categories }}
            </x-forms.type.select-single-input>
            <x-forms.type.select-single-input id="sub_category" label="Sub Category" name="sub_category" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $subCategories }}
            </x-forms.type.select-single-input>
            <x-forms.type.select-single-input id="supplier" label="Supplier" name="supplier" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $suppliers }}
            </x-forms.type.select-single-input>
        </div>
        <div class="col">
            
            <x-forms.type.text-input type="text" id="purchase_price" label="Purchase Price" name="purchase_price" classes="" :value="$purchase_price_value" validations="required" />
            <x-forms.type.text-input type="text" id="purchase_at" label="Purchase Date" name="purchase_at" classes="date-picker" :value="$purchase_at_value" validations="required" />
            <x-forms.type.text-input type="text" id="expire_at" label="Expire Date" name="expire_at" classes="date-picker" :value="$expire_at_value" validations="required" />
            <x-forms.type.text-input type="text" id="selling_price" label="Selling Price" name="selling_price" classes="" :value="$selling_price_value" validations="" />
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>