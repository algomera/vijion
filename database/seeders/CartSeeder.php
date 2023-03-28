<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::create([
			'coupon_id' => Coupon::all()->shuffle()->first()->id,
			'user_id' => Coupon::find(2)->id,
        ]);
    }
}
