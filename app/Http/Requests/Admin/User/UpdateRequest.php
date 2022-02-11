<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email,'.$this->user_id,
            'role'=>'required|string',
            'user_id' =>'required|integer|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Это поле необходимо для заполнения',
            'name.string'=> 'Имя должно быть строкой',
            'email.required'=> 'Это поле необходимо для заполнения',
            'email.string'=> 'Емейл должен быть строкой',
            'email.email'=> 'Ваш емейл должен соответствовать формату mail@some.domain',
            'email.unique'=> 'Пользователь с таким емейлом уже существует',
        ];
    }
}
