<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($this->idstudent, 'idstudent'),
                'email'
            ],
            'phone' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => 'Tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
        ];
    }

    public function attributes(): array
    {
        return [
            'fullname' => 'Full Name',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
