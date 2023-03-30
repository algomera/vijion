<?php

	namespace Database\Seeders;

	use App\Models\Brand;
	use App\Models\Rules;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;

	class BrandSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void {
			$names = [
				'Zalando',
				'ManoMano',
				'Notino',
				'Leroy Merlin',
				'Dyson',
				'Foot Locker',
				'Italo',
				'Mediaworld',
				'Expedia',
				'Lancòme',
				'Geox',
				'Costa',
				'Pinalli',
				'Bottega Verde',
				'Guess',
				'1ª Classe',
				'Yamamay',
				'Twinset',
				'OVS',
				'Sisley'
			];
			foreach ($names as $name) {
				$brand = Brand::factory()->create([
					'name'      => $name,
					'logo_path' => asset('images/brands/' . Str::slug($name) . '.png')
				]);

				Rules::factory(fake()->numberBetween(1, 4))->create([
					'brand_id' => $brand->id,
				]);
			}
		}
	}
