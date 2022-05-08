<?php

namespace App\Http\Controllers\Users;

use App\Enums\DiscountStatusEnums;
use App\Events\DiscountCodeCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreDiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Coupon;
use App\Models\Discount;
use Illuminate\Support\Str;

class DiscountsController extends Controller
{
    /**
     * @return DiscountResource
     */
    public function store(StoreDiscountRequest $request)
    {
        $data = $request->validated();
        if(! $coupon = request('coupon')){
            $coupon = Coupon::where('brand_id',$data['brand_id'])->find($data['coupon_id']);
        }

        $user = auth()->user();

        //User cannot obtain more than one discount code on the same coupon
        if($discount = Discount::where('user_id',$user->id)
            ->where('coupon_id',$coupon->id)
            ->where('status', DiscountStatusEnums::PENDING->value)
            ->first())
        {
            return (new DiscountResource($discount));
        }




        $discount = new Discount();
        $discount->code = Str::random( (int) $coupon->discount_code_max_length );
        $discount->coupon_id = $coupon->id;
        $discount->user_id = $user->id;
        $discount->brand_id = $data['brand_id'];
        $discount->percentage = $coupon->percentage;
        $discount->max_rate = $coupon->max_rate;
        $discount->flat_rate = $coupon->flat_rate;
        $discount->expires_at = now()->addHour($coupon->discount_code_valid_for_max_hours_of);

        $discount->save();

        // Update coupon
        $coupon->discount_codes_generated +=1;
        $coupon->save();

        event(new DiscountCodeCreated($discount));
        return (new DiscountResource($discount));

    }
}
