<?php

	namespace Database\Factories;

	use App\Models\Category;
	use Illuminate\Database\Eloquent\Factories\Factory;
	use Illuminate\Support\Str;

	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
	 */
	class BrandFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition(): array {
			$name = fake()->company();
			return [
				'name'        => $name,
				'slug'        => Str::slug($name),
				'logo_path'   => null,
				'category_id' => Category::all()->shuffle()->first()->id,
			];
		}
	}
