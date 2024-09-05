<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalyzeRequest extends FormRequest
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
            'order_by' => [
                'required',
                'string'
            ],
            'start_date' => [
                'required_with:end_date',
                'date',
            ],
            'end_date' => [
                'required_with:start_date',
                'date',
                'after_or_equal:start_date',
            ],
            'user_id' => [
                'integer',
            ],
        ];
    }
}
