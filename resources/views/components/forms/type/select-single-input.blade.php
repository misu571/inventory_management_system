<div class="form-group">
    <label for="{{ $id }}">{!! $label !!}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="custom-select2 form-control @error($name) is-invalid @enderror" style="width: 100%; height: 38px" {{ $validations }}>
        <option {{ $select }} disabled>Select</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>