<?php

namespace Tests\Feature\Users;

use App\Models\Brand;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

uses(RefreshDatabase::class);


test('Authenticated user can get discount on a valid coupon',function (){
    $brand = Brand::factory()->create();
    $user = User::factory()->create();
    $coupon = Coupon::factory()->create(['brand_id'=>$brand->id]);


    $this->actingAs($user,'api');

    $response = $this->json('POST', '/api/v1/user/discounts',
        [
            'coupon_id'=>$coupon->id,
            'brand_id'=>$brand->id,
        ]
    );

    $response->assertStatus(201);
    $response->assertJson(fn (AssertableJson $json) =>

    $json->has('data')
    );

    $response->assertJsonPath('data.code', fn ($code) => strlen($code) >= 3);
    $coupon->refresh();
    $this->assertEquals(1,$coupon->discount_codes_generated);
});
