<form id="expense-form" method="POST" {{ $attributes }}>
    {{ $method_type ?? null }}
    @csrf
    <x-forms.type.text-input type="text" id="details" label="details" name="details" classes="" :value="$details_value" validations="required" />
    <x-forms.type.text-input type="number" id="amount" label="amount" name="amount" classes="" :value="$amount_value" validations="required" />
    <x-forms.type.text-input type="text" id="expense_at" label="expense Date" name="expense_at" classes="date-picker" :value="$expense_at_value" validations="required" />
    <div class="d-flex justify-content-start mt-5">
        <button type="submit" class="btn btn-lg btn-primary m-0" onclick="this.disabled=true;document.getElementById('expense-form').submit();">
            {{ $button }}
        </button>
    </div>
</form>