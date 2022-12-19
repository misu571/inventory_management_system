<form id="employee-storeForm" method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col-md">
            <div class="row">
                <div class="col-md">
                    <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
                    <x-forms.type.text-input type="email" id="email" label="E-mail" name="email" classes="" :value="$email_value" validations="required" />
                    <x-forms.type.text-input type="text" id="phone" label="Phone" name="phone" classes="" :value="$phone_value" validations="required" />
                    <x-forms.type.text-input type="text" id="address" label="Address" name="address" classes="" :value="$address_value" validations="" />
                </div>
                <div class="col-md">
                    <x-forms.type.text-input type="text" id="nid" label="nid" name="nid" classes="" :value="$nid_value" validations="" />
                    <x-forms.type.text-input type="text" id="designation" label="designation" name="designation" classes="" :value="$designation_value" validations="required" />
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select id="role" name="role" class="selectpicker form-control @error('role') is-invalid @enderror" required>
                            <option @selected(!old('role')) disabled>Select</option>
                            {{ $roles }}
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <x-forms.type.text-input type="number" id="salary" label="salary" name="salary" classes="" :value="$salary_value" validations="" />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img id="thumbnail" class="img-thumbnail w-100 mb-3" src="{{ $image_thumbnail != '' ? $image_thumbnail : asset('images/avatar.png') }}" alt="Product image">
            <x-forms.type.file-input id="image" label="Employee Image" name="image" validations="" />
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('employee-storeForm').submit();">
            {{ $button }}
        </button>
    </div>
</form>