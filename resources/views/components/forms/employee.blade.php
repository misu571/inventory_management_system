<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
            <x-forms.type.text-input type="email" id="email" label="E-mail" name="email" classes="" :value="$email_value" validations="required" />
            <x-forms.type.text-input type="text" id="phone" label="Phone" name="phone" classes="" :value="$phone_value" validations="required" />
            <x-forms.type.text-input type="text" id="address" label="Address" name="address" classes="" :value="$address_value" validations="required" />
            <input type="hidden" id="experience" name="experience" value="Unique">
            <input type="hidden" id="salary" name="salary" value="10101">
            <input type="hidden" id="vacation" name="vacation" value="0">
            <input type="hidden" id="city" name="city" value="Dhaka">
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>