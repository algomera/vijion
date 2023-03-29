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
			HeroSlide::factory(3)->create();
		}
	}
