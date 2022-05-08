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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('brand_id');

            $table->decimal('percentage')->nullable();
            $table->decimal('max_rate')->nullable();

            $table->decimal('flat_rate')->nullable();

            $table->tinyInteger('status')->default(\App\Enums\DiscountStatusEnums::PENDING->value);


            $table->dateTime('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
