<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RankRequest extends FormRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'rgst/rank/add' || $this->path() == 'rgst/rank/edit') {
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
            'name' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'name_srt' => ['required', 'max:30', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須',
            'name.max' => '50字以下まで',
            'name.regex' => '半角英数のみ',        
            'name.required' => '入力必須',
            'name.max' => '30字以下まで',
            'name.regex' => '半角英数のみ',
        ];
    }
}
