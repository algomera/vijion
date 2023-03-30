<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    $names = [
		    'Marketplace',
		    'Elettronica',
		    'Abbigliamento e Scarpe',
		    'Salute e Bellezza',
		    'Casa e Giardino',
		    'Viaggi'
	    ];
	    foreach ($names as $name) {
            Category::factory()->create([
				'name' => $name,
				'slug' => Str::slug($name)
            ]);
		}
    }
}
