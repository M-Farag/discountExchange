<?php

namespace App\Enums;

enum DiscountStatusEnums:int
{
    case PENDING = 0;
    case REDEEMED = 1;
    case EXPIRED = 2;
    case ARCHIVED = 3;
    case SUSPENDED = 4;
}
