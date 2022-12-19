<form id="sub_category-form" method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <x-forms.type.select-single-input id="category" label="Category" name="category" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $categories }}
            </x-forms.type.select-single-input>
            <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('sub_category-form').submit();">
            {{ $button }}
        </button>
    </div>
</form>