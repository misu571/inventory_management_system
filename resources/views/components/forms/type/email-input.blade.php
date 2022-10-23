<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="email" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ $value ?? null }}" {{ $attributes ?? null }}>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>