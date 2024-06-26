<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        $id = $this->route('id');
        $password = $this->request->get('password');
        $rule = [
            'email' => "required|email|unique:admins,email,{$id},id",
            'phone' => "required|numeric|regex:/^1[3456789][0-9]{9}$/|unique:admins,phone,{$id},id",
            'username' => "required|min:4|max:14|unique:admins,username,{$id},id",
            'nickname' => 'required|min:2|max:14'
        ];
        if ($password) {
            $rule['password'] = 'required|confirmed|min:6|max:14';
        }
        return $rule;
    }
}
