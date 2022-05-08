<?php

namespace App\Enums;

enum CouponStatusEnums:int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case SUSPENDED = 2;
}
