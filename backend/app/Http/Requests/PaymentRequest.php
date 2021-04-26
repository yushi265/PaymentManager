<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'title' => 'required|max:10',
            'price' => 'required|integer|digits_between:1,7',
            'payer_id' => 'required|integer',
            'travel_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'payer_id.integer' => '会計した人を選択してください'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'イベント名',
            'price' => '使った金額',
            'payer_id' => '会計した人'
        ];
    }
}
