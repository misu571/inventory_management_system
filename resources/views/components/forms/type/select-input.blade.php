<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="custom-select @error($name) is-invalid @enderror" {{ $attributes ?? null }}>
        <option selected disabled>Choose</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>