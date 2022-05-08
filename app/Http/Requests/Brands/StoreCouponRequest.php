<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required','string','min:3','max:255','unique:coupons'],
            'brand_id'=>['required','numeric'],
            'percentage'=>['required_without:flat_rate','numeric'],
            'flat_rate'=>['required_without:percentage','numeric'],
            'percentage_max_rate'=>['nullable','sometimes','numeric'],
            'max_redemptions'=>['nullable','sometimes','numeric'],
            'max_discount_codes'=>['nullable','sometimes','numeric'],
            'discount_code_max_length'=>['nullable','sometimes','numeric'],
            'currency'=>['nullable','sometimes','string'],
            'trigger'=>['nullable','sometimes','string'],
            'expires_at'=>['nullable','sometimes','date'],
        ];
    }
}
