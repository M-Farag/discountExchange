<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\StoreCouponRequest;
use App\Http\Resources\Brands\CouponResource;
use App\Models\Coupon;

class CouponsController extends Controller
{
    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();

        $coupon = Coupon::create($data);
        return (new CouponResource($coupon))->additional([
            'metadata'=>[
                'created_by_user_id'=>auth()->user()->id
            ]
    ]);
    }
}
