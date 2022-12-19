<form id="salary-form" method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <div class="row">
        <div class="col">
            <x-forms.type.select-single-input id="employee_id" label="Employee" name="employee" validations="required">
                <x-slot:select>@if(!isset($method_type)) selected @endif</x-slot>
                {{ $employees }}
            </x-forms.type.select-single-input>
            <x-forms.type.text-input type="number" id="amount" label="Amount" name="amount" classes="" :value="$amount_value" validations="required" />
            <x-forms.type.text-input type="text" id="given_at" label="Given Date" name="given_at" classes="date-picker" :value="$given_at_value" validations="required" />
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('salary-form').submit();">
            {{ $button }}
        </button>
    </div>
</form>