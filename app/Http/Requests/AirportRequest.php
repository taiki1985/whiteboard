<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/airport/add'|| $this->path() == 'rgst/airport/edit') {
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
            'type' => ['required'],
            'three_letter' => ['required', 'size:3'],
            'name' => ['required', 'max:50'],
            'name_ruby' => ['required', 'max:50', 'regex:/^[ぁ-ん]+$/'],
            'name_eng' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '入力必須',
            'three_letter.required' => '入力必須',
            'three_letter.size' => '3字必須',
            'name.required' => '入力必須',
            'name.max' => '50字以下まで',
            'name_ruby.required' => '入力必須',
            'name_ruby.max' => '50字以下まで',
            'name_ruby.regex' => '全角ひらがなのみ',
            'name_eng.required' => '入力必須',
            'name_eng.max' => '50字以下まで',
            'name_eng.regex' => '半角英数のみ',
        ];
    }
}
