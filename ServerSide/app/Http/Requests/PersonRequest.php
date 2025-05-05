<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PersonRequest extends FormRequest
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
            'national_no' => ['required', Rule::unique('people')->ignore($this->route('id')), 'regex:/^No_[0-9]+$/'],
            'first_name' => 'required|string|min:3|max:20',
            'second_name' => 'required|string|min:3|max:20',
            'third_name' => 'required|string|min:3|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'email' => ['required', 'email', Rule::unique('people')->ignore($this->route('id'))],
            'phone' => ['required', 'min:11', 'numeric', Rule::unique('people')->ignore($this->route('id'))],
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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

    public function messages()
    {
        return [
            'national_no.regex' => 'nation_no must startWith No_ then numbers',
            'gender.in' => 'gender must be [male or female]'
        ];
    }
}
