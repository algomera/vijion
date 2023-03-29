<?php

	namespace Database\Factories;

	use App\Models\Brand;
	use Carbon\Carbon;
	use Illuminate\Database\Eloquent\Factories\Factory;

	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
	 */
	class CouponFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition(): array {
			$expires_date = Carbon::now()->addDays(fake()->numberBetween(1, 30));
			return [
				'brand_id' => Brand::all()->shuffle()->first()->id,
				'amount' => fake()->numberBetween(10, 50),
				'coins' => fake()->numberBetween(10, 90),
				'type' => fake()->randomElement([
					'percentage',
					'cash'
				]),
				'expires_date' => fake()->randomElement([
					'0',
					'1'
				]) === '1' ? $expires_date : null
			];
		}
	}
