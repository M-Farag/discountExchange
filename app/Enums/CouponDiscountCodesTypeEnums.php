<?php

namespace App\Enums;

enum CouponDiscountCodesTypeEnums:int
{
    case SAME_AS_COUPON_NAME = 1;
    case RANDOM_INTEGERS = 2;
    case RANDOM_STRING = 3;
    case RANDOM_MIX_INTEGERS_AND_STRING = 4;
}
