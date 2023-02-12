<div class="form-group">
    <label for="{{ $id }}">{!! $label !!}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="form-control custom-select @error($name) is-invalid @enderror" {{ $validations }}>
        <option {{ $select }} disabled>Choose</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>