<?php

	namespace Database\Seeders;

	use App\Models\HeroSlide;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;

	class HeroSlideSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void {
			$slides = fake()->numberBetween(1, 4);
			for ($i = 0; $i < $slides; $i++) {
				HeroSlide::factory()->create([
					'order'    => $i,
				]);
			}
		}
	}
