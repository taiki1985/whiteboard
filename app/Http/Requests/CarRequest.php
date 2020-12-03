<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'car/add') {
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
            'name_jpn' => 'required|size:30',
            'name_eng' => 'required|size:30',
            'jurisdiction' => 'size:30',
            'postcode' => 'size:7',
            'address' => 'size:100',
            'tel' => 'size:15',
            'short_num' => 'size:4',
            'fax' => 'size:15',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'name_jpn.required' => '名前を入力して下さい。',
            'name_eng.required' => '英語で入力して下さい。',
        ];
    }
}
