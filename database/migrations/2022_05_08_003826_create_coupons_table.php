<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');

            $table->integer('max_redemptions')->nullable();
            $table->integer('max_discount_codes')->nullable();

            $table->decimal('percentage')->nullable();
            $table->decimal('max_rate')->nullable();

            $table->decimal('flat_rate')->nullable();
            $table->string('currency',5)->nullable();

            $table->tinyInteger('status')->default(\App\Enums\CouponStatusEnums::ACTIVE->value);


            $table->integer('discount_code_max_length')->nullable();
            $table->tinyInteger('discount_code_type')->default(\App\Enums\CouponDiscountCodesTypeEnums::RANDOM_STRING->value);
            $table->integer('discount_code_valid_for_max_hours_of')->nullable();

            $table->string('trigger',100);

            $table->dateTime('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
