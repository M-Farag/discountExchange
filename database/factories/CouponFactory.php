<?php

namespace Database\Factories;

use App\Enums\CouponDiscountCodesTypeEnums;
use App\Enums\CouponStatusEnums;
use App\Enums\UserStatusEnums;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'coupon_name-'.Str::random(5),
            'brand_id'=> Brand::factory(),

            'max_redemptions'=> 1000,
            'max_discount_codes'=> 1000,

            'percentage' => 0.23,
            'percentage_max_rate'=> 15,

            'flat_rate'=>10,
            'currency'=>'USD',

            'status'=>CouponStatusEnums::ACTIVE->value,

            'discount_code_max_length'=> 10,
            'discount_code_type'=>CouponDiscountCodesTypeEnums::RANDOM_STRING->value,
            'discount_code_valid_for_max_hours_of'=>5,
            'trigger'=>'customer_created',
            'expires_at'=>now()->addDays(10)


        ];
    }
}
