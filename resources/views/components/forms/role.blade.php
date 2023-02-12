<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <input type="hidden" id="permissions" name="permissions" value="">
    <x-forms.type.text-input type="text" id="name" label="Name" name="name" classes="" :value="$name_value" validations="required" />
    <div class="form-group mb-0">
        <label>Multiple Select</label>
        <select class="custom-select2 form-control @error('permissions') is-invalid @enderror" onchange="$('#permissions').val($(this).val())" multiple="multiple" style="width: 100%">
            @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        @error('permissions')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>