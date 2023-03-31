<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Purchase extends Model
	{
		use HasFactory;

		public $timestamps = false;
		protected $casts = [
			'purchased_at' => 'datetime'
		];

		public function user() {
			return $this->belongsTo(User::class);
		}
		public function coupon_code() {
			return $this->belongsTo(CouponCode::class);
		}
	}
