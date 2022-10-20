<form {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $name_value }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email_value }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $phone_value }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $address_value }}" required>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="hidden" id="experience" name="experience" value="Unique">
            <input type="hidden" id="salary" name="salary" value="10101">
            <input type="hidden" id="vacation" name="vacation" value="0">
            <input type="hidden" id="city" name="city" value="Dhaka">
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0">{{ $button }}</button>
    </div>
</form>