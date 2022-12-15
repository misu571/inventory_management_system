<div class="form-group">
    <label for="{{ $id }}">{!! $label !!}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control {{ $classes }} @error($name) is-invalid @enderror" value="{{ $value }}" {{ $validations }}></textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>