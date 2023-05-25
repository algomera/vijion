<?php

	namespace Database\Seeders;

	use App\Models\User;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Spatie\Permission\Models\Role;

	class UserSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void {
			$adminRole = Role::create(['name' => 'admin']);
			$memberRole = Role::create(['name' => 'member']);
            if(app()->environment() === "local") {
                $admin = User::factory()->create([
                    'first_name'  => 'Admin',
                    'last_name' => null,
                    'email' => 'admin@example.test',
                    'coins' => null
                ]);
                $admin->assignRole($adminRole);
                $member = User::factory()->create([
                    'first_name' => 'Algomera',
                    'last_name'  => null,
                    'email'      => 'info@algomera.it'
                ]);
                $member->assignRole($memberRole);
                User::factory(8)->create()->each(function ($u) use ($memberRole) {
                    $u->assignRole($memberRole);
                });
            }
		}
	}
