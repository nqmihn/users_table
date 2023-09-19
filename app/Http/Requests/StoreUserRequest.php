<?php

namespace App\Http\Requests;

use App\Models\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|confirmed',
            'user_role_id' => 'exists:user_roles,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => '*Vui lòng điền tên',
            'phone_number.required' => '*Vui lòng điền số điện thoại',
            'username.required' => '*Vui lòng điền tên đăng nhập',
            'username.unique' => '*Tên đăng nhập đã có người sử dụng',
            'email.required' => '*Vui lòng điền email',
            'email.unique' => '*Email đã có người sử dụng',
            'email.email' => '*Email đã nhập không hợp lệ',
            'password.min' => '*Mật khẩu có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhập không khớp với mật khẩu',
            'user_role_id.exists' => '*Vai trò không hợp lệ',

        ];
    }
}
