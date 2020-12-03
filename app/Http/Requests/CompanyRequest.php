<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/company/add' || $this->path() == 'rgst/company/edit') {
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
            'four_letter' => ['size:4','regex:/^[a-zA-Z0-9\s]+$/'],
            'company_form' => ['max:10'],
            'name' => ['required', 'max:50'],
            'name_ruby' => ['required', 'max:50', 'regex:/^[ぁ-ん]+$/'],
            'name_eng' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'postcode' => ['nullable','max:7', 'regex:/^[0-9]+$/'],
            'address' => ['nullable','max:100'],
            'tel' => ['nullable','max:20', 'regex:/^0\d{1,4}-\d{1,4}-\d{3,4}$/'],
            'short_num' => ['nullable','max:4', 'regex:/^[0-9]+$/'],
            'fax' => ['nullable','max:20', 'regex:/^0\d{1,4}-\d{1,4}-\d{3,4}$/'],
            'email' => ['nullable','max:50', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'four_letter.size' => '4字必須',
            'four_letter.regex' => '半角英数のみ',
            'company_form.max' => '10字まで',
            'name.required' => '入力必須',
            'name.max' => '50字まで',
            'name_ruby.required' => '入力必須',
            'name_ruby.max' => '50字まで',
            'name_ruby.regex' => '全角ひらがなのみ',
            'name_eng.required' => '入力必須',
            'name_eng.max' => '50字まで',
            'name_eng.regex' => '半角英数のみ',
            'jurisdiction.max' => '30字まで',
            'postcode.max' => '7字まで',
            'postcode.regex' => '半角数字のみ',
            'address' => '30字まで',
            'tel.max' => '20字まで',
            'tel.regex' => '指定された入力形式で入力して下さい',
            'short_num.max' => '4字まで',
            'fax.max' => '20字以下まで',
            'fax.regex' => '指定された入力形式で入力して下さい',
            'email.max' => '20字以下まで',
            'email.email' => 'E-mailを入力して下さい'
            
        ];
    }
}
