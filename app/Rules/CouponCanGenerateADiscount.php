<?php

namespace App\Rules;

use App\Enums\CouponStatusEnums;
use App\Models\Coupon;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class CouponCanGenerateADiscount implements Rule, DataAwareRule
{
    private array $data;
    private $message;



    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = 'Error';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Must find coupon
        if( ! $coupon = Coupon::where('brand_id',$this->data['brand_id'])->find($this->data['coupon_id'])){
            $this->message = 'Coupon not found';
            return  false;
        }

        // Max redemptions
        if($coupon->discount_codes_redeemed >= $coupon->max_redemptions )
        {
            $this->message = 'Coupon reached the max redemption limit';
            return  false;
        }

        // Max codes generated

        if( $coupon->discount_codes_generated >= $coupon->max_discount_codes)
        {
            $this->message = 'Coupon reached the max generated codes limit';
            return  false;
        }

        // Status

        if($coupon->status->value != CouponStatusEnums::ACTIVE->value){
            $this->message = 'Coupon is not active';
            return  false;
        }


        // Expiry date
        if($coupon->expires_at->isPast()){
            $this->message = 'Coupon has expired';
            return  false;
        }

        request()->merge(['coupon'=>$coupon]);
        return true;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
