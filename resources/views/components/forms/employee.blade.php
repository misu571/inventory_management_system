<form method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <x-forms.type.text-input>
                <x-slot:label>Name</x-slot>
                <x-slot:id>name</x-slot>
                <x-slot:name>name</x-slot>
                <x-slot:value>{{ $name_value }}</x-slot>
                <x-slot:attributes>required</x-slot>
            </x-forms.type.text-input>
            <x-forms.type.email-input>
                <x-slot:label>E-mail</x-slot>
                <x-slot:id>email</x-slot>
                <x-slot:name>email</x-slot>
                <x-slot:value>{{ $email_value }}</x-slot>
                <x-slot:attributes>required</x-slot>
            </x-forms.type.email-input>
            <x-forms.type.text-input>
                <x-slot:label>Phone</x-slot>
                <x-slot:id>phone</x-slot>
                <x-slot:name>phone</x-slot>
                <x-slot:value>{{ $phone_value }}</x-slot>
                <x-slot:attributes>required</x-slot>
            </x-forms.type.text-input>
            <x-forms.type.text-input>
                <x-slot:label>Address</x-slot>
                <x-slot:id>address</x-slot>
                <x-slot:name>address</x-slot>
                <x-slot:value>{{ $address_value }}</x-slot>
                <x-slot:attributes>required</x-slot>
            </x-forms.type.text-input>
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