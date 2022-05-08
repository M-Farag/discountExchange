<?php

namespace Database\Factories;

use App\Enums\DiscountStatusEnums;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),

            'coupon_id'=> Coupon::factory(),
            'user_id'=> User::factory(),
            'brand_id'=> Brand::factory(),

            'percentage' => '0.23',
            'max_rate'=> '15',

            'flat_rate'=>'10',

            'status'=>DiscountStatusEnums::PENDING->value,

            'expires_at'=>now()->addDays(10)


        ];
    }
}
