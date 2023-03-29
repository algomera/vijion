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
			HeroSlide::create([
				'paragraph'           => 'Nello sport *non potrà mai esistere* un momento uguale ad un altro.',
				'btn_text'            => 'Scopri gli sconti Nike a te dedicati',
				'btn_url'             => '#',
				'small_centered_text' => 'fino al',
				'big_centered_text'   => '60%',
				'coins_centered_text' => '120',
				'background_url'      => 'https://images.unsplash.com/photo-1465311440653-ba9b1d9b0f5b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80',
			]);
		}
	}
