<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
            'person_id' => [
                Rule::unique('users', 'person_id')
                    ->ignore($this->route('id'))
            ],

            'username' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users', 'username')->ignore($this->route('id'))],
            'password' => 'required|min:3|max:12',
            'isActive' => 'required|in:0,1',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'status' => 400,
                'message' => 'validation error',
                'data' => $validator->errors(),
            ],
            status: 400
        ));
    }
}
