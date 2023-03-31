<?php

	namespace App\Models;
	// use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class User extends Authenticatable
	{
		use HasApiTokens, HasFactory, Notifiable, HasRoles;

		/**
		 * The attributes that should be hidden for serialization.
		 *
		 * @var array<int, string>
		 */
		protected $hidden = [
			'password',
			'remember_token',
		];
		/**
		 * The attributes that should be cast.
		 *
		 * @var array<string, string>
		 */
		protected $casts = [
			'email_verified_at' => 'datetime',
		];

		public function couponInCart($id) {
			return $this->cart_codes->where('coupon_id', $id)->first();
		}

		public function getFullNameAttribute() {
			return "{$this->first_name} {$this->last_name}";
		}

		public function cart_codes() {
			return $this->belongsToMany(CouponCode::class, 'cart_codes');
		}

		public function purchases() {
			return $this->hasMany(Purchase::class);
		}
	}
