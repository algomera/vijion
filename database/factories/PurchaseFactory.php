<?php

	namespace Database\Factories;

	use App\Models\CouponCode;
	use App\Models\User;
	use Carbon\Carbon;
	use Illuminate\Database\Eloquent\Factories\Factory;

	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
	 */
	class PurchaseFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition(): array {
			return [
				'user_id'        => User::all()->shuffle()->first()->id,
				'coupon_code_id' => CouponCode::active(true)->get()->shuffle()->first()->id,
				'purchased_at'   => Carbon::now()
			];
		}
	}
