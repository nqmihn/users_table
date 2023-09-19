<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            //
            'name' => 'required',
            'phone_number' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->id),
            ],
            'user_role_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => '*Vui lòng điền tên',
            'phone_number.required' => '*Vui lòng điền số điện thoại',
            'email.required' => '*Vui lòng điền email',
            'email.unique' => '*Email đã có người sử dụng',
            'email.email' => '*Email đã nhập không hợp lệ',

        ];
    }
}
