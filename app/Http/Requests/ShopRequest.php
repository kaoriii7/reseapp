<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'date' => 'required|after:today',
            'time_id' => 'required',
            'person_id' => 'required',
        ];
    }

    public function messages()
    {
      return [
        'date.required' => '日付の入力が必要です',
        'time_id.required' => '時間の入力が必要です',
        'person_id.required' => '人数の入力が必要です',
      ];
    }
}
