<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/country/add' || $this->path() == 'rgst/country/edit') {
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
            'name_eng' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'two_letter' => ['required', 'size:2', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'three_letter' => ['required', 'size:3', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須',
            'name.max' => '50字まで',
            'name_eng.required' => '入力必須',
            'name_eng.max' => '50字まで',
            'name_eng.regex' => '半角英数のみ',
            'two_letter.required' => '入力必須',
            'two_letter.size' => '2字必須',
            'two_letter.regex' => '半角英数のみ',
            'three_letter.required' => '入力必須',
            'three_letter.size' => '3字必須',
            'three_letter.regex' => '半角英数のみ',

        ];
    }
}
