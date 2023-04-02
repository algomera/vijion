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
			$bgs = fake()->randomElement([
				'https://images.unsplash.com/photo-1485736231968-0c8ad5c9e174?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80',
				'https://images.unsplash.com/photo-1523381294911-8d3cead13475?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80',
				'https://plus.unsplash.com/premium_photo-1661762422433-b18f87b64341?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80',
				'https://images.unsplash.com/photo-1434993568367-36f24aa04d2f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80',
				'https://images.unsplash.com/photo-1596364725424-7673f05f64b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80',
				'https://images.unsplash.com/photo-1574291814206-363acdf2aa79?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=986&q=80'
			]);
			return [
				'brand_id'     => Brand::all()->shuffle()->first()->id,
				'uuid'         => fake()->uuid(),
				'amount'       => fake()->numberBetween(10, 50),
				'coins'        => fake()->numberBetween(10, 90),
				'type'         => fake()->randomElement([
					'percentage',
					'cash'
				]),
				'bg'           => fake()->randomElement([
					'0',
					'1'
				]) === '1' ? $bgs : null,
				'expires_date' => fake()->randomElement([
					'0',
					'1'
				]) === '1' ? $expires_date : null
			];
		}
	}
