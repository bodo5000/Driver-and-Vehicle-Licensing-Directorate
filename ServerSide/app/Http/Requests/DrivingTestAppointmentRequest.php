<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DrivingTestAppointmentRequest extends FormRequest
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
            'test_type_id' => 'required',
            'local_driving_license_id' => [
                'required',
                Rule::unique('driving_test_appointments')
                    ->where(
                        fn($query)
                        => $query->where('test_type_id', $this->test_type_id)
                    )
                    ->ignore($this->driving_test_appointment ?? null)
            ],
            'paid_fees' => 'required|decimal:1',
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
