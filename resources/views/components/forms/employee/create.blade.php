<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col-md">
            <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
            <x-forms.type.text-input type="email" id="email" label="E-mail" name="email" classes="" :value="$email_value" validations="required" />
            <x-forms.type.text-input type="text" id="phone" label="Phone" name="phone" classes="" :value="$phone_value" validations="required" />
            <x-forms.type.text-input type="text" id="address" label="Address" name="address" classes="" :value="$address_value" validations="" />
        </div>
        <div class="col-md">
            <x-forms.type.text-input type="text" id="position" label="position" name="position" classes="" :value="$position_value" validations="required" />
            <x-forms.type.select-single-input id="role" label="role" name="role" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $roles }}
            </x-forms.type.select-single-input>
            <x-forms.type.text-input type="text" id="nid" label="nid" name="nid" classes="" :value="$nid_value" validations="required" />
            <x-forms.type.file-input id="image" label="Employee Image" name="image" validations="" />
        </div>
        <div class="col-md">
            <img id="thumbnail" class="img-thumbnail w-100 mb-3" src="{{ $image_thumbnail != '' ? $image_thumbnail : asset('images/avatar.png') }}" alt="Product image">
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>