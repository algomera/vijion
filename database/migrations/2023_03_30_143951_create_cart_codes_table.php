<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_codes', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained();
	        $table->foreignIdFor(\App\Models\Brand::class, 'brand_id')->constrained();
	        $table->foreignIdFor(\App\Models\Coupon::class, 'coupon_id')->constrained();
			$table->foreignIdFor(\App\Models\CouponCode::class, 'coupon_code_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_codes');
    }
};
