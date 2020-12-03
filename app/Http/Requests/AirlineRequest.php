<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirlineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/airline/add' || $this->path() == 'rgst/airline/edit') {
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
            'two_letter' => ['required', 'size:2'],
            'name' => ['required', 'max:50'],
            'name_ruby' => ['required', 'max:50', 'regex:/^[ぁ-ん]+$/'],
            'name_eng' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'tel' => ['nullable','max:20', 'regex:/^0\d{1,4}-\d{1,4}-\d{3,4}$/'],
            'short_num' => ['nullable','max:4', 'regex:/^[0-9]+$/'],
            'fax' => ['nullable','max:20', 'regex:/^0\d{1,4}-\d{1,4}-\d{3,4}$/'],
            'email' => ['nullable','max:50', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'two_letter.required' => '入力必須',
            'two_letter.size' => '2字必須',
            'name.required' => '入力必須',
            'name.max' => '50字以下まで',
            'name_ruby.required' => '入力必須',
            'name_ruby.max' => '50字以下まで',
            'name_ruby.regex' => '全角ひらがなのみ',
            'name_eng.required' => '入力必須',
            'name_eng.max' => '50字以下まで',
            'name_eng.regex' => '半角英数のみ',
            'tel.max' => '20字以下まで',
            'tel.regex' => '指定された入力形式で入力して下さい',
            'short_num.max' => '4字以下まで',
            'fax.max' => '20字以下まで',
            'fax.regex' => '指定された入力形式で入力して下さい',
            'email.max' => '20字以下まで',
            'email.email' => 'E-mailを入力して下さい'
        ];
    }
}
