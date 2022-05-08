<?php

namespace App\Models;

use App\Enums\CouponDiscountCodesTypeEnums;
use App\Enums\CouponStatusEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'coupon_id',
        'user_id',
        'brand_id',
        'percentage',
        'max_rate',
        'flat_rate',
        'status',
        'expires_at'
    ];


    protected $casts = [
        'code'=> 'string',
        'coupon_id'=> 'integer',
        'user_id'=> 'integer',
        'brand_id'=> 'integer',
        'percentage'=>'float',
        'max_rate'=>'float',
        'flat_rate'=>'float',
        'status'=>CouponStatusEnums::class,
        'expires_at'=>'datetime'
    ];


}
