<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Builder;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class CouponCode extends Model
	{
		use HasFactory;

		public function scopeActive(Builder $query, bool $status = true) {
			$query->where('active', $status);
		}

		public function coupon() {
			return $this->belongsTo(Coupon::class);
		}
	}
