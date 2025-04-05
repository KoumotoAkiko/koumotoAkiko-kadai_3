<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightTargetRequest extends FormRequest
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
            'current_weight'=>'required|numeric|between:0,9999.9',
            'target_weight'=>'required|numeric|between:0,9999.9',
        ];
    }

     public function messages()
    {
        return[
            'current_weight.required'=>'現在の体重を入力してください',
            'current_weight.numeric'=>'数字を入力してください',
            'current_weight.between'=>'4桁までの数字（小数点1桁まで）で入力してください',
            'target_weight.required'=>'目標の体重を入力してください',
            'target_weight.numeric'=>'数字を入力してください',
            'target_weight.between'=>'4桁までの数字（小数点1桁まで）で入力してください',

        ];
    }
}
