<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('user')->id;
        switch($this->method())
        {
            case 'POST':
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required',
                        'email' => 'required|email|unique:users,email,' . $id,
                        'password' => 'confirmed',
                        'role' => 'required',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }

    public function messages(){
        return [
            'name.required' => '姓名必填',
            'email.required' => '邮箱必填',
            'email.email' => '无效的邮箱格式',
            'email.unique' => '邮箱已被占用，请重新填写',
            'password.confirmed' => '两次输入的密码必须一致',
            'role.required' => '角色必选',
        ];
    }
}
