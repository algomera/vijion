<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Coupon extends Model
	{
		use HasFactory;

		public function brand() {
			return $this->belongsTo(Brand::class);
		}
		public function codes() {
			return $this->hasMany(CouponCode::class);
		}
	}
