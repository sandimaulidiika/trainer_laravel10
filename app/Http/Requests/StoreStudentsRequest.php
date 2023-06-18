<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'idstudent' => 'required|unique:students,idstudent|min:7|max:7',
            'fullname' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'idstudent.required' => 'Tidak Boleh Kosong',
            'idstudent.unique' => 'NIM Sudah Terdaftar',
            'idstudent.min' => 'NIM Minimal 7 Karakter',
            'idstudent.max' => 'NIM Maksimal 7 Karakter',
            'fullname.required' => 'Tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
        ];
    }

    public function attributes(): array
    {
        return [
            'idstudent' => 'ID Student',
            'fullname' => 'Full Name',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
