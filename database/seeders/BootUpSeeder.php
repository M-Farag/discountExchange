<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BootUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add users
       $user_1 = User::factory()->create(
            ['email'=>'user1@users.com']
        );

        $user_2 = User::factory()->create(
            ['email'=>'user2@users.com']
        );

        $user_3 = User::factory()->create(
            ['email'=>'user3@users.com']
        );

        //Add brands
        $brand_1 = Brand::factory()->create(
            ['name'=>'brand1']
        );

        $brand_2 = Brand::factory()->create(
            ['name'=>'brand2']
        );

        // Attach user_1 to brand_1
        $brand_1->users()->attach($user_3);
        $brand_2->users()->attach($user_1);

        // Coupons
        $coupon_1 = Coupon::factory()->create(
            [
                'name'=>'coupon_1',
                'brand_id'=>$brand_1->id,
                'flat_rate'=>0

            ]
        );


        $coupon_2 = Coupon::factory()->create(
            [
                'name'=>'coupon_2',
                'brand_id'=>$brand_1->id,
                'flat_rate'=>10,
                'max_redemptions'=> 5,
                'max_discount_codes'=> 5,
                'percentage' => 0,
                'percentage_max_rate'=> 0,

            ]
        );


        // Coupons
        $coupon_1 = Coupon::factory()->create(
            [
                'name'=>'coupon_1',
                'brand_id'=>$brand_2->id,
                'flat_rate'=>0

            ]
        );


        $coupon_2 = Coupon::factory()->create(
            [
                'name'=>'coupon_2',
                'brand_id'=>$brand_2->id,
                'flat_rate'=>10,
                'max_redemptions'=> 5,
                'max_discount_codes'=> 5,
                'percentage' => 0,
                'percentage_max_rate'=> 0,

            ]
        );




    }
}
