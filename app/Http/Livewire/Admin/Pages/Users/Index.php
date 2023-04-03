<?php

	namespace App\Http\Livewire\Admin\Pages\Users;

	use App\Models\User;
	use Livewire\Component;

	class Index extends Component
	{
		public function render() {
			return view('livewire.admin.pages.users.index', [
				'users' => User::all()
			]);
		}
	}
