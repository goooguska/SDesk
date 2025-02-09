<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreateRequestModel extends FormRequest
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
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'user_id' => 'required|int|exists:users,id',
            'responsible_id' => 'required|int|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Описание обязательно для заполнения.',
            'description.string' => 'Описание должно быть строкой.',
            'title.required' => 'Тема обязательна для заполнения.',
            'title.string' => 'Тема должна быть строкой.',
            'title.max' => 'Тема не может превышать 255 символов.',
            'user_id.required' => 'Пользователь обязателен для заполнения.',
            'user_id.exists' => 'Выбранный пользователь не существует.',
            'responsible_id.required' => 'Ответственный обязателен для заполнения.',
            'responsible_id.exists' => 'Выбранный ответственный не существует.',
        ];
    }
}
