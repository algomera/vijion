<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            $this->call(UserSeeder::class);
            if (app()->environment() === "local") {
                $this->call(CategorySeeder::class);
                $this->call(BrandSeeder::class);
                $this->call(PurchaseSeeder::class);
                $this->call(HeroSlideSeeder::class);
            }
//			CouponSeeder::class,
//			VideoSeeder::class,
        }
    }
