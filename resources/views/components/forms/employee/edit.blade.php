<form id="employee-updateForm" method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col-md">
            <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
            <x-forms.type.text-input type="text" id="phone" label="Phone" name="phone" classes="" :value="$phone_value" validations="required" />
            <x-forms.type.text-input type="text" id="address" label="Address" name="address" classes="" :value="$address_value" validations="" />
        </div>
        <div class="col-md">
            <x-forms.type.text-input type="text" id="nid" label="nid" name="nid" classes="" :value="$nid_value" validations="" />
            <x-forms.type.text-input type="text" id="designation" label="designation" name="designation" classes="" :value="$designation_value" validations="required" />
            <x-forms.type.text-input type="number" id="salary" label="salary" name="salary" classes="" :value="$salary_value" validations="" />
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('employee-updateForm').submit();">
            {{ $button }}
        </button>
    </div>
</form>