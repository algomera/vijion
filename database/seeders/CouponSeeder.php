<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\CouponCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::factory(10)->create()->each(function ($c) {
			CouponCode::factory(5)->create([
				'coupon_id' => $c->id,
			]);
        });
    }
}
