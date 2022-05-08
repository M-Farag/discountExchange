<?php

namespace App\Models;

use App\Enums\CouponDiscountCodesTypeEnums;
use App\Enums\CouponStatusEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand_id',
        'max_redemptions',
        'max_discount_codes',
        'percentage',
        'percentage_max_rate',
        'flat_rate',
        'currency',
        'status',
        'discount_code_max_length',
        'discount_code_type',
        'discount_code_valid_for_max_hours_of',
        'trigger',
        'expires_at',
        'discount_codes_generated',
        'discount_codes_redeemed'
    ];


    protected $casts = [
        'name'=> 'string',
        'brand_id'=> 'integer',
        'max_redemptions'=> 'integer',
        'max_discount_codes'=>'integer',
        'percentage'=>'float',
        'percentage_max_rate'=>'float',
        'flat_rate'=>'float',
        'currency'=>'string',
        'status'=>CouponStatusEnums::class,
        'discount_code_max_length'=>'integer',
        'discount_code_type'=>CouponDiscountCodesTypeEnums::class,
        'discount_code_valid_for_max_hours_of'=>'integer',
        'trigger'=>'string',
        'expires_at'=>'datetime',
        'discount_codes_generated'=> 'integer',
        'discount_codes_redeemed' => 'integer'
    ];
}
