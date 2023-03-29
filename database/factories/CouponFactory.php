<?php

	namespace Database\Factories;

	use App\Models\Brand;
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
			return [
				'brand_id' => Brand::all()->shuffle()->first()->id,
				'amount'   => fake()->numberBetween(10, 50),
				'coins'    => fake()->numberBetween(10, 90),
				'type'     => fake()->randomElement([
					'percentage',
					'cash'
				]),
			];
		}
	}
