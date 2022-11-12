<div class="form-group">
    <label for="{{ $id }}">{!! $label !!}</label>
    <input type="file" id="{{ $id }}" name="{{ $name }}" class="form-control-file form-control height-auto @error($name) is-invalid @enderror" {{ $validations }}>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>