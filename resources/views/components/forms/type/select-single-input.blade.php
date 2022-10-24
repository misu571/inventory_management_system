<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="custom-select2 form-control @error($name) is-invalid @enderror" style="width: 100%; height: 38px" {{ $attributes ?? null }}>
        <option selected disabled>Select</option>
        <option value="AK">Alaska</option>
        <option value="HI">Hawaii</option>
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>