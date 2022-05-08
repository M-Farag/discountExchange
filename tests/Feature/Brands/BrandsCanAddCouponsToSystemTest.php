<?php

namespace Tests\Feature\Brands;

use App\Models\Brand;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Authenticated Brand can create coupons',function (){

    $brand = Brand::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user,'api');

    $response = $this->json('POST', '/api/v1/brand/coupons',
        [
            'name' => 'coupon_1',
            'brand_id'=>$brand->id,
            'percentage'=>23.2,
        ]
    );

    $response->assertStatus(201);
    $response->assertJsonPath('data.name', 'coupon_1');

});
