<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/port/add' || $this->path() == 'rgst/port/edit') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'name_ruby' => ['required', 'max:50', 'regex:/^[ぁ-ん]+$/'],
            'name_eng' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'address' => ['nullable','max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須',
            'name.max' => '50字以下まで',
            'name_ruby.required' => '入力必須',
            'name_ruby.max' => '50字以下まで',
            'name_ruby.regex' => '全角ひらがなのみ',
            'name_eng.required' => '入力必須',
            'name_eng.max' => '50字以下まで',
            'name_eng.regex' => '半角英数のみ',
            'address.max' => '100字以下まで',            
        ];
    }
}
