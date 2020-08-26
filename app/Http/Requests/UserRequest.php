<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|unique:users,name|mix:4|max:20|alpha_dash',
            'email' => 'email|required|unique:users,email|max:100',
            'password' => 'required|min:6|max:127|confirmed',
            'password_confirmation' => 'required',
        ]; //filled フィールドが存在する場合、空でないことをバリデート
    }
}
