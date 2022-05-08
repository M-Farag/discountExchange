<?php

namespace App\Http\Requests\Users;

use App\Rules\CouponCanGenerateADiscount;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
            'coupon_id'=>['required','numeric',new CouponCanGenerateADiscount()],
            'brand_id'=>['required','numeric']
        ];
    }
}
