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
			$admin = User::factory()->create([
				'name'  => 'Admin',
				'email' => 'admin@example.test',
				'coins' => null
			]);
			$admin->assignRole($adminRole);
			User::factory(9)->create();
		}
	}
