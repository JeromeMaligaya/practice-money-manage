<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTransactionReuqest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'account_id'   => ['required', 'exists:accounts,id'],
            'type'         => ['required', 'in, out ,transfer'],
            'amount'       => ['required', 'numeric', 'min:0.01'],
            'description'  => ['nullable', 'string', 'max:255'],
            'date'         => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'account_id.required'  => 'The account field is required.',
            'account_id.exists'    => 'The selected account does not exist.',

            'type.required'        => 'The type field is required.',
            'type.in'              => 'The type must be one of: in, out ,transfer.',

            'amount.required'      => 'The amount field is required.',
            'amount.numeric'       => 'The amount must be a number.',
            'amount.min'           => 'The amount must be at least 0.01.',

            'description.string'   => 'The description must be a string.',
            'description.max'      => 'The description cannot exceed 255 characters.',

            'date.required'        => 'The date field is required.',
            'date.date'            => 'The date format is invalid.',
        ];
    }
}
