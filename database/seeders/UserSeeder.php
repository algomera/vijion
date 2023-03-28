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
				'first_name'  => 'Admin',
				'last_name' => null,
				'email' => 'admin@example.test',
				'coins' => null
			]);
			$admin->assignRole($adminRole);
			User::factory()->create([
				'first_name' => 'Fabio',
				'last_name'  => 'Serembe',
				'email'      => 'fabio.serembe@gmail.com'
			]);
			User::factory(8)->create();
		}
	}
