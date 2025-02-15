<?php

namespace App\Http\Requests;

use App\Enums\StatusRequestEnum;
use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateRequestModel extends FormRequest
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
            'status_id' => [
                'required',
                'int',
                'in:' . implode(',', StatusRequestEnum::values()),
            ],
        ];
    }

}
